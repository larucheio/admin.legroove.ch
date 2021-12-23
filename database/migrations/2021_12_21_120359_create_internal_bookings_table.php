<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('account_id')->nullable()->constrained()->nullOnDelete();

            $table->date('date');
            $table->string('title');
            $table->string('opening_hours')->nullable();
            $table->text('contact');
            $table->text('complementary_informations')->nullable();

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
        Schema::dropIfExists('internal_bookings');
    }
}
