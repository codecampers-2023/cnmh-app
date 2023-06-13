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

        $parametresGroup = MenuGroup::create([
            'nom' => 'Paramètres',
            'icon' => '<i class="fa-solid fa-gears"></i>',
        ]);

        $menu = [
            [
                'nom' => __('Dossier patients'),
                'icon' => '<i class="fa-solid fa-hospital-user"></i>',
                'url' => 'patients.index',
            ],
            [
                'nom' => __('Consultations'),
                'icon' => '<i class="fa-solid fa-hospital-user"></i>',
                'url' => 'consultations/dentiste',
            ],
            [
                'nom' => __('Rendez-vous'),
                'icon' => '<i class="fa-regular fa-calendar-check"></i>',
                'url' => 'rendez-vouses.index',
            ],
            [
                'nom' => __('Statistique'),
                'icon' => '<i class="fa-solid fa-chart-simple"></i>',
                'url' => '#',
                'reference' => null,
            ],
            [
                'nom' => __('Orientations externes'),
                'url' => 'orientation-externes.index',
                'menu_group_id' => $serviceSocialGroup->id,
            ],
            [
                'nom' => __('Réclamations'),
                'url' => 'reclamations.index',
                'menu_group_id' => $serviceSocialGroup->id,
            ],
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
        ];

        foreach ($menu as $item) {
            MenuItem::create($item);
        }
    }
}
