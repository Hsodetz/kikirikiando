<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistances', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('matter_id')->unsigned(); //unsigned para que no permita numeros negativos
            $table->integer('student_id')->unsigned();
            $table->enum('assistance_result', ['PRESENT', 'JUSTIFY', 'NOPRESENT'])->default('PRESENT');
            $table->dateTime('date_time');

            //Relaciones
            $table->foreign('matter_id')->references('id')->on('matters');
            $table->foreign('student_id')->references('id')->on('students');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistances');
    }
}
