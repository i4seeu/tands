<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_requisitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unSignedBigInteger('user_id');
            $table->string('contact_no');
            $table->text('description');
            $table->unSignedBigInteger('car_type_id');
            $table->unSignedBigInteger('no_passengers');
            $table->date('date_required');
            $table->time('time_out');
            $table->time('time_back');
            $table->unSignedBigInteger('current_stage')->default(1);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_type_id')->references('id')->on('car_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transport_requisitions');
    }
}
