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
        Schema::table('users', function (Blueprint $table) {
            $table->string('cep', 255)->default('N/A')->collation('utf8mb4_general_ci')->change();
            $table->string('logradouro', 255)->default('N/A')->collation('utf8mb4_general_ci')->change();
            $table->string('bairro', 255)->default('N/A')->collation('utf8mb4_general_ci')->change();
            $table->string('uf', 50)->default('N/A')->collation('utf8mb4_general_ci')->change();
            $table->string('localidade', 255)->default('N/A')->collation('utf8mb4_general_ci')->change();
            $table->string('complemento', 255)->default('N/A')->collation('utf8mb4_general_ci')->change();
        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
