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
        Schema::create('license', function (Blueprint $table) {
            $table->id('license_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('license_type_id');
            $table->date('license_validity');
            $table->timestamps(); // Adds created_at and updated_at columns
            
            // Foreign key constraints
            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('license_type_id')->references('license_type_id')->on('license_type')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license');
    }
};
