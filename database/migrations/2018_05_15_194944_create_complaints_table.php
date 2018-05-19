<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('father_id')->unsigned();
            $table->integer('student_id')->unsigned();

            $table->string('affair', 50);
            $table->text('text');
            $table->string('image');
            $table->string('file');
            $table->enum('gravity', ['HIGH', 'MEDIUM', 'LOW'])->default('LOW');

            $table->foreign('father_id')->references('id')->on('fathers')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

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
        Schema::dropIfExists('complaints');
    }
}
