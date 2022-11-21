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
            $table->unsignedBigInteger('custom_page_id');
            $table->date('column_1')->nullable();
            $table->date('column_2')->nullable();
            $table->string('column_3', 20)->nullable();
            $table->string('column_4', 20)->nullable();

            $table->foreign('custom_page_id')
                ->references('id')
                ->on('custom_pages')
                ->onDelete('cascade');
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
