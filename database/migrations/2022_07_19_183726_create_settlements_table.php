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
        Schema::create('settlements', function (Blueprint $table) {
            $table->charset = 'ascii';
            $table->collation = 'ascii_general_ci';
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('key')->nullable();
            $table->string('name')->nullable();
            $table->string('zone_type')->nullable();

            
            $table->unsignedBigInteger('settlement_type_id');
            $table->foreign('settlement_type_id')->references('id')->on('municipalities');

            $table->unsignedBigInteger('zip_code_id');
            $table->foreign('zip_code_id')->references('id')->on('zip_codes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settlements');
    }
};
