<?php

namespace App\Exports;

use App\Models\NiveauScolaire;
use Maatwebsite\Excel\Concerns\FromCollection;

class NiveauScolaireExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NiveauScolaire::all();
    }
}
