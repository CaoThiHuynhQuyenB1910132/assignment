<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('user_id');
            $table->string('order_id');
            $table->longText('content')->nullable();
            $table->tinyInteger('rating');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
};
