<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('title',40);
            $table->longText('content');
            $table->integer('create_at');
            $table->integer('update_at');
        });
    }

    /**
     * Reverse the migrions.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
