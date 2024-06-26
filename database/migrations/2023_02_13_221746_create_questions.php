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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'question')->default(value:'0')->nullable();
            $table->string(column: 'a')->default(value:'0')->nullable();
            $table->string(column: 'b')->default(value:'0')->nullable();
            $table->string(column: 'c')->default(value:'0')->nullable();
            $table->string(column: 'd')->default(value:'0')->nullable();
            $table->string('answer');
            $table->string('idTest');
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
        Schema::dropIfExists('questions');
    }
};
