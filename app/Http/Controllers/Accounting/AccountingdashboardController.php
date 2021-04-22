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

        $thismonth_url = 'http://192.168.33.18:8080/irr-api/public/api/invoices/avg_days';
        $thisyearavg_url = 'http://192.168.33.18:8080/irr-api/public/api/invoices/avgdays-y';
        $monthly_url = 'http://192.168.33.18:8080/irr-api/public/api/invoices/avgdays-m';
        $thisMonthCount_url = 'http://192.168.33.18:8080/irr-api/public/api/invoices/receivetmcount';
        $byCreators_url = 'http://192.168.33.18:8080/irr-api/public/api/invoices/countbycreator';

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

        $thismonth_response = $thismonth_promise->wait();
        $thisYearAvg_response = $thisYearAvg_promise->wait();
        $monthly_response = $monthly_promise->wait();
        $thisMonthCount_response = $thisMountCount_promise->wait();
        $response = $monthly_promise->wait();
        
        $thismonth_avg =  json_decode($thismonth_response, true)['data']['days'];
        $thisYear_avg =  json_decode($thisYearAvg_response, true)['data']['days'];
        $monthly_avg =  json_decode($monthly_response, true)['data'];
        $thisMonth_count =  json_decode($thisMonthCount_response, true)['data'];

        return view('accounting.dashboard.index', compact(
            'thismonth_avg',
            'thisYear_avg',
            'monthly_avg',
            'thisMonth_count'
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
        $projects = Http::get('http://192.168.33.37/arka-rest-server/api/project?arka-key=arka123')['data'];
        // return $avg_days;
        // return $avgMonthly;
        // return $avg_days['data'];

        // $list = Faktur::get();
        //  return $list;
        // return $projects;

        return view('accounting.dashboard.test', [
            // 'avgMonthly' => $avgMonthly,
            // 'projects'  => $projects,
            'fakturs'   => Faktur::get()
        ]);
    }

    public function test()
    {
        $client = new Client();

        // $url = 'http://localhost:8000/api/invoices/avg_days';
        $monthly_url = 'http://192.168.33.13/irr-api/public/api/invoices/avgdays-m';
        $thismonth_url = 'http://192.168.33.13/irr-api/public/api/invoices/avg_days';
        $byCreators_url = 'http://192.168.33.13/irr-api/public/api/invoices/countbycreator';
        

        // $response = $client->request('GET', $url, [
        //     'verify' => false
        // ]);

        // $responseBody = $response->getBody();

        // $response = Http::async()->get($url);

        $monthly_promise = $client->getAsync($monthly_url)->then(
            function ($response) {
                return $response->getBody();
            }, function ($exception) {
                return $exception->getMessage();
            }
        );

        $monthly_response = $monthly_promise->wait();
        $response = $monthly_promise->wait();
        $response = $monthly_promise->wait();
        // return $response;
        $list  =  json_decode($monthly_response, true)['data'];
        // $days = $filter;

        return view('accounting.dashboard.test', [
            'list' => $list
        ]);
        // return $response;
    }

}
