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
        Schema::create('asks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('company')->nullable(false);
            $table->string('ask-name')->nullable(false);
            $table->string('message')->nullable(false);
            $table->string('file')->nullable(false);
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
        Schema::dropIfExists('asks');
    }
};
