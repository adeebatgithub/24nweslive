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
        Schema::create('volunteer', function (Blueprint $table) {
            $table->id();
	    $table->string('category');
            $table->string('name');
            $table->string('email');
            $table->string('status');
            $table->string('spirituality')->nullable();;
            $table->string('photo')->nullable();
            $table->string('religion');
            $table->string('education');
            $table->string('job');
            $table->string('parish');
            $table->string('parish_priest');
            $table->string('address');
            $table->string('phone');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('comments');
            $table->string('confirmation');
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
        Schema::dropIfExists('volunteer');
    }
};
