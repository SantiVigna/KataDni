<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDniLettersTable extends Migration
{
    public function up()
    {
        Schema::create('dni_letters', function (Blueprint $table) {
            $table->id();
            $table->string('letter', 1);
            $table->integer('index');
            $table->timestamps();
        });

        // Insertar las letras del DNI
        DB::table('dni_letters')->insert([
            ['letter' => 'T', 'index' => 0],
            ['letter' => 'R', 'index' => 1],
            ['letter' => 'W', 'index' => 2],
            ['letter' => 'A', 'index' => 3],
            ['letter' => 'G', 'index' => 4],
            ['letter' => 'M', 'index' => 5],
            ['letter' => 'Y', 'index' => 6],
            ['letter' => 'F', 'index' => 7],
            ['letter' => 'P', 'index' => 8],
            ['letter' => 'D', 'index' => 9],
            ['letter' => 'X', 'index' => 10],
            ['letter' => 'B', 'index' => 11],
            ['letter' => 'N', 'index' => 12],
            ['letter' => 'J', 'index' => 13],
            ['letter' => 'Z', 'index' => 14],
            ['letter' => 'S', 'index' => 15],
            ['letter' => 'Q', 'index' => 16],
            ['letter' => 'V', 'index' => 17],
            ['letter' => 'H', 'index' => 18],
            ['letter' => 'L', 'index' => 19],
            ['letter' => 'C', 'index' => 20],
            ['letter' => 'K', 'index' => 21],
            ['letter' => 'E', 'index' => 22],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('dni_letters');
    }
}
