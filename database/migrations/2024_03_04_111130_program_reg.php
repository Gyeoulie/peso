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
        Schema::create('program_reg', function (Blueprint $table) {
            $table->id('program_reg_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('program_id');
            $table->string('program_reg_Status', 15);
            $table->timestamps(); // Adds created_at and updated_at columns

            $table->foreign('program_id')->references('program_id')->on('programs')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_reg');
    }
};
