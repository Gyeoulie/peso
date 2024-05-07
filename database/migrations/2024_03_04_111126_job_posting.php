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
            $table->text('job_Description')->nullable();
            $table->text('job_Qualifications')->nullable();
            $table->text('job_Remarks')->nullable();
            $table->decimal('job_MinWage', 10, 2)->nullable();
            $table->decimal('job_MaxWage', 10, 2)->nullable();
            $table->integer('job_Slots');
            $table->string('job_Address', 255);
            $table->unsignedBigInteger('barangay_id');
            $table->date('job_Duration');
            $table->string('job_Status', 15);
            $table->unsignedBigInteger('peso_id');
            $table->unsignedBigInteger('peso_municipality_id');
            $table->text('peso_Remarks')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('industry_id')->references('industry_id')->on('job_industry')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('position_id')->references('position_id')->on('job_positions')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('barangay_id')->references('barangay_id')->on('barangay')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('peso_id')->references('peso_id')->on('peso')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('peso_municipality_id')->references('municipality_id')->on('municipality')->onDelete('cascade')
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
