<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up():void
    {
        Schema::create('details', static function (Blueprint $table) {
            $table->id();
            $table->string('detail');
            $table->foreignId('classification_id')->constrained();
            $table->double('unit_value');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('details');
    }
};
