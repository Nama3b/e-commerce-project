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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reference_id');
            $table->unsignedBigInteger('creator');
            $table->string('name');
            $table->enum('tag_type', ['PRODUCT', 'POST']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('reference_id')->references('id')->on('products')->on('posts')->onUpdate('cascade');
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
        Schema::dropIfExists('tags');
    }
};
