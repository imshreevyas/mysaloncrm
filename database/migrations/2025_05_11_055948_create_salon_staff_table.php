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
        Schema::create('salon_staff', function (Blueprint $table) {
            $table->id();
            $table->uuid('salon_uid');
            $table->uuid('staff_uid')->unique();
            $table->uuid('role_uid')->nullable()->default(2);
            $table->string('profile_pic')->nullable();
            $table->string('name');
            $table->string('password');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->text('skills')->nullable();
            $table->integer('experience_yrs')->nullable();
            $table->string('designation')->nullable();
            $table->decimal('commission_rate', 5, 2)->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->integer('age')->nullable();
            $table->json('bank_details')->nullable();
            $table->json('personal_documents')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salon_staff');
    }
};
