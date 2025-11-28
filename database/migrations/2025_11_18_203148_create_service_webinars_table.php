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
        Schema::create('service_webinars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null');
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->dateTime('schedule_date');
            $table->string('video')->nullable();
            $table->integer('duration'); // in minutes
            $table->string('registration_url')->nullable();
            $table->boolean('is_recurring')->default(false);
            $table->foreignId('recurring_pattern_id')
                ->nullable()
                ->constrained('webinar_recurring_patterns')
                ->nullOnDelete();
            $table->integer('max_attendees')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_webinars');
    }
};
