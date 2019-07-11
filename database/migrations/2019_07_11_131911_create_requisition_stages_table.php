<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_stages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unSignedBigInteger('stage_id');
            $table->unSignedBigInteger('requisition_type_id');
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
            $table->foreign('requisition_type_id')->references('id')->on('requisition_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisition_stages');
    }
}
