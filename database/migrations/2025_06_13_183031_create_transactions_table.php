<?php

use App\Enums\TransactionMethod;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->date('date')->comment('The date of the transaction');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('type', 20)->comment('It should be debt or credit');
            $table->string('category', 20)->comment('It should be food, travel, etc.');
            $table->decimal('amount', 10, 2);
            $table->string('method', 30)->default(TransactionMethod::CASH->value)->comment('It should be cash, upi, credit card etc.');

            $table->string('summary', 255)->comment('The summary of the transaction')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
