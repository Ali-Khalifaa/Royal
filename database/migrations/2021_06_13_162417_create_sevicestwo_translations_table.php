<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSevicestwoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sevicestwo_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('sevicestwo_id')->unsigned();
            $table->string('name');
            $table->text('desc');
            $table->string('title_one');
            $table->string('title_two');
            $table->string('title_three');
            $table->string('title_four');
            $table->string('title_fiv');
            $table->string('title_six');
         
           
            $table->string('locale')->index();
            $table->unique(['sevicestwo_id', 'locale']);
            $table->foreign('sevicestwo_id')->references('id')->on('sevicestwos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sevicestwo_translations');
    }
}
