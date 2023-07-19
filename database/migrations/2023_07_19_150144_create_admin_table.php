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
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 125)->notNull();
            $table->string('telefone', 125)->notNull()->default('N/A');
            $table->string('email', 125)->notNull();
            $table->string('password', 125)->notNull();
            $table->string('cep', 125)->notNull()->default('N/A');
            $table->string('logradouro', 125)->notNull()->default('N/A');
            $table->string('bairro', 125)->notNull()->default('N/A');
            $table->string('uf', 2)->notNull()->default('NA');
            $table->string('localidade', 125)->notNull()->default('N/A');
            $table->string('complemento', 125)->notNull()->default('N/A');
            $table->string('remember_token', 100)->nullable();
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
        Schema::dropIfExists('admin');
    }
};
