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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->integer('role')->default(10);
            $table->string('name');
            $table->string('surname');
            $table->timestamp('dateOfBirth');
            $table->timestamps();

            $table->foreign('business_id')
            ->references('id')
            ->on('businesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
