<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsectiononeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutsectionone_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('aboutsectionone_id')->unsigned();
            $table->string('name');
            $table->text('desc');
            $table->string('title_one');
            $table->string('title_two');
            $table->string('title_three');
            $table->string('title_four');
            $table->string('mission');
            $table->text('desc_mission');
          
         
           
            $table->string('locale')->index();
            $table->unique(['aboutsectionone_id', 'locale']);
            $table->foreign('aboutsectionone_id')->references('id')->on('aboutsectionones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutsectionone_translations');
    }
}
