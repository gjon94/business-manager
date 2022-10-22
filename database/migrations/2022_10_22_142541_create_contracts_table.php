<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_type_id');
            $table->unsignedBigInteger('deadline_id');
            $table->integer('duration');
            $table->integer('hourly_pay');
            $table->string('currency')->default('euro');

            $table->foreign('contract_type_id')->references('id')->on('contract_types');
            $table->foreign('deadline_id')->references('id')->on('deadlines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
