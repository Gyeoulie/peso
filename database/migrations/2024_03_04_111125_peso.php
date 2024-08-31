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
        Schema::create('peso', function (Blueprint $table) {
            $table->id('peso_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('municipality_id');
            $table->string('peso_Fname', 255);
            $table->string('peso_Mname', 255);
            $table->string('peso_Lname', 255);
            $table->string('peso_Pnumber', 255);
            $table->timestamps(); // Adds created_at and updated_at columns
            $table->softDeletes();

            $table->foreign('municipality_id')->references('municipality_id')->on('municipality');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peso', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        // Schema::dropIfExists('peso');
    }
};
