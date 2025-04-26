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
        Schema::create('page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->unique();
            $table->string('page_title');
            $table->string('page_seo_title')->nullable();
            $table->text('page_seo_description')->nullable();
            $table->text('page_seo_keywords')->nullable();
            $table->string('page_og_title')->nullable();
            $table->text('page_og_description')->nullable();
            $table->string('page_og_image')->nullable();
            $table->string('page_og_url')->nullable();
            $table->string('page_og_type')->default('website');
            $table->string('page_twitter_card')->default('summary_large_image');
            $table->string('page_twitter_title')->nullable();
            $table->text('page_twitter_description')->nullable();
            $table->string('page_twitter_image')->nullable();
            $table->string('page_schema_type')->default('WebPage');
            $table->json('page_schema_json')->nullable();
            $table->string('page_canonical_url')->nullable();
            $table->string('page_robots')->default('index, follow');
            $table->string('page_breadcrumb')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_settings');
    }
};
