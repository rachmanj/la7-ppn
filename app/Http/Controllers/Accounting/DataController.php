<?php

namespace App\Http\Controllers\Accounting;

use App\Faktur;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function fakturall()
    {
        $fakturs = Faktur::orderBy('creation_date', 'desc')->get();

        return datatables()->of($fakturs)
            ->editColumn('faktur_date', function (Faktur $model) {
                if ($model->faktur_date) {
                    return date('d-M-Y', strtotime($model->faktur_date));
                }
                return null;
            })
            ->editColumn('creation_date', function (Faktur $model) {
                return date('d-M-Y', strtotime($model->creation_date));
            })
            ->editColumn('amount', function (Faktur $model) {
                return number_format($model->amount, 2);
            })
            ->editColumn('posting_date', function (Faktur $model) {
                return date('d-M-Y', strtotime($model->posting_date));
            })
            ->editColumn('receive_date', function (Faktur $model) {
                if ($model->receive_date) {
                    return date('d-M-Y', strtotime($model->receive_date));
                }
                return null;
            })
            ->addIndexColumn()
            ->addColumn('action', 'accounting.fakturs.all.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function receive()
    {
        $fakturs = Faktur::orderBy('faktur_date', 'asc')
            ->whereNull('receive_date')
            ->where('doc_type', '!=', 'AP DP')
            ->get();

        return datatables()->of($fakturs)
            ->addColumn('days', function (Faktur $model) {
                $date = Carbon::parse($model->faktur_date);
                $now = Carbon::now();
                return $date->diffInDays($now);
            })
            ->editColumn('faktur_date', function (Faktur $model) {
                if ($model->faktur_date) {
                    return date('d-M-Y', strtotime($model->faktur_date));
                }
                return null;
            })
            ->editColumn('amount', function (Faktur $model) {
                return number_format($model->amount, 2);
            })
            ->editColumn('posting_date', function (Faktur $model) {
                return date('d-M-Y', strtotime($model->posting_date));
            })
            ->editColumn('creation_date', function (Faktur $model) {
                return date('d-M-Y', strtotime($model->creation_date));
            })
            ->addIndexColumn()
            ->addColumn('action', 'accounting.fakturs.receive.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function belumsap()
    {
        $fakturs = Faktur::orderBy('faktur_date', 'asc')->whereNull('document_no')->get();

        return datatables()->of($fakturs)
            ->addColumn('days', function (Faktur $model) {
                $date = Carbon::parse($model->faktur_date);
                $now = Carbon::now();
                return $date->diffInDays($now);
            })
            ->editColumn('created_at', function (Faktur $model) {
                return date('d-M-Y', strtotime($model->created_at));
            })
            ->editColumn('amount', function (Faktur $model) {
                return number_format($model->amount, 2);
            })
            ->editColumn('receive_date', function (Faktur $model) {
                return date('d-M-Y', strtotime($model->receive_date));
            })
            ->addIndexColumn()
            ->addColumn('action', 'accounting.fakturs.belumsap.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function duplicates()
    {
        $fakturs = Faktur::whereNotIn('vendor_code', ['VTOTO001', 'VGASEMAS001'])->select('faktur_no')
            ->selectRaw('count(faktur_no) as occurences') // Jalan yg ini
            ->groupBy('faktur_no')
            ->having('occurences', '>', 1)
            ->get();

        return datatables()->of($fakturs)
            ->addIndexColumn()
            // ->addColumn('action', 'accounting.fakturs.duplicates.action')
            // ->rawColumns(['action'])
            ->toJson();
    }

    public function efaktur()
    {
        $fakturs = Faktur::orderBy('faktur_date', 'asc')
            ->whereNotNull('faktur_no')
            ->whereNull('efaktur_date')
            ->where('doc_type', '!=', 'AP DP')
            ->get();

        return datatables()->of($fakturs)
            ->addColumn('days', function (Faktur $model) {
                $date = Carbon::parse($model->faktur_date);
                $now = Carbon::now();
                return $date->diffInDays($now);
            })
            ->editColumn('faktur_date', function (Faktur $model) {
                if ($model->faktur_date) {
                    return date('d-M-Y', strtotime($model->faktur_date));
                }
                return null;
            })
            ->editColumn('amount', function (Faktur $model) {
                return number_format($model->amount, 2);
            })
            ->editColumn('receive_date', function (Faktur $model) {
                return date('d-M-Y', strtotime($model->posting_date));
            })
            ->editColumn('creation_date', function (Faktur $model) {
                return date('d-M-Y', strtotime($model->creation_date));
            })
            ->addIndexColumn()
            ->addColumn('action', 'accounting.fakturs.efaktur.action')
            ->rawColumns(['action'])
            ->toJson();
    }
}
