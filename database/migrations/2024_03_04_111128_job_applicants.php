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
        Schema::create('job_applicants', function (Blueprint $table) {
            $table->id('applicant_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('job_id');
            $table->string('applicant_Status', 15);
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employee')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('job_id')->references('job_id')->on('job_posting')->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applicants');
    }
};
