<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

    public function up()
    {
        Schema::create('temporary_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid()->index();
            $table->timestamps();
        });
    }
};


