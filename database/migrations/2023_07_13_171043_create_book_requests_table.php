<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('book_requests', function (Blueprint $table) {
            $table->id();
            $table->string('aliasname');
            $table->string('mobile');
            $table->string('email');
            $table->string('book_name');
            $table->date('pickup_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_requests');
    }
}
