<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('data');
        });
    }

    public function down()
    {
        Schema::dropIfExists('entities');
    }
};
