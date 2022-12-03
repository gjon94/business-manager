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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('business_id')->nullable()->default(null);
            $table->unsignedBigInteger('contract_id')->nullable()->default(null);

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

        Schema::dropColumns('users', ['business_id', 'contract_id']);
    }
};
