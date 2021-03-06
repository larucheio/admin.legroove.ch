<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('account_id')->nullable()->constrained()->nullOnDelete();

            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->json('daysOfWeek')->nullable();
            $table->date('startRecur')->nullable();
            $table->date('endRecur')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
