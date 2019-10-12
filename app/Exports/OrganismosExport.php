<?php

namespace App\Exports;

use App\Institucion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class OrganismosExport implements FromCollection
{
   use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Institucion::all();
    }
}
