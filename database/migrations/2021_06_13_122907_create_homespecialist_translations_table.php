<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomespecialistTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homespecialist_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('homespecialist_id')->unsigned();
            $table->string('name');
            $table->string('specialist');
            $table->string('locale')->index();
            $table->unique(['homespecialist_id', 'locale']);
            $table->foreign('homespecialist_id')->references('id')->on('homespecialists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homespecialist_translations');
    }
}
