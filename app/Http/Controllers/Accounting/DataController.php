<?php

namespace App\Http\Controllers\Accounting;

use App\Faktur;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function fakturall()
    {
        $fakturs = Faktur::orderBy('creation_date', 'desc')->get();

        return datatables()->of($fakturs)
            ->editColumn('faktur_date', function (Faktur $model) {
                if ($model->faktur_date) {
                    return date('d-m-Y', strtotime($model->faktur_date));
                }
                return null;
            })
            ->editColumn('creation_date', function (Faktur $model) {
                return date('d-m-Y', strtotime($model->creation_date));
            })
            ->editColumn('amount', function (Faktur $model) {
                return number_format($model->amount, 2);
            })
            ->editColumn('posting_date', function (Faktur $model) {
                return date('d-m-Y', strtotime($model->posting_date));
            })
            ->editColumn('receive_date', function (Faktur $model) {
                if ($model->receive_date) {
                    return date('d-m-Y', strtotime($model->receive_date));
                }
                return null;
            })
            ->addIndexColumn()
            ->addColumn('action', 'accounting.faktur.all.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function fakturnoreceive()
    {
        $fakturs = Faktur::orderBy('posting_date', 'asc')->whereNull('receive_date')->get();

        return datatables()->of($fakturs)
            ->addColumn('days', function (Faktur $model) {
                $date = Carbon::parse($model->posting_date);
                $now = Carbon::now();
                return $date->diffInDays($now);
            })
            ->editColumn('faktur_date', function (Faktur $model) {
                if ($model->faktur_date) {
                    return date('d-m-Y', strtotime($model->faktur_date));
                }
                return null;
            })
            ->editColumn('creation_date', function (Faktur $model) {
                return date('d-m-Y', strtotime($model->creation_date));
            })
            ->editColumn('amount', function (Faktur $model) {
                return number_format($model->amount, 2);
            })
            ->editColumn('posting_date', function (Faktur $model) {
                return date('d-m-Y', strtotime($model->posting_date));
            })
            ->editColumn('receive_date', function (Faktur $model) {
                if ($model->receive_date) {
                    return date('d-m-Y', strtotime($model->receive_date));
                }
                return null;
            })
            ->addIndexColumn()
            ->addColumn('action', 'accounting.faktur.noreceive.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function fakturbelumsap()
    {
        $fakturs = Faktur::orderBy('created_at', 'asc')->whereNull('document_no')->get();

        return datatables()->of($fakturs)
            ->addColumn('days', function (Faktur $model) {
                $date = Carbon::parse($model->created_at);
                $now = Carbon::now();
                return $date->diffInDays($now);
            })
            ->editColumn('created_at', function (Faktur $model) {
                return date('d-m-Y', strtotime($model->created_at));
            })
            ->editColumn('amount', function (Faktur $model) {
                return number_format($model->amount, 2);
            })
            ->editColumn('receive_date', function (Faktur $model) {
                if ($model->receive_date) {
                    return date('d-m-Y', strtotime($model->receive_date));
                }
                return null;
            })
            ->addIndexColumn()
            ->addColumn('action', 'accounting.faktur.belum_sap.action')
            ->rawColumns(['action'])
            ->toJson();
    }
}
