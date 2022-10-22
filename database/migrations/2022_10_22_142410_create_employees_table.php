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
            $table->string('password');
            $table->string('email')->default()->nullable();
            $table->unsignedBigInteger('business_id');
            $table->unsignedBigInteger('role_id');
            $table->string('name');
            $table->string('surname');
            $table->timestamp('dateOfBirth');
            $table->timestamps();
            $table->rememberToken();
            $table->foreign('business_id')
                ->references('id')
                ->on('businesses');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles');
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