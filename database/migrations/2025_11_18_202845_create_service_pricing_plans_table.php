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
        Schema::create('service_pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('cascade');
            $table->string('name_ar');
            $table->string('name_en');
            $table->decimal('price', 12, 2);
            $table->foreignId('billing_cycle_id')->constrained('billing_cycles');
            $table->boolean('popular')->default(false);
            $table->integer('sort_order')->default(0);
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();
            $table->string('billing_period_ar')->nullable();
            $table->string('billing_period_en')->nullable();
            $table->string('badge_ar')->nullable();
            $table->string('badge_en')->nullable();
            $table->string('button_text_ar')->nullable();
            $table->string('button_text_en')->nullable();
            $table->string('button_link')->nullable();
            $table->string('second_button_text_ar')->nullable();
            $table->string('second_button_text_en')->nullable();
            $table->string('second_button_link')->nullable();
            $table->string('highlight_text_ar')->nullable();
            $table->string('highlight_text_en')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_pricing_plans');
    }
};
