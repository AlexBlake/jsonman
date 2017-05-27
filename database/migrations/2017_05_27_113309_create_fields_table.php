<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->integer('parent_id')->nullable()->unsigned();
            $table->integer('template_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('fields', function (Blueprint $table) {
            
            $table->foreign('parent_id')->references('id')->on('fields')->onDelete('cascade');
            $table->foreign('template_id')->references('id')->on('templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
