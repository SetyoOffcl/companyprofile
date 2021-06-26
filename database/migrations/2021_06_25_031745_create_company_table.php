<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_company', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->longText('home_title')->nullable();
            $table->longText('home_desc')->nullable();
            $table->string('home_image')->nullable();
            $table->longText('about')->nullable();
            $table->string('about_image')->nullable();
            $table->string('client')->nullable();
            $table->string('project')->nullable();
            $table->string('support')->nullable();
            $table->string('employee')->nullable();
            $table->string('service_title')->nullable();
            $table->string('service_desc')->nullable();
            $table->string('pricing_title')->nullable();
            $table->string('pricing_desc')->nullable();
            $table->string('portfolio_title')->nullable();
            $table->string('portfolio_desc')->nullable();
            $table->string('testimonial_title')->nullable();
            $table->string('testimonial_desc')->nullable();
            $table->string('team_title')->nullable();
            $table->string('team_desc')->nullable();
            $table->string('client_title')->nullable();
            $table->string('client_desc')->nullable();
            $table->string('blog_title')->nullable();
            $table->string('blog_desc')->nullable();
            $table->string('faq_title')->nullable();
            $table->string('faq_desc')->nullable();
            $table->string('contact_title')->nullable();
            $table->string('contact_desc')->nullable();
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
        Schema::dropIfExists('tb_company');
    }
}
