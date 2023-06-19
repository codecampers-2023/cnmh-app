<?php

return [
    'singular' => 'Dossier Patient',
    'plural' => 'Dossiers Patients',
    'fields' => [
        'id' => 'Id',
        'patient_id' => 'Patient',
        'couverture_medical_id' => 'Couverture médicale',
        'type_handicap_id' => "Type d'handicapé",
        'numero_dossier' => 'Numéro Dossier',
        'etat' => 'État',
        'date_enregsitrement' => "Date d'enregsitrement",
        'created_at' => 'Créé le',
        'updated_at' => 'Mis à jour le',
        'selecter'=>[
            'select_couverture_medical_id'=>'Sélectionner la couverture médicale',
            'select_type_handicap_id'=>"Déterminer le type d'handicapé",
        ],
    ],

];
