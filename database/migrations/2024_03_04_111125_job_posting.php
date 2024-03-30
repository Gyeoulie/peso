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
        Schema::create('job_posting', function (Blueprint $table) {
            $table->id('job_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('industry_id');
            $table->unsignedBigInteger('position_id');
            $table->text('job_Description');
            $table->string('job_Wage', 20);
            $table->integer('job_Slots');
            $table->string('job_Address', 255);
            $table->unsignedBigInteger('barangay_id');
            $table->date('job_Duration');
            $table->string('job_Status', 15);
            $table->timestamps();

            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('industry_id')->references('industry_id')->on('job_industry')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('position_id')->references('position_id')->on('job_positions')->onDelete('cascade')
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
        Schema::dropIfExists('job_posting');
    }
};
