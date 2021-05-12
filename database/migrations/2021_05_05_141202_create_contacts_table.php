<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->string('firstPhone');
            $table->string('secondPhone');
            $table->string('thirdPhone');
            $table->string('address');
            $table->timestamp('startTimeWork');
            $table->timestamp('endTimeWork');
            $table->string('email');
            $table->text('gMapLink');
            $table->timestamps();
            $table->foreign('language_id')
                ->references('id')
                ->on('languages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
