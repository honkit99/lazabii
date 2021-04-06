<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('delivery_states', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_company_id');
            $table->foreign('delivery_company_id')->references('id')->on('Delivery_Companies');
            $table->string('state_area');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_states');
    }
}
