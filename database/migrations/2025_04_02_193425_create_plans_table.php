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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_uid')->unique();
            $table->string('plan_name');
            $table->string('plan_title');
            $table->text('description')->nullable(); // Added description
            $table->string('plan_slug')->unique()->nullable();
            $table->string('appointment_count')->default(-1);
            $table->string('sms_count')->default(-1);
            $table->string('staff_count')->default(-1);
            $table->string('branch_count')->default(-1);
            $table->string('product_count')->default(-1);
            $table->string('trial_period_days')->default(7);
            $table->string('amount')->default(0);
            $table->string('default_currency')->default('INR');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
