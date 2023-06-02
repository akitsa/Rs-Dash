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
        Schema::create('tb_galery_img', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->string('foto')->nullable();
            $table->string('desc',50);
            $table->enum("status",['A','Na']);
        
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
        Schema::dropIfExists('tb_galery_img');
    }
};
