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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('phone');
            $table->date('birthday');
            $table->string('address');
            $table->integer('address_number');
            $table->string('complement');
            $table->string('baptized');
            $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widower', 'Separated'])->default('Single');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
