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
        Schema::create('custom_column_names', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custom_table_id');
            $table->string('name', 15)->default('no_name');
            $table->foreign('custom_table_id')
                ->references('id')
                ->on('custom_tables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_column_names');
    }
};
