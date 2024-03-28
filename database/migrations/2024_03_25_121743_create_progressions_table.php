<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('progressions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('poids');
            $table->integer('weight');
            $table->integer('height');
            $table->integer('chest_Measurement');
            $table->integer('biceps_Measurement');
            $table->integer('waist_Measurement');
            $table->integer('hip_Measurement');
            $table->integer('squat');
            $table->integer('deadlift');
            $table->integer('pushUp');
            $table->string('status');
            $table->date('date');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progressions');
    }
};
