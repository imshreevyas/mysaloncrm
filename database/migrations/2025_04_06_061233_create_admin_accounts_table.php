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
        Schema::create('admin_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('application_name');
            $table->string('main_logo');
            $table->string('fav_icon32_32');
            $table->string('fav_icon16_16');
            $table->string('index');
            $table->string('contact_number');
            $table->string('email_id');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_accounts');
    }
};
