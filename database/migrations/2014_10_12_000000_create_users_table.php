<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('subscriber'); // Only fillable in admin
            $table->string('avatar')->default('http://meetdev.com/assets/img/icon-user-default.png');
            $table->string('bgimage')->default('https://i.redd.it/3t88melm5eb01.jpg');
            $table->string('address')->default('Some address');
            $table->string('phone')->default('0123456789');
            $table->string('bio')->default('Your biography');
            $table->string('userTags')->default('Open computer,');
            // Social
            $table->string('facebook')->default('https://fb.com')->nullable();
            $table->string('twitter')->default('https://twitter.com')->nullable();
            $table->string('github')->default('https://github.com')->nullable();
            $table->string('instagram')->default('https://instagram.com')->nullable();
            $table->string('snapchat')->default('https://snapchat.com')->nullable();
            $table->string('googlePlus')->default('https://plus.google.com')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
