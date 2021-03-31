<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->decimal('total_amount', 8, 2);
            $table->unsignedBigInteger('delivery_company_id');
            $table->foreign('delivery_company_id')->references('id')->on('delivery_companies');
            $table->string('delivery_company_name', 255);
            $table->string('tracking_code', 255);
            $table->tinyInteger('delivery_status');
            $table->tinyInteger('payment_status');
            $table->decimal('delivery_amount', 8, 2);
            $table->decimal('discount_amount', 8, 2);
            $table->decimal('total_payment_amount', 8, 2);
            $table->unsignedBigInteger('payment_method_id');
            $table->foreign('payment_method_id')->references('id')->on('paymentMethods');
            $table->string('receiver_name', 255);
            $table->string('receiver_contact', 255);
            $table->string('receiver_email', 255);
            $table->string('address', 255);
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('postcode_id');
            $table->foreign('postcode_id')->references('id')->on('postcodes');
            $table->string('transaction_id', 20);
            $table->tinyInteger('status');
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('orders');
    }
}
