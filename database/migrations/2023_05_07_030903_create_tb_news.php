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
        Schema::create('tb_news', function (Blueprint $table) {
            $table->id();
            $table->string("news_kd",5);
            $table->string("id_kat_news",5);
            $table->string('title',50);
            $table->string('tooltip',50);
            $table->string('url',50);
            $table->string('foto')->nullable();
            $table->string('desc')->nullable();
            $table->enum("status",['A',"Na"]);
            $table->timestamps();
            $table->index(["id_kat_news"]);
            //$table->foreignId('tb_kat_news_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_news');
    }
};
