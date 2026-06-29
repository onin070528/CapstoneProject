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
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('category');
            $table->string('municipality');
            $table->string('owner_name')->nullable();
            $table->string('owner_phone')->nullable();
            $table->decimal('rating', 3, 1)->default(0.0);
            $table->string('status')->default('ACTIVE'); // ACTIVE, PENDING, DRAFT
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->decimal('lat', 10, 6)->nullable();
            $table->decimal('lng', 10, 6)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('establishments');
    }
};
