<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Settings
        DB::table('settings')->insert([
            'booking_dateplus_min' => 30,
            'booking_dateplus_to' => 365,
            'activity_dateplus_from' => 1,
            'activity_dateplus_to' => 180,
        ]);

        // Spaces
        DB::table('spaces')->insert([
            ['name' => 'Backstage'],
            ['name' => 'Bar'],
            ['name' => 'Bureau/Billetterie'],
            ['name' => 'Foyer'],
            ['name' => 'Loge 1'],
            ['name' => 'Loge 2'],
            ['name' => 'Salle'],
            ['name' => 'Stock technique'],
            ['name' => 'Vestiaire'],
        ]);

        // Spaces
        DB::table('emails')->insert([
            [
                'identifier' => 'AccountCreated',
                'description' => 'Email envoyé une fois un compte créé',
                'subject' => 'Le Groove - Compte créé',
                'body' => 'Compte créé',
            ],
            [
                'identifier' => 'ActivityIsValidated',
                'description' => 'Email envoyé lorsqu\'une activité est validée',
                'subject' => 'Le Groove - Activité validée',
                'body' => 'Activité validée',
            ],
            [
                'identifier' => 'BookingIsValidated',
                'description' => 'Email envoyé lorsqu\'une programmation est validée',
                'subject' => 'Le Groove - Programmation validée',
                'body' => 'Programmation validée',
            ],
            [
                'identifier' => 'BookingRevive',
                'description' => 'Email envoyé lors de la relance pour informations d\'une programmation',
                'subject' => 'Le Groove - Programmation - Relance',
                'body' => 'Programmation - Relance',
            ],
        ]);
    }
}
