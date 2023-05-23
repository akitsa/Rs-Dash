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
        Schema::create('tb_galery_vid', function (Blueprint $table) {
            $table->id();
            $table->string("id_Gal_vid");
            $table->string("title");
            $table->string('video')->nullable();
            $table->string('desc');
            $table->enum('status',['A','NA']);
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
        Schema::dropIfExists('tb_galery_vid');
    }
};
