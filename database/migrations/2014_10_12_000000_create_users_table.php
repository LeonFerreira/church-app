<?php

use App\Enums\MaritalStatus;
use App\Enums\Gender;
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
            $table->enum('gender', array_column(Gender::cases(), 'value'));
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->date('birthday');
            $table->string('address');
            $table->string('address_number');
            $table->string('complement')->nullable();
            $table->date('baptized')->nullable();
            $table->enum('marital_status', array_column(MaritalStatus::cases(), 'value'))->default('Single');
            $table->timestamps();
            $table->softDeletes();
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
