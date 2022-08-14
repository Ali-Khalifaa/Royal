<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoseTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chose_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('chose_id')->unsigned();
            $table->string('title');
            $table->text('desc');
            $table->string('locale')->index();
            $table->unique(['chose_id', 'locale']);
            $table->foreign('chose_id')->references('id')->on('choses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chose_translations');
    }
}
