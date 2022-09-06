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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender')->default("NG");
            $table->string('display_name');
            $table->string('address');
            $table->string('avatar')->default('Example');
            $table->string('phone_number'); 
            $table->time('status_date'); // Thoi Gian Luu Tru
            $table->string('status'); //Tinh Trang Luu Tru
            $table->string('fb_url');// Thong Tin FB
            $table->text('languages');// Ngon Ngu
            $table->text('national');//Quoc Tich  

            $table->string('provider', 20)->nullable();
            $table->string('provider_id')->nullable();
            $table->string('access_token')->nullable(); 
                     
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
};
