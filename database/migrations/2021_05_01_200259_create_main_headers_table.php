<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainHeadersTable extends Migration
{
    public function up()
    {
        Schema::create('main_headers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->text('brandLogoImage')->nullable();
            $table->text('brandLogoImageLink')->default('user.home');
            $table->string('homeTitle');
            $table->string('homeLink')->default('user.home');
            $table->string('ourProjectsTitle');
            $table->string('ourProjectsLink')->default('user.our-projects');
            $table->string('contactTitle');
            $table->string('contactLink')->default('user.contacts');
            $table->string('feedbackTitle');
            $table->string('feedbackLink')->default('user.feedback');
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
        Schema::dropIfExists('main_headers');
    }
}
