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
        Schema::create('content_custom_columns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custom_column_name_id');
            $table->string('content', 20)->default('');

            $table->foreign('custom_column_name_id')
                ->references('id')
                ->on('custom_column_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_custom_columns');
    }
};
