<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarSorteio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:criarsorteio {name}'; //command for execute

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Criar Sorteio e tabela de numeros.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //this method is for create a "sorteio" and create table for number.
        //is that need to updated for create a new "sorteios"
        //---------------------------------------------------------------------//

        //este nome sera o nome da tabela no banco de dados e por isto nao pode
        //conter espacos. dont accept spaces in letters.

        //editar estes valores para criacao do sorteio
        //edit this values for create the new "sorteio"
        $nome = $this->argument('name');
        //$nome = "Sorteio_2_cent"; //escrever o nome com _ nos espacos e removelos no frontend - tabelas precisam disso
        $valor_premio = 100;
        $valor_cota = 14;
        $numbers = 10;
        $data_sorteio = "2022/06/20"; //ano/mes/dia - aqui vai ser a data em que o algoritimo sorteiou alguem
        $image_card = ""; //base64 image for the thubnail for sorteio
        $image_page = ""; //space reserved just necessary insert image in page of sorteio
        $description_card = "Sorteio de R$ 100,00";
        $description_page =
            "Como funciona o sorteio automatico?
                após todos os números serem comprados automaticamente após 1 minuto, um algoritimo de sorteio
                entrará em ação para escolher um número de forma aleatória dentre todos os números deste sorteio.

            Boa Sorte!
            ";

        //---------------------------------------------------------------//





        //--------------------- do not edit this code --------------------------//
        DB::insert('insert into tbl_sorteios
        (nome, valor_premio, valor_cota, numbers, data_sorteio, image_card, image_page, description_card, description_page)
         values (?, ?, ?, ?, ?, ?, ?, ?, ?)',
        [$nome, $valor_premio, $valor_cota, $numbers, $data_sorteio, $image_card, $image_page, $description_card, $description_page]);


        $id_sorteio = DB::table('tbl_sorteios')->where('nome', $nome)->value('id');
        echo($id_sorteio);

        //creating a table for numbers
        Schema::create($nome, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sorteio');
            $table->integer('number');
            $table->unsignedBigInteger('user_id_purchased')->nullable();
            $table->string('id_pix')->nullable();
            $table->date('hora_compra')->nullable();
            $table->timestamps();
        });

        Schema::table($nome, function (Blueprint $table) {
            $table->foreign('user_id_purchased')->references('id')->on('users');
        });

        Schema::table($nome, function (Blueprint $table) {
            $table->foreign('id_sorteio')->references('id')->on('tbl_sorteios');
        });

        for($i=0;$i < $numbers;$i++){
            DB::table($nome)->insert([
                'id_sorteio' => $id_sorteio,
                'number' => $i,
                'hora_compra' => null
            ]);
       }

        echo("Sorteio criado com sucesso\n");
        return 0;
    }
}
