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
        Schema::create('visitor_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('establishment_id')->constrained('establishments')->onDelete('cascade');
            $table->integer('visitor_number')->default(1);
            $table->date('visit_date');
            $table->string('visitor_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('origin_type', ['Philippines', 'Foreigner']);
            $table->string('residency_code', 10); // R, Prov, NR, FO
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_registrations');
    }
};
