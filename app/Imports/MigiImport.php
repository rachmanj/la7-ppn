<?php

namespace App\Imports;

use App\Migi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MigiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Migi([
            'posting_date' => $row['posting_date'],
            'doc_type' => $row['doc_type'],
            'doc_no' => $row['doc_no'],
            'order_no' => $row['order_no'],
            'project_code' => $row['project_code'],
            'dept_code' => $row['dept_code'],
            'item_code' => $row['item_code'],
            'qty' => $row['qty'],
            'uom' => $row['uom'],
        ]);
    }
}
