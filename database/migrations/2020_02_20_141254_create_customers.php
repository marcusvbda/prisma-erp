<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->engine = 'InnoDB';
            $table->string("name");
            $table->string("email");
            $table->string("profession")->nullable();
            $table->string("phone")->nullable();
            $table->string("cellphone")->nullable();
            $table->string("cpfcnpj");
            $table->string("ierg")->nullable();
            $table->date("date_exp_rg")->nullable();
            $table->string("exp_rg")->nullable();
            $table->string("org_rg")->nullable();
            $table->string("uf_rg")->nullable();
            $table->string("zipcode")->nullable();
            $table->string("street")->nullable();
            $table->string("number")->nullable();
            $table->string("complement")->nullable();
            $table->string("district")->nullable();
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->longtext("timeline")->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')
                ->references('id')
                ->on('banks')
                ->onDelete('restrict');
            $table->string("agency")->nullable();
            $table->string("account")->nullable();
            $table->date("birthday")->nullable();
            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')
                ->references('id')
                ->on('genders')
                ->onDelete('restrict');
            $table->unsignedBigInteger('marital_status_id');
            $table->foreign('marital_status_id')
                ->references('id')
                ->on('marital_statuses')
                ->onDelete('restrict');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');
            $table->unsignedBigInteger('tenant_id');
            $table->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
                ->onDelete('restrict');
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
