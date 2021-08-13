<?php

namespace App\Http\Controllers\Accounting;

use GuzzleHttp\Client;

use App\Faktur;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class AccountingdashboardController extends Controller
{
    public function index()
    {
        $client = new Client();


        //URL
        $thismonth_url = 'http://192.168.33.18:8080/irr-api/public/api/invoices/avg_days';
        $thisyearavg_url = 'http://192.168.33.18:8080/irr-api/public/api/invoices/avgdays-y';
        $monthly_url = 'http://192.168.33.18:8080/irr-api/public/api/invoices/avgdays-m';
        $thisMonthCount_url = 'http://192.168.33.18:8080/irr-api/public/api/invoices/receivetmcount';
        $byCreators_url = 'http://192.168.33.18:8080/irr-api/public/api/invoices/countbycreator';
        $processedThisMonth_url = 'http://192.168.33.18:8080/irr-api/public/api/invoices/thismprocessed';


        // PROMISE
        $thismonth_promise = $client->getAsync($thismonth_url)->then(
            function ($response) {
                return $response->getBody();
            }, function ($exception) {
                return $exception->getMessage();
            }
        );

        $thisYearAvg_promise = $client->getAsync($thisyearavg_url)->then(
            function ($response) {
                return $response->getBody();
            }, function ($exception) {
                return $exception->getMessage();
            }
        );

        $thisMountCount_promise = $client->getAsync($thisMonthCount_url)->then(
            function ($response) {
                return $response->getBody();
            }, function ($exception) {
                return $exception->getMessage();
            }
        );

        $monthly_promise = $client->getAsync($monthly_url)->then(
            function ($response) {
                return $response->getBody();
            }, function ($exception) {
                return $exception->getMessage();
            }
        );

        $processedThisMonth_promise = $client->getAsync($processedThisMonth_url)->then(
            function ($response) {
                return $response->getBody();
            }, function ($exception) {
                return $exception->getMessage();
            }
        );

        $countByCreatorThisYear_promise = $client->getAsync($byCreators_url)->then(
            function ($response) {
                return $response->getBody();
            }, function ($exception) {
                return $exception->getMessage();
            }
        );

        //RESPONSE

        $thismonth_response = $thismonth_promise->wait();
        $thisYearAvg_response = $thisYearAvg_promise->wait();
        $monthly_response = $monthly_promise->wait();
        $thisMonthCount_response = $thisMountCount_promise->wait();
        $response = $monthly_promise->wait();
        $processedThisMonth_response = $processedThisMonth_promise->wait();
        $countByCreatorThisYear_response = $countByCreatorThisYear_promise->wait();


        //DECODE
        $thismonth_avg =  json_decode($thismonth_response, true)['data']['days'];
        $thisYear_avg =  json_decode($thisYearAvg_response, true)['data']['days'];
        $monthly_avg =  json_decode($monthly_response, true)['data'];
        $thisMonth_count =  json_decode($thisMonthCount_response, true)['data'];
        $processedThisMonth_count =  json_decode($processedThisMonth_response, true)['data'];
        $countByCreatorThisYear_get = json_decode($countByCreatorThisYear_response, true)['data'];

        return view('accounting.dashboard.index', compact(
            'thismonth_avg',
            'thisYear_avg',
            'monthly_avg',
            'thisMonth_count',
            'processedThisMonth_count',
            'countByCreatorThisYear_get'
        ));
    }

    public function test1()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://httpbin.org',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $avg_days = Http::get('http://localhost:8000/api/invoices/avg_days')->json()['data'];
        $avgMonthly = Http::get('http://localhost:8000/api/invoices/avgdays-m')->json()['data'];
    
        return view('accounting.dashboard.test', [
            // 'avgMonthly' => $avgMonthly,
            // 'projects'  => $projects,
            'fakturs'   => Faktur::get()
        ]);
    }

    public function test()
    {
        $client = new Client();

        $byCreators_url = 'http://localhost:8000/api/invoices/countbycreator';
        $thisYearMonths_url = 'http://localhost:8000/api/invoices/thisyearmonths';
        
        $byCreator_promise = $client->getAsync($byCreators_url)->then(
            function ($response) {
                return $response->getBody();
            }, function ($exception) {
                return $exception->getMessage();
            }
        );

        $thisYearMonths_promise = $client->getAsync($thisYearMonths_url)->then(
            function ($response) {
                return $response->getBody();
            }, function ($exception) {
                return $exception->getMessage();
            }
        );

        $byCreator_response = $byCreator_promise->wait();
        $thisYearMonths_response = $thisYearMonths_promise->wait();
        
        $byCreatorCount  =  json_decode($byCreator_response, true)['data'];
        $thisYearMonths  =  json_decode($thisYearMonths_response, true)['data'];

        return view('accounting.dashboard.test', compact(
            'byCreatorCount',
            'thisYearMonths'
        ));

        // return $byCreatorCount;
    }

}
