<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password')
                ->nullable();
            $table->string('cellphone')
                ->nullable();
            $table->string('document')
                ->nullable()
                ->comment('CPF');
            $table->string('zip_code')
                ->nullable();
            $table->string('street')
                ->nullable();
            $table->integer('number')
                ->nullable();
            $table->string('neighborhood')
                ->nullable();
            $table->string('city')
                ->nullable();
            $table->string('state')
                ->nullable();
            $table->string('complement')
                ->nullable();
            $table->boolean('active')
                ->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
