<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Supplier;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function suppliers()
    {
        $suppliers = Supplier::orderBy('code', 'asc')->get();

        return datatables()->of($suppliers)
            ->addIndexColumn()
            ->addColumn('action', 'general.suppliers.action')
            ->rawColumns(['action'])
            ->toJson();
    }
}
