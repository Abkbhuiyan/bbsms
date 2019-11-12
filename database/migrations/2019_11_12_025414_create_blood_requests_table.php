<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('requestor_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->unsignedBigInteger('required_blood_group_id');
            $table->foreign('required_blood_group_id')->references('id')->on('blood_groups');
            $table->string('hospital');
            $table->date('need_date');
            $table->decimal('lattitude',10,8)->nullable();
            $table->decimal('longitude',11,8)->nullable();
            $table->unsignedBigInteger('seeker_id')->nullable();
            $table->foreign('seeker_id')->references('id')->on('blood_seekers')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->text('problem_description');
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
        Schema::dropIfExists('blood_requests');
    }
}
