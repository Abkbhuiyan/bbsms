<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoluntaryOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntary_organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group_type');
            $table->string('group_name');
            $table->string('group_contact');
            $table->string('admin_contact');
            $table->string('district');
            $table->text('address');
            $table->string('website_address')->nullable();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('Restrict')->onUpdate('No Action');
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
        Schema::dropIfExists('voluntary_organizations');
    }
}
