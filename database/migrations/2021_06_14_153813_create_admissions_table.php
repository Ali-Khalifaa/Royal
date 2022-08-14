<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->date('birth_date');
            $table->enum('gender', ['male','female']);
            $table->string('img');
            $table->integer('national_id');

            $table->date('graduation');
            $table->string('university');
            $table->string('c_v');
        
            $table->boolean('work')->default(0);
            $table->enum('employment', ['governmental','non-governmental']);
            $table->integer('experience')->nullable();

            $table->unsignedBigInteger('nationality_id')->unsigned();
            $table->unsignedBigInteger('specialization_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->boolean('step_1')->default(0);
            $table->boolean('step_2')->default(0);
            $table->boolean('step_3')->default(0);
            $table->enum('stutas', ['success','fail']);
            $table->boolean('exam')->default(0);


            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('specialization_id')->references('id')->on('specializations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admissions');
    }
}
