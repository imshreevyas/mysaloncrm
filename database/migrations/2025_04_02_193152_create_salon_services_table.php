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
        Schema::create('salon_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_uid')->unique();
            $table->string('salon_uid');
            $table->string('service_category_uid');
            $table->string('name');
            $table->integer('price');
            $table->text('short_desc');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salon_services');
    }
};
