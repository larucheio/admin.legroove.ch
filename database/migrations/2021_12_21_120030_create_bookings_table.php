<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('account_id')->nullable()->constrained()->nullOnDelete();

            $table->date('date');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('entry_price')->nullable();
            $table->text('links')->nullable();
            $table->string('opening_hours')->nullable();
            $table->string('style')->nullable();

            $table->string('estimated_attendance');
            $table->string('type');
            $table->text('contact');

            $table->boolean('validated')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
