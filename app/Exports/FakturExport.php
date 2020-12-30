<?php

namespace App\Exports;

use App\Faktur;
use Maatwebsite\Excel\Concerns\FromCollection;

class FakturExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Faktur::all();
    }
}
