<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category')->nullable()->comment('category accounts');
            $table->string('title')->nullable()->comment('title accounts');
            $table->string('description')->nullable()->comment('Description accounts');
            $table->float('price')->comment('price accounts');
            $table->integer('status')->unsigned()->default(1)->comment('status accounts');
            $table->bigInteger('user_id')->unsigned()->index()->comment('reference to the data with which you log into the system');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('accounts');
    }
}
