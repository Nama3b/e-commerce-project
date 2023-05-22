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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author');
            $table->string('title');
            $table->text('content');
            $table->enum('post_type', ['BLOG', 'NEWS']);
            $table->enum('status', ['WAITING', 'ACTIVE', 'CLOSED'])->default('WAITING');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author')->references('id')->on('members')->on('customers')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
