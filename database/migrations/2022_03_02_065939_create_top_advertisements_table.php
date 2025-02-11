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
        Schema::create('top_advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('top_ad1');
            $table->string('top_ad1_url')->nullable();
            $table->string('top_ad1_status');
            $table->timestamps();
            $table->string('top_ad2');
            $table->string('top_ad_url2')->nullable();
            $table->string('top_ad2_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_advertisements');
    }
};
