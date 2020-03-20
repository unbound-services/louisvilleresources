<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("street_address")->nullable();
            $table->string('zipcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('current_status')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('takeout')->default(false);
            $table->boolean('delivery')->default(false);
            $table->boolean('online_services')->default(false);
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
        Schema::dropIfExists('businesses');
    }
}
