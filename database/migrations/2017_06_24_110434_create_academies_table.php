<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->increments('idx');
            $table->string('name')->index();
            $table->string('address')->index();
            $table->string('owner');
            $table->string('tel');
            $table->string('course')->comment('교급과정');
            $table->string('subject')->comment('교습과목(반)');
            $table->integer('capacity')->comment('정원');
            $table->string('term')->comment('교습기간');
            $table->string('hours')->comment('총교습시간');
            $table->string('price')->comment('교습비');
            $table->string('option1')->comment('모의고사비');
            $table->string('option2')->comment('재료비');
            $table->string('option3')->comment('급식비');
            $table->string('option4')->comment('기숙사비');
            $table->string('option5')->comment('차량비');
            $table->string('option6')->comment('피복비');
            $table->string('option7')->comment('기타경비합계');
            $table->string('total_price')->comment('총교습비');
            $table->integer('total_teachers');
            $table->unique(['name','subject']);
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
        Schema::dropIfExists('academies');
    }
}
