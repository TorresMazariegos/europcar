<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{

    private $url = "https://www.triyolo.com/ejercicio/rest/";

    private $headers = [
        'Accept'     => 'application/json',
        'Content-Type'     => 'application/json',
        'Content-Length' => '94'
    ];

    public function login(Request $request){

        $client = new Client(); 
        
         /* LOGIN */
        $params = [
            "Function" => "LogIn",
            "ContractId" => "0123456789",
            "Password" => "0123456789",
            "LanguageId" => "ES"
        ];

        $response = $client->request('POST', $this->url, [
            'json' => $params,
            'headers' => $this->headers,
            'verify'  => false,
            ]);

        $responseBody = json_decode($response->getBody());

        $SessionId = $responseBody->SessionId;

        // GET STATION LIST CHECK-IN

        $paramsCheckIn = [
            "Function" => "GetStationList",
            "SessionId" => $SessionId,
            "StationType" => "CheckIn",
        ];        

        $responseCheckIn = $client->request('GET', $this->url, [
            'json' => $paramsCheckIn,
            'headers' => $this->headers,
            'verify'  => false,
            ]);

        $stationListIn = json_decode($responseCheckIn->getBody());

        // GET STATION LIST CHECK-OUT

        $paramsCheckOut = [
            "Function" => "GetStationList",
            "SessionId" => $SessionId,
            "StationType" => "CheckOut",
        ];        

        $responseCheckOut = $client->request('GET', $this->url, [
            'json' => $paramsCheckOut,
            'headers' => $this->headers,
            'verify'  => false,
            ]);

        $stationListOut = json_decode($responseCheckOut->getBody());

        //dd($stationListIn); exit;
        $data = [
            'stationListIn'     => $stationListIn,
            'stationListOut'    => $stationListOut,
            'SessionId'        => $SessionId
        ];
        
        return view('welcome', $data);
    }

    public function search(Request $request){
        //var_dump($request->dateCheckIn); exit;
        $client = new Client(); 

        $CheckInTime = $request->CheckInTime;
        $CheckInTime = $request->CheckOutTime;

        $CheckInDate = Carbon::parse($request->dateCheckIn);
        $CheckInDate = $CheckInDate->format('Y-m-d');
        $CheckInDate = Carbon::parse("$CheckInDate $CheckInTime:00")->toDateTimeString();

        $CheckOutDate = Carbon::parse($request->dateCheckOut);
        $CheckOutDate = $CheckOutDate->format('Y-m-d');
        $CheckOutDate = Carbon::parse("$CheckOutDate $CheckInTime:00")->toDateTimeString();

        //var_dump($CheckInDate); exit;
        $params = [
            "Function" => "GetCarAvailability",
            "SessionId" => $request->SessionId,
            "CheckOutStationId" => $request->selectStationListIn,
            "CheckOutDate" => $CheckOutDate,
            "CheckInStationId" =>  $request->selectStationListIn,
            "CheckInDate" => $CheckInDate,
            "Currency" => "MXN",
            "PLI" => 1,
            "CDW" => 1,
            "PAI" => 0,
            "DP" => 0,
            "CA" => 0,
            "CM" => 0,
            "GPS" => 0,
            "BS" => 0,
            "DealId" => "0"
        ];

        $response = $client->request('GET', $this->url, [
            'json' => $params,
            'headers' => $this->headers,
            'verify'  => false,
            ]);

        $responseBody = json_decode($response->getBody());

        $data = [
            'data'                  => $responseBody->CarList,
            'CheckInStationName'    => $responseBody->CheckInStationName,
            'CheckInDate'           => $CheckInDate,
            'CheckOutStationName'   => $responseBody->CheckOutStationName,
            'CheckOutDate'          => $CheckOutDate,
        ];
        //dd($responseBody); exit;

        return view('search', $data);

    }
    
}
