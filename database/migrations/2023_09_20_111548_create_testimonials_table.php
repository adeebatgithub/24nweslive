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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
	    $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('location');
            $table->string('photo')->nullable();
            $table->string('audio')->nullable();
            $table->string('video')->nullable();
            $table->string('title');
            $table->text('testimony');
            $table->string('show_on_page')->nullable();
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
        Schema::dropIfExists('testimonials');
    }
};
