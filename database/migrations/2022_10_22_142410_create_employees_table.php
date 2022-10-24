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
            $table->string('email')->default(null)->nullable();
            $table->unsignedBigInteger('business_id');
            $table->integer('role')->default(10);
            $table->unsignedBigInteger('contract_id')->default(1);
            $table->string('name');
            $table->string('surname');
            $table->timestamp('dateOfBirth');
            $table->timestamps();
            $table->rememberToken();
            $table->foreign('business_id')
                ->references('id')
                ->on('businesses');

            $table->foreign('contract_id')
                ->references('id')
                ->on('contracts');
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
