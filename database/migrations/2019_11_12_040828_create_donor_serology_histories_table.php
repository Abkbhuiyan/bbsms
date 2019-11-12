<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorSerologyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_serology_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('id')->on('blood_donors')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('serology_tests')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->string('result');
            $table->unsignedBigInteger('medical_officer_id');
            $table->foreign('medical_officer_id')->references('id')->on('medical_officers')->onDelete('Restrict')->onUpdate('no action');
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
        Schema::dropIfExists('donor_serology_histories');
    }
}
