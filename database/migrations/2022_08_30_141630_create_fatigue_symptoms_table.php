<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFatigueSymptomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatigue_symptoms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId( 'user_id' );
            $table->timestamp( 'fatigue_symptom_time' )->nullable();
            $table->integer( 'fatigue_symptom' )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fatigue_symptoms');
    }
}
