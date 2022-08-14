<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsayTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientsay_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('clientsay_id')->unsigned();
            $table->text('desc');
            $table->string('name');
            $table->string('locale')->index();

            $table->unique(['clientsay_id', 'locale']);
            $table->foreign('clientsay_id')->references('id')->on('clientsays')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientsay_translations');
    }
}
