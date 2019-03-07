<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_category', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('ten',191);
            $table->string('slug',191);
            $table->string('title',191);
            $table->string('keywords',191);
            $table->string('description',191);
            $table->tinyInteger('hienthi');
            $table->string('photo',191);
            $table->string('thumbnail',191);
            $table->string('type',191);
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
        Schema::dropIfExists('table_category');
    }
}
