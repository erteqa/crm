<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('company')->nullable();
            $table->string('taxid')->nullable();
            $table->string('company_taxid')->nullable();
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('set null');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('nationality')->nullable();
            $table->string('passport_number')->nullable();
            $table->float('balance')->default(0);
            $table->string('identity_number')->nullable();
            $table->string('record_number')->nullable();
            $table->string('mersis_number')->nullable();

            $table->string('vergi_username')->nullable();
            $table->string('vergi_password')->nullable();

            $table->string('sgk_username')->nullable();
            $table->string('sgk_password')->nullable();

            $table->string('eimza_username')->nullable();
            $table->string('eimza_password')->nullable();


            $table->string('edevlet_username')->nullable();
            $table->string('edevlet_password')->nullable();

            $table->string('Tc')->nullable();

            $table->integer('isactive')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
