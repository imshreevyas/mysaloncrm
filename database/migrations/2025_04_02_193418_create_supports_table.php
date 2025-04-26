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
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('mobile');
            $table->string('email');
            $table->tinyInteger('support_type')->default(0)->comment('0:technical, 1: Application 2: Others');
            $table->tinyInteger('status')->default(1)->comment('0: ongoing, 1: completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};
