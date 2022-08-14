<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutcountTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutcount_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('aboutcount_id')->unsigned();
            $table->string('name')->index();
            $table->string('locale')->index();
            $table->unique(['aboutcount_id', 'locale']);
            $table->foreign('aboutcount_id')->references('id')->on('aboutcounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutcount_translations');
    }
}
