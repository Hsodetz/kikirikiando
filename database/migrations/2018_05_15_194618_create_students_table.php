<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('school_id')->unsigned();
            $table->integer('father_id')->unsigned();

            $table->integer('registration_number')->unsigned();
            $table->string('name', 50);
            $table->string('lastname', 50);
            $table->unsignedSmallInteger('age');

            //Relaciones
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('father_id')->references('id')->on('fathers')->onDelete('cascade');

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
        Schema::dropIfExists('students');
    }
}
