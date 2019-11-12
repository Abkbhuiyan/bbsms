<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateOrgDonationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_org_donation_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('donation_date');
            $table->string('location');
            $table->string('seeker_name');
            $table->unsignedBigInteger('org_id');
            $table->foreign('org_id')->references('id')->on('voluntary_organizations')->onDelete('cascade')->onUpdate('no action');
            $table->unsignedBigInteger('donor_id');
            $table->foreign('donor_id')->references('id')->on('organization_donor_databases')->onDelete('No Action')->onUpdate('no action');
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
        Schema::dropIfExists('private_org_donation_histories');
    }
}
