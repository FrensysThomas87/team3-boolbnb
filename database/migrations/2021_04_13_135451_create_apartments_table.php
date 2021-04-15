<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('title', 400);
            $table->string('description', 10000)->nullable();
            $table->unsignedTinyInteger('rooms');
            $table->unsignedTinyInteger('beds');
            $table->unsignedTinyInteger('baths');
            $table->unsignedSmallInteger('sq_meters');
            $table->unsignedFloat('price', 7,2);
            $table->string('visible', 5)->nullable();
            $table->char('check_in', 100)->nullable();
            $table->char('check_out', 100)->nullable();
            $table->unsignedTinyInteger('max_guests')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->string('profile_pic', 2048)->nullable();
            $table->string('address', 2048);
            $table->string('latitude', 255);
            $table->string('longitude', 255);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
