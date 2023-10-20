<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up():void
    {
        Schema::create('products', static function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->double('price');
            $table->boolean('state');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('products');
    }
};
