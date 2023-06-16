<?php

namespace Database\Seeders;

use App\Models\Consultation;
use App\Models\MenuGroup;
use App\Models\MenuItem;
use App\Models\OrientationExterne;
use App\Models\Patient;
use App\Models\Reclamation;
use App\Models\RendezVous;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceSocialGroup = MenuGroup::create([
            'nom' => 'Service social',
            'icon' => '<i class="fa-solid fa-users"></i>',
        ]);
        $medcineGenerale = MenuGroup::create([
            'nom' => 'Medcine générale',
            'icon' => '<i class="fa-solid fa-users"></i>',
        ]);
        $dentist = MenuGroup::create([
            'nom' => 'Dentiste',
            'icon' => '<i class="fa-solid fa-users"></i>',
        ]);

        $parametresGroup = MenuGroup::create([
            'nom' => 'Paramètres',
            'icon' => '<i class="fa-solid fa-gears"></i>',
        ]);

        $menu = [
            [
                'nom' => __('Dossier patients'),
                'icon' => '<i class="fa-solid fa-hospital-user"></i>',
                'url' => 'dossier-patients.index',
            ],

            //menu service social
            [
                'nom' => __('Dossier social'),
                'icon' => null,
                'url' => 'dossier-patients.index',
                'menu_group_id' => $serviceSocialGroup->id,
            ],
            [

                'nom' => __("List d'attente"),
                'icon' => null,
                'url' => '/consultations/liste-attente',
                'menu_group_id' => $serviceSocialGroup->id,
            ],
            [
                'nom' => __("Rendez-vous"),
                'icon' => null,
                'url' => 'rendez-vous.index',
                'menu_group_id' => $serviceSocialGroup->id,
            ],
            // Medecin generale
            [
                'nom' => __("Consultation"),
                'icon' => null,
                'url' => '/consultations/MedecinGeneral',
                'menu_group_id' => $medcineGenerale->id,
            ],
            // Dentist
            [
                'nom' => __("Dentiste"),
                'icon' => null,
                'url' => '/consultations/dentiste',
                'menu_group_id' => $dentist->id,
            ],


            // parametre

            [
                'nom' => __('Prestations'),
                'icon' => null,
                'url' => 'services.index',
                'menu_group_id' => $parametresGroup->id,
            ],
            [
                'nom' => __('Type d\'handicaps'),
                'icon' => null,
                'url' => 'typeHandicaps.index',
                'menu_group_id' => $parametresGroup->id,
            ],
            [
                'nom' => __('Couverture Médicale'),
                'icon' => null,
                'url' => 'couvertureMedicals.index',
                'menu_group_id' => $parametresGroup->id,
            ],
            [
                'nom' => __('Employés'),
                'icon' => null,
                'url' => 'employes.index',
                'menu_group_id' => $parametresGroup->id,
            ],
            [
                'nom' => __('NiveauScolaires'),
                'icon' => null,
                'url' => 'niveauScolaires.index',
                'menu_group_id' => $parametresGroup->id,
            ],
            [
                'nom' => __('EtatCivils'),
                'icon' => null,
                'url' => 'etatCivils.index',
                'menu_group_id' => $parametresGroup->id,
            ],
        ];

        foreach ($menu as $item) {
            MenuItem::create($item);
        }
    }
}
