<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_officers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bmo_no');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->text('address');
            $table->unsignedBigInteger('blood_bank_id');
            $table->foreign('blood_bank_id')->references('id')->on('blood_banks')->onDelete('RESTRICT')->onUpdate('NO ACTION');
            $table->string('status')->default('pending');
            $table->string('job_status')->default('active');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('admins')->onDelete('RESTRICT')->onUpdate('NO ACTION');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medcial_officers');
    }
}
