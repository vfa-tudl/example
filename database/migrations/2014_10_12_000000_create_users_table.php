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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            $table->string('gender')->nullable();
            $table->string('display_name')->default("User");
            $table->string('address')->default("");
            $table->string('avatar')->default('Example');
            $table->string('phone_number')->default(""); 

            $table->time('status_date')->nullable(); // Thoi Gian Luu Tru
            $table->string('status')->nullable(); //Tinh Trang Luu Tru
            $table->string('fb_url')->default("");// Thong Tin FB
            $table->text('languages')->nullable();// Ngon Ngu
            $table->text('national')->nullable();//Quoc Tich  

            $table->string('provider', 20)->nullable();
            $table->string('provider_id')->nullable();
            $table->string('access_token')->nullable(); 
                    

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
