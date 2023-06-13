<?php

namespace App\Exports;

use App\Models\DossierPatient;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDossierPatient implements FromCollection, WithHeadings, WithMapping,WithTitle
{


    public function collection()
    {
        return DossierPatient::with('couvertureMedical', 'patient', 'typeHandicaps', 'dossierPatientConsultations', 'dossierPatientServices', 'orientationExternes')->get();
    }

    public function headings(): array
    {
        return [
            'Num dossier',
            'Patient',
            'Couverture medicale',
            'Type Handicap',
            // 'Consultations',
            // 'Services',
            // 'Orientation Externes',
            'Etat',
            'Date enregistrement',

        ];
    }

    public function map($dossierpatient): array
    {
        // implode concatenates the nom values into a comma-separated string.
        $typeHandicaps = $dossierpatient->typeHandicaps->pluck('nom')->implode(', ');

        return [
            $dossierpatient->numero_dossier,
            $dossierpatient->patient->nom,
            $dossierpatient->couvertureMedical->nom,
            $typeHandicaps,
            $dossierpatient->etat,
            $dossierpatient->date_enregsitrement,
        ];
    }
    public function title(): string
    {
        return 'Prestation';
    }
}
