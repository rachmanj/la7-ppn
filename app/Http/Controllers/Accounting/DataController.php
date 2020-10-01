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
        $fakturs = Faktur::orderBy('document_no', 'desc')->get();

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
            ->addColumn('action', 'accounting.fakturs.all.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function receive()
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
                return date('d-m-Y', strtotime($model->created_at));
            })
            ->editColumn('amount', function (Faktur $model) {
                return number_format($model->amount, 2);
            })
            ->editColumn('receive_date', function (Faktur $model) {
                return date('d-m-Y', strtotime($model->receive_date));
            })
            ->addIndexColumn()
            ->addColumn('action', 'accounting.fakturs.belumsap.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function duplicates()
    {
        // $fakturs = Faktur::whereIn('faktur_no', function ($query) {
        //     $query->select('faktur_no')->groupBy('faktur_no')->havingRaw('count(*) > 1');
        // })->get();

        $fakturs = Faktur::select('faktur_no')
            ->selectRaw('count(faktur_no) as occurences') // Jalan yg ini
            ->groupBy('faktur_no')
            ->having('occurences', '>', 1)
            ->get();




        // $filter = Faktur::selectRaw('faktur_no, count(faktur_no) as occurences')
        //     // ->selectRaw('count(faktur_no) as occurences')
        //     ->groupBy('faktur_no')
        //     ->having('occurences', '>', 1)
        //     ->get();

        // $fakturs = Faktur::whereIn('faktur_no', $filter)->get();

        // return $fakturs;
        // die;



        // $fakturs = DB::table('fakturs')
        //     ->selectRaw('count(faktur_no) as occurences')
        //     ->groupBy('faktur_no')
        //     ->having('occurences', '>', 1)
        //     ->get();

        // $fakturs =  Faktur::orderBy('faktur_no')->get();

        // return $fakturs;
        // die;

        // $fakturs = Faktur::groupBy('faktur_no')->havingRaw('COUNT(faktur_no) > 1')->get();

        // $fakturs = DB::table('fakturs')
        //     ->select('*', DB::raw('COUNT(id) as faktur_count'))
        //     ->groupBy('faktur_no')
        //     ->having('faktur_count', '>', 1)
        //     ->get();

        // return $results;
        // die;
        // // $fakturs = Faktur::select('faktur_no')
        // $fakturs = Faktur::groupBy('faktur_no')
        //     ->whereNotNull('faktur_no')
        //     ->havingRaw('COUNT(id) > 1')
        //     ->get();

        // return $fakturs;
        // die;

        return datatables()->of($fakturs)
            // ->editColumn('faktur_date', function (Faktur $model) {
            //     if ($model->faktur_date) {
            //         return date('d-m-Y', strtotime($model->faktur_date));
            //     }
            //     return null;
            // })
            // ->editColumn('creation_date', function (Faktur $model) {
            //     return date('d-m-Y', strtotime($model->creation_date));
            // })
            // ->editColumn('amount', function (Faktur $model) {
            //     return number_format($model->amount, 2);
            // })
            // ->editColumn('posting_date', function (Faktur $model) {
            //     return date('d-m-Y', strtotime($model->posting_date));
            // })
            // ->editColumn('receive_date', function (Faktur $model) {
            //     if ($model->receive_date) {
            //         return date('d-m-Y', strtotime($model->receive_date));
            //     }
            //     return null;
            // })
            ->addIndexColumn()
            // ->addColumn('action', 'accounting.fakturs.duplicates.action')
            // ->rawColumns(['action'])
            ->toJson();
    }
}