<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up():void
    {
        Schema::create('orders', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('sale_id')->constrained();
            $table->date('date_start');
            $table->date('date_end');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('orders');
    }
};
