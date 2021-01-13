<?php

namespace App\Exports;

use App\Faktur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FaktursnotreceiveExport implements FromCollection, WithHeadings
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
        return Faktur::whereNull('receive_date')->get();
    }
}
