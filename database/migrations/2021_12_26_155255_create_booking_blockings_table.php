<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingBlockingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_blockings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('from');
            $table->date('to');
            $table->set('type_to_block', ['activity', 'booking']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_blockings');
    }
}
