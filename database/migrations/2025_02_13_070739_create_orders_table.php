<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending'); // pending, completed, canceled
            $table->foreignId('address_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};

