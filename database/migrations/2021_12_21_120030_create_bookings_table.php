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

            // Planification
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->string('type');
            $table->enum('organizer', ['collectifnocturne', 'corner25']);
            $table->string('association_name');

            // Communication
            // -> For Images: View BookingMedia
            $table->text('communication_links')->nullable();

            // Technique
            $table->text('technical_needs')->nullable();
            $table->text('technical_light_contact')->nullable();
            $table->text('technical_sound_contact')->nullable();
            // TODO Fiches techniques
            // TODO Feuille de route

            // Accueil/Bar/Encadrement
            $table->text('groove_referents')->nullable();
            $table->string('groove_estimated_attendance')->nullable();
            $table->text('groove_perm')->nullable();
            $table->text('groove_accueil_artiste')->nullable();
            $table->text('groove_bar')->nullable();
            $table->text('groove_accueil')->nullable();
            $table->text('groove_benevoles_bar')->nullable();
            // TODO Planning bar
            $table->text('groove_benevoles_vestiaires')->nullable();
            // TODO Planning vestiaires

            // Autres
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
