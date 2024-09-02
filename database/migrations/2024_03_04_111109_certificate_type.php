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
        Schema::create('certificate_type', function (Blueprint $table) {
            $table->id('cert_type_id');
            $table->string('cert_Name', 255);
            $table->string('cert_Code', 10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('certificate_type', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        // Schema::dropIfExists('certificate_type');
    }
};
