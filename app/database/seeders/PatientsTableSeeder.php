<?php

namespace Database\Seeders;

use App\Models\Tuteur;
use App\Models\Patient;
use App\Models\NiveauScolaire;
use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

        $patient = Patient::insert([
            [
                'tuteur_id' => Tuteur::inRandomOrder()->first()->id,
                'niveau_scolaire_id'=>NiveauScolaire::inRandomOrder()->first()->id,
                'nom' => 'yahya',
                'prenom' => 'mohammed',

                'telephone'=>'060000001',
                'email'=>'yahya@gmail.com',
                'adresse'=>'Tanger',
                'cin'=>'K00001',
                'remarques'=>'text',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'tuteur_id' => Tuteur::inRandomOrder()->first()->id,
                'niveauxScolaire_id'=>NiveauScolaire::inRandomOrder()->first()->id,
                'nom' => 'EL mliki',
                'prenom' => 'Hicham',
                'telephone'=>'060000001',
                'email'=>'yahya@gmail.com',
                'adresse'=>'Tanger',
                'cin'=>'K00001',
                'remarques'=>'text',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'tuteur_id' => Tuteur::inRandomOrder()->first()->id,
                'niveauxScolaire_id'=>NiveauScolaire::inRandomOrder()->first()->id,
                'nom' => 'Saidi',
                'prenom' => 'oumaima',
                'telephone'=>'060000001',
                'email'=>'yahya@gmail.com',
                'adresse'=>'Tanger',
                'cin'=>'K00001',
                'remarques'=>'text',
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ]);

    }
}
