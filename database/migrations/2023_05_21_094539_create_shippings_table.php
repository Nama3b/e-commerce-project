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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('delivery_id');
            $table->unsignedBigInteger('manager');
            $table->string('customer_name');
            $table->string('shipping_delivery_address');
            $table->string('phone_number');
            $table->string('shipping_delivery_time');
            $table->enum('status', ['PENDING', 'TRANSPORTING', 'COMPLETED', 'CANCELLED']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('delivery_id')->references('id')->on('delivery')->onUpdate('cascade');
            $table->foreign('manager')->references('id')->on('members')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippings');
    }
};
