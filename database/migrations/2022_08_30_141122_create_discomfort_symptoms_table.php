<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscomfortSymptomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discomfort_symptoms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId( 'user_id' );
            $table->timestamp( 'discomfort_symptom_time' )->nullable();
            $table->integer( 'discomfort_symptom' )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discomfort_symptoms');
    }
}
