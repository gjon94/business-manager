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
        Schema::create('column_names', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custom_page_id');
            $table->string('name_column_1', 20)->default('start')->nullable();
            $table->string('name_column_2', 20)->default('end')->nullable();
            $table->string('name_column_3', 20)->default('name')->nullable();
            $table->string('name_column_4', 20)->default('desc')->nullable();

            $table->foreign('custom_page_id')
                ->references('id')
                ->on('custom_pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('column_names');
    }
};
