<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up():void
    {
        Schema::create('purchases', static function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('supplier_id')->constrained();
            $table->foreignId('order_id')->constrained();
            $table->string('authorization');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('purchases');
    }
};
