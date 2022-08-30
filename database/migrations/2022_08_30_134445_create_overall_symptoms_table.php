<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOverallSymptomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overall_symptoms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId( 'user_id' );
            $table->timestamp( 'overall_symptom_time' )->nullable();
            $table->integer( 'overall_symptom' )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overall_symptoms');
    }
}