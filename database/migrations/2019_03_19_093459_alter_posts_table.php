<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('posts', function(Blueprint $table){
            $table->dropColumn('layout');
            $table->dropColumn('page_image');
            $table->dropColumn('subtitle');
            $table->string('meta_description', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('posts', function(Blueprint $table){
            $table->string('meta_description')->change();
            $table->string('subtitle', 255);
            $table->string('page_image');
            $table->string('layout');
        });
    }
}
