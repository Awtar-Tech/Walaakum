<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('provider_id');
            $table->foreignId('country_id');
            $table->foreignId('city_id');
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
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
        Schema::dropIfExists('provider_addresses');
    }
}
