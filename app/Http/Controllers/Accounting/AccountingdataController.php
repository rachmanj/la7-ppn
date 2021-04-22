<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccountingdataController extends Controller
{
    public function avgDaysMonthly()
    {
        $avgMonthly = Http::get('http://localhost:8000/api/invoices/avgdays-m')->json()['data'];

        return datatables()->of($avgMonthly)
            ->addIndexColumn()
            ->toJson();
    }
}
