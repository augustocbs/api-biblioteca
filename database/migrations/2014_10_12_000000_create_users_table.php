<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cellphone')
                ->nullable();
            $table->string('document')
                ->nullable()
                ->comment('CPF');
            $table->string('zip_code')
                ->nullable()
                ->comment('CEP');
            $table->string('street')
                ->nullable()
                ->comment('Rua');
            $table->integer('number')
                ->nullable()
                ->comment('Número');
            $table->string('neighborhood')
                ->nullable()
                ->comment('Bairro');
            $table->string('city')
                ->nullable()
                ->comment('Cidade');
            $table->string('state')
                ->nullable()
                ->comment('UF');
            $table->string('complement')
                ->nullable()
                ->comment('Complemento');
            $table->boolean('active')
                ->default(true);
            $table->timestamp('email_verified_at')
                ->nullable();
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
        Schema::dropIfExists('users');
    }
};
