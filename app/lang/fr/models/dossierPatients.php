<?php

return [
    'singular' => 'Dossier Patient',
    'plural' => 'Dossier Patients',
    'fields' => [
        'id' => 'Id',
        'patient_id' => 'Patient',
        'couverture_medical_id' => 'Couverture Medical ',
        'type_handicap_id' => 'Type handicap',
        'numero_dossier' => 'Numero Dossier',
        'etat' => 'Etat',
        'date_enregsitrement' => 'Date Enregsitrement',
        'created_at' => 'Créé le',
        'updated_at' => 'Mis à jour le',
        'selecter'=>[
            'select_couverture_medical_id'=>'Sélectionner la couverture médicale',
            'select_type_handicap_id'=>"Sélectionner le type d'handicap",
        ],
    ],

];
