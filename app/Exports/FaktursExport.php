<?php

namespace App\Exports;

use App\Faktur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class FaktursExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'SAPDocNo',
            'VendorCode',
            'FakturNo',
            'FakturDate',
            'Amount',
            'CreateDate',
            'PostingDate',
            'Project',
            'DocType',
            'DocRemarks',
            'SAPUser',
            'CreateBy',
            'ReceiveDate',
            'ReceiveUpdBy',
            'CreateDate',
            'UpdateDate',
            'InvoiceNo',
            'InvoiceRemarks'
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Faktur::all();
        // return Faktur::orderBy('creation_date', 'desc')->get();
    }
}
