<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Illuminate\Http\Response;

use Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use MercadoPago;
use Exception;
use PhpParser\Node\Stmt\Catch_;

class MercadoPagoPixController extends Controller
{

    public function validTransferPix($id, Request $request, Response $response)
    {
        $contents = json_decode(file_get_contents('php://input'), true);
        $parsed_request = $request->withParsedBody($contents);
        $parsed_body = $parsed_request->getParsedBody();
        //dd($parsed_body["payer"]["id_sorteio"]);

        $acessToken = $_ENV["MERCADO_PAGO_ACCESS_TOKEN_DEVELOPER"];
        MercadoPago\SDK::setAccessToken($acessToken);
        $payment = new MercadoPago\Payment();
        $pix = $payment->find_by_id($id);
        if($pix->status === "pending")
        {
            //nome do sorteio, nome da tabela tambem
            $nome = DB::table('tbl_sorteios')
            ->where('tbl_sorteios.id', '=', $parsed_body["payer"]["id_sorteio"])
            ->value('nome');

            $created_payment = DB::table($nome)
                ->where('number', '=', $parsed_body["payer"]["number"])
                ->value('created_at');

            $data_atual = strtotime(date("Y-m-d H:i:s"));
            $created_payment = strtotime($created_payment);

            $minutos = 40-(($data_atual - $created_payment)/60);

            $response_fields = array(
                'message_status' => $pix->status_detail,
                'expira_em_minutos' => round($minutos)." minutos."
            );
            $response_body = json_encode($response_fields);
            $response->getBody()->write($response_body);
            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
        }
        elseif($pix->status === "approved")
        {
            //nome do sorteio, nome da tabela tambem
            $nome = DB::table('tbl_sorteios')
            ->where('tbl_sorteios.id', '=', $parsed_body["payer"]["id_sorteio"])
            ->value('nome');

            //verificar pela ultima vez que o numero esta disponivel para compra
            $isFree = DB::table($nome)
            ->where('number', '=', $parsed_body["payer"]["number"])
            ->value('user_id_purchased');

            if($isFree == null){
                $user_id = Auth::user()->id;
                //neste momento devo registrar no banco de dados que o numero foi comprado pelo usuario
                $affected = DB::table($nome)
                ->where('number', $parsed_body["payer"]["number"])
                ->update([
                    'user_id_purchased' => $user_id,
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
                //notificar ao usuario que a compra deu certo e dar a ele o id da transacao pix como codigo de comprovacao
                //escrever aqui essa funcionalidade
                $number = DB::table($nome)
                ->where('number', '=', $parsed_body["payer"]["number"])
                ->value('number');
                DB::insert('insert into notifications (user_id, title, notificationText, created_at)
                 values (?, ?, ?, ?)',
                 [$user_id, 'Compra do número: '.$number,
                 'Você comprou o número: '.$number.' no sorteio: '.$nome.'. código do pagamento: '.$id,
                 date("Y-m-d H:i:s")
                ]);
            }else{
                throw new Exception("este número não esta disponível para compra, por favor entre em contato com o suporte tecnico");
            }

            if($affected != 0) {
                $response_fields = array(
                    'message_status' => $pix->status_detail
                );
                $response_body = json_encode($response_fields);
                $response->getBody()->write($response_body);
                return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
            }else{
                $response_fields = array(
                    'message_status' => "database error"
                );
                $response_body = json_encode($response_fields);
                $response->getBody()->write($response_body);
                return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
            }

        }else{
            $response_fields = array(
                'message_status' => "QRCode expirado.",
                'expira_em_minutos' => " 0 minutos"
            );
            $response_body = json_encode($response_fields);
            $response->getBody()->write($response_body);
            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
        }

    }

    public function index(Request $request, Response $response)
    {
        /*
        "firstName" => "Marlon Oliveira"
        "email" => "marlon81785@gmail.com"
         "number" => "57"
         "id_sorteio" => 1
      */

        $acessToken = $_ENV["MERCADO_PAGO_ACCESS_TOKEN_DEVELOPER"];
        MercadoPago\SDK::setAccessToken($acessToken);

        function validate_payment_result($payment) {
            if($payment->id === null) {
                $error_message = 'Unknown error cause';

                if($payment->error !== null) {
                    $sdk_error_message = $payment->error->message;
                    $error_message = $sdk_error_message !== null ? $sdk_error_message : $error_message;
                }

                throw new Exception($error_message);
            }
        }


        try {
            $contents = json_decode(file_get_contents('php://input'), true);
            $parsed_request = $request->withParsedBody($contents);
            $parsed_body = $parsed_request->getParsedBody();
            //dd($parsed_body["payer"]["id_sorteio"]);
            //dd($contents["payer"]["number"]);

            $user_id = Auth::user()->id;

            $valor_cota = DB::table('tbl_sorteios')
            ->where('tbl_sorteios.id', '=', $parsed_body["payer"]["id_sorteio"])->value('valor_cota');

            //nome do sorteio, nome da tabela tambem
            $nome = DB::table('tbl_sorteios')
            ->where('tbl_sorteios.id', '=', $parsed_body["payer"]["id_sorteio"])
            ->value('nome');

            $user_id_purchased = DB::table($nome)
            ->where('number', '=', $parsed_body["payer"]["number"])
            ->value('user_id_purchased');

            //transacao pix criada, ainda nao confirmada e dentro do prazo de validade.
            $id_pix = DB::table($nome)
            ->where('number', '=', $parsed_body["payer"]["number"])
            ->value('id_pix');

            if($user_id_purchased !== null){
                throw new Exception("Numero indisponivel para compra!");
            }

            if($id_pix !== null){
                $created_payment = DB::table($nome)
                ->where('number', '=', $parsed_body["payer"]["number"])
                ->value('created_at');

                $userCreatePayment = DB::table('payments')
                ->where('number', '=', $parsed_body["payer"]["number"])
                ->value('user_id_purchased');

                $data_atual = strtotime(date("Y-m-d H:i:s"));
                $created_payment = strtotime($created_payment);

                //2400 seconds is 40 minutes :)
                if($data_atual - $created_payment < 2400){
                    if($userCreatePayment != $user_id){
                        $minutos = 40-(($data_atual - $created_payment)/60);
                        $error_message = "Este numero sera desbloqueado para compra em: ".round($minutos)." minutos, devivo a nao confirmacao do pagamento pelo usuario que esta tentando comprar, recarregue a pagina apos este tempo.";
                        throw new Exception($error_message);
                    }else{
                        $minutos = 40-(($data_atual - $created_payment)/60);

                        if($minutos > 0.1){

                            $paymentWeitingTransfer = DB::table('payments')
                            ->where('number', $parsed_body["payer"]["number"])
                            ->where('id_sorteio', $parsed_body["payer"]["id_sorteio"])
                            ->where('user_id_purchased', $user_id)
                            ->latest()->first();

                            $response_fields = array(
                                'id' => $paymentWeitingTransfer->id_pix,
                                'transaction_amount' => $paymentWeitingTransfer->transaction_amount,
                                'status' => $paymentWeitingTransfer->status,
                                'detail' => $paymentWeitingTransfer->detail,
                                'qrCodeBase64' => $paymentWeitingTransfer->qrCodeBase64,
                                'qrCode' => $paymentWeitingTransfer->qrCode
                            );

                            $response_body = json_encode($response_fields);
                            $response->getBody()->write($response_body);

                            return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
                        }

                    }
                }
            }


            $payment = new MercadoPago\Payment();
            //$payment->transaction_amount = $parsed_body["transactionAmount"];
            $payment->transaction_amount = $valor_cota; //valor da tansacao pix
            //$payment->description = $parsed_body["description"];
            $payment->description = "Compra de cota Nº ".$parsed_body['payer']['number']." para sorteio: ".$nome;
            $payment->payment_method_id = "pix";
            $payment->payer = array(
                "email" => $parsed_body["payer"]["email"],
                "first_name" => $parsed_body["payer"]["firstName"],
                //"last_name" => $parsed_body["payer"]["lastName"],
                /*"identification" => array(
                    "type" => $parsed_body["payer"]["identification"]["type"],
                    "number" => $parsed_body["payer"]["identification"]["number"]

                ),

                "address"=>  array(
                    "zip_code" => "06233200",
                    "street_name" => "Av. das Nações Unidas",
                    "street_number" => "3003",
                    "neighborhood" => "Bonfim",
                    "city" => "Osasco",
                    "federal_unit" => "SP"
                )
                */
            );

            //qr code expirando apos 31 minutos -> api pede de 30 minutos a 30 dias
            $new = date('Y-m-d\TH:i:s.vP', strtotime('+31 minutes'));
            $payment->date_of_expiration = $new;

            $payment->save();

            validate_payment_result($payment);

            //neste momento registro que a transacao foi iniciada e esta pendente
            $affected = DB::table($nome)
            ->where('number', $parsed_body["payer"]["number"])
            ->update([
                'id_pix' => $payment->id,
                'hora_compra' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"),
            ]);

            //aqui registro na tabela de pagamento as informacoes do pagamento
            $affected2 = DB::table('payments')
            ->insert([
                'id_sorteio' => $parsed_body["payer"]["id_sorteio"],
                'user_id_purchased' => $user_id,
                'number' => $parsed_body["payer"]["number"],
                'id_pix' => $payment->id,
                'transaction_amount' => $payment->transaction_amount,
                'status' => $payment->status,
                'detail' => $payment->status_detail,
                'qrCodeBase64' => $payment->point_of_interaction->transaction_data->qr_code_base64,
                'qrCode' => $payment->point_of_interaction->transaction_data->qr_code,
                'hora_compra' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"),
            ]);

            $response_fields = array(
                'id' => $payment->id,
                'transaction_amount' => $payment->transaction_amount,
                'status' => $payment->status,
                'detail' => $payment->status_detail,
                'qrCodeBase64' => $payment->point_of_interaction->transaction_data->qr_code_base64,
                'qrCode' => $payment->point_of_interaction->transaction_data->qr_code
            );

            $response_body = json_encode($response_fields);
            $response->getBody()->write($response_body);

            return $response->withHeader('Content-Type', 'application/json')->withStatus(201);

        } catch(Exception $exception) {
            $response_fields = array('error_message' => $exception->getMessage());

            $response_body = json_encode($response_fields);
            $response->getBody()->write($response_body);

            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }

    }


}
