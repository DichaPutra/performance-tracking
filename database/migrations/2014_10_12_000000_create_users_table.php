<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

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
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role')->default('client')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('sub_plan')->nullable();
            $table->time('expire_at')->nullable();
            $table->boolean('is_active')->nullable();
            $table->string('company_name')->nullable();
            $table->unsignedBigInteger('company_business_category')->nullable();
            $table->foreign('company_business_category')->references('id')->on('business_categories');
            $table->string('company_address')->nullable();
            $table->bigInteger('client_parent')->nullable();
            $table->string('level')->nullable();
            $table->string('level_name')->nullable();
            $table->string('position')->nullable();
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
