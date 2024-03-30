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
        Schema::create('programs', function (Blueprint $table) {
            $table->id('program_id');
            $table->string('program_Title', 255);
            $table->text('program_Description');
            $table->string('program_Host', 255);
            $table->unsignedBigInteger('industry_id');
            $table->dateTime('program_Datetime');
            $table->string('program_Address', 255);
            $table->unsignedBigInteger('barangay_id');
            $table->string('program_Status', 15);
            $table->timestamps(); // Adds created_at and updated_at columns

            $table->foreign('industry_id')->references('industry_id')->on('job_industry')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('barangay_id')->references('barangay_id')->on('barangay')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
