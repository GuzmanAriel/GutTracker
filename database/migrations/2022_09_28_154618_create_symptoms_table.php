<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSymptomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symptoms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId( 'user_id' );
            $table->timestamp( 'symptom_time' )->nullable();
            $table->integer( 'overall_symptom' )->nullable();
            $table->integer( 'abdominal_symptom' )->nullable();
            $table->integer( 'discomfort_symptom' )->nullable();
            $table->integer( 'bloating_symptom' )->nullable();
            $table->integer( 'fatigue_symptom' )->nullable();
            $table->integer( 'brain_symptom' )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('symptoms');
    }
}
