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
        Schema::create('requirements_passed', function (Blueprint $table) {
            $table->id('req_passed_id');
            $table->unsignedBigInteger('job_id')->comment('Foreign Key');
            $table->unsignedBigInteger('requirement_id')->comment('Foreign Key');
            $table->string('req_passed_Input', 255);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('job_id')->references('job_id')->on('job_posting');
            $table->foreign('requirement_id')->references('requirement_id')->on('requirements');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requirements_passed', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        // Schema::dropIfExists('requirements_passed');
    }
};
