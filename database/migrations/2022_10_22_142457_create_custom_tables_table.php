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
        Schema::create('custom_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->string('name', 50);
            $table->string('description', 255);
            $table->integer('last_editor_id');
            $table->unsignedBigInteger('deadline_id');

            $table->foreign('business_id')->references('id')->on('businesses');

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
        Schema::dropIfExists('custom_tables');
    }
};
