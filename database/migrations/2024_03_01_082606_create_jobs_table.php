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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Primary key (unsignedBigInteger)
            $table->string('title');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_type_id')->constrained('job_types')->onDelete('cascade');
            // Other columns in the 'jobs' table
            $table->integer('vacancy')->nullable();
            $table->string('salary')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->text('benefits')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('qualifications')->nullable();
            $table->text('keywords')->nullable();
            $table->string('experience')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_location')->nullable();
            $table->string('company_website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
