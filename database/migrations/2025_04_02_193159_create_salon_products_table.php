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
        Schema::create('salon_products', function (Blueprint $table) {
            $table->id();
            $table->string('salon_uid');
            $table->integer('salon_type')->default(0)->comment('0:unisex,1:male,2:female');
            $table->string('address');
            $table->string('contact_number');
            $table->string('business_email')->nullable();
            $table->integer('staff_count')->default(0);
            $table->integer('staff_countestabished_year');
            $table->string('website_url')->nullable();
            $table->string('salon_logo')->nullable();
            $table->json('operating_hours')->default('10am-10pm');
            $table->json('operating_days')->default('monday,tuesday,wednesday,thrusday,friday,saturday,sunday');
            $table->json('social_media_links');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salon_products');
    }
};
