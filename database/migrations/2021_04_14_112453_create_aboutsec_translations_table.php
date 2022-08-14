<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsecTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutsec_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('aboutsec_id')->unsigned();
            $table->string('title')->index();
            $table->string('locale')->index();
            $table->unique(['aboutsec_id', 'locale']);
            $table->foreign('aboutsec_id')->references('id')->on('aboutsecs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutsec_translations');
    }
}
