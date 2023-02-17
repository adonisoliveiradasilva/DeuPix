<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class Sortear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:sortear';// php artisan task:sortear

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando sorteia numeros aleatorios para as tabelas';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /*
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            foreach ($table as $key => $value){
                echo ($value);
            }

        }
        */
        $sorteios_ativos = false;

        $sorteios = DB::table('tbl_sorteios')->get();
        foreach ($sorteios as $sorteio)
        {
            $vendidos = true;
            $ativo = $sorteio->ativo;

            //tabela de numeros do sorteio
            $numbers = DB::table($sorteio->nome)
            ->get(['number', 'user_id_purchased']);

            foreach($numbers as $number){
                if($number->user_id_purchased == null){
                    //echo("\n Numero:".$number->number." ==>".$number->user_id_purchased."\n");
                    $vendidos = false;
                }
            }

            if($vendidos == true && $ativo == true){
                $premiado = rand(0, $sorteio->numbers-1);

                $id_vencedor = DB::table($sorteio->nome)
                ->where('id_sorteio', '=', $sorteio->id)
                ->where('number', '=', $premiado)
                ->value('user_id_purchased');


                $affected = DB::table('tbl_sorteios')
                ->where('id', $sorteio->id)
                ->where('winner', null)
                ->update([
                    'winner' => $id_vencedor,
                    'ativo' => 0,
                    'numero_sorteado' => $premiado,
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);

                //echo("Affected: ".$affected);

                echo("Sorteio: ".$sorteio->nome."\n");
                echo("Todos os numeros vendidos!");
                echo("\nnumero premiado: ".$premiado."\n");
                echo("Usuario vencedor (id_user_purchased ==> ".$id_vencedor.")\n");
                echo("------------------------------------------\n\n");
                echo("Criando novo sorteio...\n");
                //notificando usuario da vitoria no sorteio
                DB::insert('insert into notifications (user_id, title, notificationText, created_at)
                 values (?, ?, ?, ?)',
                 [$id_vencedor, 'Parabéns!!!',
                 'Você ganhou o sorteio: '.$sorteio->nome.' entre em contato reinvindicando seu prêmio.',
                 date("Y-m-d H:i:s")
                ]);


                //notificando usuarios que o sorteio aconeceu e eles nao ganharam
                $usuarios_participantes = DB::table($sorteio->nome)
                ->where('id_sorteio', '=', $sorteio->id)
                ->where('number', '<>', $premiado)
                ->get('*');
                //echo($usuarios_participantes);


                foreach($usuarios_participantes as $usuario_perdedor){
                    if($usuario_perdedor->number !== $premiado && $usuario_perdedor->user_id_purchased !== $id_vencedor)
                    DB::insert('insert into notifications (user_id, title, notificationText, created_at)
                    values (?, ?, ?, ?)',
                    [$usuario_perdedor->user_id_purchased, 'Obrigado por participar!!!',
                    'Dessa vez você não ganhou o sorteio: '.$sorteio->nome.' o número: '.$usuario_perdedor->number.' não foi premiado. Entre em contato com o suporte caso necessário.',
                    date("Y-m-d H:i:s")
                    ]);

                }





                Artisan::call('db:criarsorteio Sorteio_Automatico_N'.$sorteio->id+1);
            }


        }

        //nome do sorteio, nome da tabela tambem
        /*
        $nome = DB::table('tbl_sorteios')
        ->where('tbl_sorteios.id', '=', $parsed_body["payer"]["id_sorteio"])
        ->value('nome');

        $paymentWeitingTransfer = DB::table('payments')
        ->where('number', $parsed_body["payer"]["number"])
        ->where('id_sorteio', $parsed_body["payer"]["id_sorteio"])
        ->where('user_id_purchased', $user_id)
        ->latest()->first();



        //neste momento registro que a transacao foi iniciada e esta pendente
        $affected = DB::table($nome)
        ->where('number', $parsed_body["payer"]["number"])
        ->update([
            'id_pix' => $payment->id,
            'hora_compra' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
        ]);

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
        */

        Log::info('acabei de sortear a task:sortear!!');
        return 0;
    }
}
