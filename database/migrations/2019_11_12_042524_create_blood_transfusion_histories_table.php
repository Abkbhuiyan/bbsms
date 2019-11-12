<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodTransfusionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_transfusion_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('id')->on('blood_donors')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->unsignedBigInteger('mo_id');
            $table->foreign('mo_id')->references('id')->on('medical_officers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->string('transfusion_type');
            $table->string('donated_to')->nullable();
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
        Schema::dropIfExists('blood_transfusion_histories');
    }
}
