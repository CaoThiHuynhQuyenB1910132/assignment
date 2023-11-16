<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('notes');
            $table->string('user_id');
            $table->integer('staff')->nullable();
            $table->string('tracking_number');
            $table->string('status')->default('pending');
            $table->string('payment');
            $table->string('payment_status');
            $table->string('shipping_address');
            $table->integer('total');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
