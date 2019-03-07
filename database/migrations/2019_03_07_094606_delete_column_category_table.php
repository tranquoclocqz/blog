<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumnCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_category', function($table) {
           $table->dropColumn('title');
           $table->dropColumn('keywords');
           $table->dropColumn('description');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_category', function($table) {
           $table->dropColumn('title');
           $table->dropColumn('keywords');
           $table->dropColumn('description');
       });
    }
}
