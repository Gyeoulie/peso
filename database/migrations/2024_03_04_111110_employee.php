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
        Schema::create('employee', function (Blueprint $table) {
            $table->id('employee_id');
            $table->unsignedBigInteger('user_id')->unsigned()->comment('Foreign Key');
            $table->string('fname', 255);
            $table->string('mname', 255);
            $table->string('lname', 255);
            $table->string('suffix', 255)->nullable();
            $table->string('height', 3)->nullable();
            $table->tinyInteger('gender');
            $table->tinyInteger('civilstatus');
            $table->string('religion', 255)->nullable();
            $table->date('birthdate');
            $table->string('pnumber', 255);
            $table->string('address', 255);
            $table->unsignedBigInteger('barangay')->unsigned()->comment('Foreign Key');
            $table->string('tinnum', 15);
            $table->tinyInteger('empstatus');
            $table->string('empstatusdesc', 2);
            $table->string('pimg', 255);
            $table->string('resume', 255)->nullable();
            $table->text('empDesc')->nullable();
            $table->timestamps(); // This will add created_at and updated_at columns

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('barangay')->references('barangay_id')->on('barangay')->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
