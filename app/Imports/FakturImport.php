<?php

namespace App\Imports;

use App\Faktur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FakturImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Faktur([
            'document_no'       => $row['document_no'],
            'vendor_code'       => $row['vendor_code'],
            'faktur_no'         => $row['faktur_no'],
            'faktur_date'       => $this->convert_date($row['faktur_date']),
            'amount'            => $row['amount'],
            'creation_date'     => $this->convert_date($row['creation_date']),
            'posting_date'      => $this->convert_date($row['posting_date']),
            'project_code'      => $row['project_code'],
            'doc_type'          => $row['doc_type'],
            'remark'            => $row['remark'],
            'sap_user'          => $row['sap_user'],
            'invoice_no'        => $row['invoice_no'],
            'invoice_remarks'   => $row['invoice_remarks'],
            'created_by'        => 'excel import',
        ]);
    }

    public function convert_date($date)
    {
        if ($date) {
            $year = substr($date, 6, 4);
            $month = substr($date, 3, 2);
            $day = substr($date, 0, 2);
            $new_date = $year . '-' . $month . '-' . $day;
            return $new_date;
        } else {
            return null;
        }
    }
}
