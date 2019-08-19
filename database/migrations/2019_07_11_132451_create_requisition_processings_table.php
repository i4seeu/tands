<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionProcessingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_processings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unSignedBigInteger('requisition_id');
            $table->unSignedBigInteger('requisition_type_id');
            $table->unSignedBigInteger('requisition_stage');
            $table->string('action');
            $table->text('comment')->nullable();
            $table->unSignedBigInteger('user_id');
            $table->foreign('requisition_type_id')->references('id')->on('requisition_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('requisition_processings');
    }
}
