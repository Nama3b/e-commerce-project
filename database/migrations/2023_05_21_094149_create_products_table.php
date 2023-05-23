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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('creator');
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('price');
            $table->string('quantity');
            $table->enum('status', ['STOCKOUT', 'STOCKING', 'BANNED'])->default('STOCKING');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('product_category')->onUpdate('cascade');
            $table->foreign('creator')->references('id')->on('members')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
