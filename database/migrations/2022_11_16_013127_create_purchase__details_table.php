<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up():void
    {
        Schema::create('purchase__details', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained();
            $table->integer('quantity');
            $table->foreignId('detail_id')->constrained();
//            $table->double('unit_value');
            $table->double('total_value');
            $table->foreignId('tax_id')->constrained();
            $table->double('total');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('purchase__details');
    }
};
