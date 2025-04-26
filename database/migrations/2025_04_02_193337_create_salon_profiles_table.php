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
            $table->string('salon_logo')->nullable();
            $table->integer('salon_type')->default(0)->comment('0:unisex,1:male,2:female');
            $table->string('full_address');
            $table->string('contact_number');
            $table->string('business_email')->nullable();
            $table->integer('staff_count')->default(0);
            $table->integer('established_year')->nullable();
            $table->string('website_url')->nullable();
            $table->json('operating_hours')->nullable();
            $table->json('operating_days')->nullable();
            $table->json('social_media_links')->nullable();
            $table->text('cancellation_policy')->nullable();
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
