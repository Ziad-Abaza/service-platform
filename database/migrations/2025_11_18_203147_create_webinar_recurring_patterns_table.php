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
        Schema::create('webinar_recurring_patterns', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'weekly','monthly','daily'
            $table->json('days_of_week')->nullable();
            $table->integer('day_of_month')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinar_recurring_patterns');
    }
};
