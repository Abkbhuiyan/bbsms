<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateBloodRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_blood_requests', function (Blueprint $table) {
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
            $table->text('problem_description');
            $table->unsignedBigInteger('org_id');
            $table->foreign('org_id')->references('id')->on('voluntary_organizations')->onDelete('cascade')->onUpdate('no action');
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
        Schema::dropIfExists('private_blood_requests');
    }
}
