<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounterTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counter_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('counter_id')->unsigned();
            $table->string('title');
            $table->string('locale')->index();
            $table->unique(['counter_id', 'locale']);
            $table->foreign('counter_id')->references('id')->on('counters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counter_translations');
    }
}
