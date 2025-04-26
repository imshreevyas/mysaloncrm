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
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->string('salon_uid')->unique();
            $table->string('salon_name')->nullable();
            $table->string('password')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->tinyInteger('is_salon_email_verified')->default('0')->comment('1: Yes, 0: No');
            $table->string('salon_email_verified_date')->nullable();
            $table->string('google_verified')->default(0);
            $table->integer('days_left')->default(14);
            $table->integer('updated_profile')->default(0);
            $table->tinyInteger('subscription_id')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salons');
    }
    
    public function profile()
    {
        return $this->hasOne(SalonProfile::class, 'salon_uid', 'salon_uid');
    }
};
