<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSevicesthreeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sevicesthree_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('sevicesthree_id')->unsigned();
            $table->string('title');
            $table->text('desc');
            $table->string('locale')->index();
            $table->unique(['sevicesthree_id', 'locale']);
            $table->foreign('sevicesthree_id')->references('id')->on('sevicesthrees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sevicesthree_translations');
    }
}
