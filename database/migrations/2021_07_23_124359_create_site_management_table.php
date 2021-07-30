<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_management', function (Blueprint $table) {
            $table->id();
            $table->string('main_title')->nullable();
            $table->string('facebook')->nullable();
            $table->string('behance')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('skype')->nullable();
            $table->string('m_teams')->nullable();
            $table->string('linkedin')->nullable();

            $table->text('aboutDesc')->nullable();
            $table->string('role_title')->nullable();
            $table->text('short_note')->nullable();
            $table->date('birthday')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('age')->nullable();
            $table->string('education')->nullable();
            $table->string('mail')->nullable();
            $table->string('status')->nullable();
            $table->text('aboutme')->nullable();
            $table->string('featured')->nullable();
            $table->string('cv')->nullable();

            $table->string('service_intro')->nullable();

            $table->string('service1title')->nullable();
            $table->string('service1desc')->nullable();

            $table->string('service2title')->nullable();
            $table->string('service2desc')->nullable();

            $table->string('service3title')->nullable();
            $table->string('service3desc')->nullable();

            $table->string('service4title')->nullable();
            $table->string('service4desc')->nullable();

            $table->string('service5title')->nullable();
            $table->string('service5desc')->nullable();

            $table->string('service6title')->nullable();
            $table->string('service6desc')->nullable();

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
        Schema::dropIfExists('site_management');
    }
}
