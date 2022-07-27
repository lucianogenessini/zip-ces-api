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
        Schema::create('federal_entities', function (Blueprint $table) {
            $table->charset = 'ascii';
            $table->collation = 'ascii_general_ci';
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('key')->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('code')->nullable();


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
        Schema::dropIfExists('federal_entities');
    }
};
