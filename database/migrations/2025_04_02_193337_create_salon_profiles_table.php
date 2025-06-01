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
        Schema::create('salon_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('salon_uid');
            $table->string('salon_name')->nullable();
            $table->string('salon_logo')->nullable();
            $table->string('salon_banner')->nullable();
            $table->longText('about_us')->nullable();
            $table->string('salon_type')->default('unisex')->comment('unisex,male,female');
            $table->text('full_address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('contact_number');
            $table->string('business_email')->nullable();
            $table->integer('staff_count')->default(0);
            $table->string('website_url')->nullable();
            $table->json('operating_days')->nullable()->default('[]');
            $table->string('opening_hours')->nullable()->default('9:30am');
            $table->string('closing_hours')->nullable()->default('9:30pm');
            $table->json('social_media_links')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salon_profiles');
    }

    public function salon()
    {
        return $this->belongsTo(Salon::class, 'salon_uid', 'salon_uid');
    }
};
