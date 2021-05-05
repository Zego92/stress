<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->string('headerTitle');
            $table->string('fioTitle');
            $table->string('fioPlaceholderTitle');
            $table->string('emailTitle');
            $table->string('emailPlaceholderTitle');
            $table->string('phoneTitle');
            $table->string('phonePlaceholderTitle');
            $table->string('messageTitle');
            $table->string('messagePlaceholderTitle');
            $table->string('messageDescriptionTitle');
            $table->string('messageDescriptionPlaceholderTitle');
            $table->timestamps();
            $table->foreign('language_id')
                ->references('id')
                ->on('languages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_pages');
    }
}
