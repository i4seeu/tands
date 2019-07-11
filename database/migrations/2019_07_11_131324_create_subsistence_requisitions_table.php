<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsistenceRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsistence_requisitions', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unSignedBigInteger('user_id');
          $table->text('description');
          $table->string('allowance_scale');
          $table->unSignedBigInteger('current_stage')->default(1);
          $table->unSignedBigInteger('no_days');
          $table->date('from_date');
          $table->date('to_date');
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subsistence_requisitions');
    }
}
