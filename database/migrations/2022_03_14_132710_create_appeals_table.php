<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appeals', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->foreignId('competition_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id');
            $table->foreignId('competition_id');
            $table->string('user_name');
            $table->string('participant1_name');
            $table->string('participant2_name')->nullable();
            $table->string('participant3_name')->nullable();
            $table->string('participant4_name')->nullable();
            $table->string('participant5_name')->nullable();
            $table->string('participant1_university');
            $table->string('participant2_university')->nullable();
            $table->string('participant3_university')->nullable();
            $table->string('participant4_university')->nullable();
            $table->string('participant5_university')->nullable();
            $table->string('supervisor_name')->nullable();
            $table->tinyInteger('appeal_status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appeals');
    }
}
