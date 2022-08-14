<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutsetting_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('aboutsetting_id')->unsigned();
            $table->string('name')->index();
            $table->string('title_one')->index();
            $table->string('title_two')->index();
            $table->string('title_three')->index();
            $table->string('title_four')->index();
            $table->text('desc');
         
           
            $table->string('locale')->index();
            $table->unique(['aboutsetting_id', 'locale']);
            $table->foreign('aboutsetting_id')->references('id')->on('aboutsettings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutsetting_translations');
    }
}
