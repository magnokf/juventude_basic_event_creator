<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_ones', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 30)->unique();
            $table->string('ip_address', 50);
            $table->date('date_of_birth');
            $table->dateTime('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_ones');
    }
}
