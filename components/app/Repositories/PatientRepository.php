<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Repositories\BaseRepository;

class PatientRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'tuteur_id',
        'niveau_scolaire_id',
        'nom',
        'prenom',
        'telephone',
        'cin',
        'email',
        'image',
        'adresse',
        'remarques'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Patient::class;
    }
}
