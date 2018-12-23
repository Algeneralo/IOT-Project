<?php

namespace App\Http\Controllers;

use App\Devices;
use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use App\MQTT;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Devices::where('user_id', Auth::id())->get();
        return view("devices.index", compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mqtt = MQTT::where('user_id', Auth::id())->first();
        return view('devices.create', compact('mqtt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceRequest $request)
    {
        try {
            $device = Devices::create([
                "user_id" => Auth::id(),
                "name" => $request->fname,
                "mac_address" => $request->device_id,
                "type" => "ftss",
            ]);
            if ($device)
                return redirect('devices')->with("success", "Device Added successfully");
            return redirect('devices')->with("failed", "something went wrong");
        } catch (\Exception $exception) {
            return abort(500);
        }
    }

    private function configure(Request $request)
    {
        $client = new Client(['http_errors' => false]);
        $mqtt = MQTT::where('user_id', Auth::id())->first();
        $data = [
            "name" => $request->fname,
            "device_id" => $request->device_id,
            "device_stats_interval" => 60,
            "wifi" => [
                "ssid" => $request->ssid,
                "password" => $request->wifiPassword,
            ],
            "mqtt" => [
                "host" => $mqtt->ip,
                "port" => $mqtt->port,
                "base_topic" => "devices/",
                "auth" => "true",
                "username" => $mqtt->user,
                "password" => $mqtt->password,
            ]
        ];
        $response = $client->post("http://192.168.123.1/config", $data);
//        $response = $client->get("http://localhost:9000/testApid");
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Devices::findOrfail($id);
        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDeviceRequest $request
     * @param  int $id
     * @return void
     */
    public function update(UpdateDeviceRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Return form required values form an external api
     *
     * @param Request $request
     * @return status
     */
    public function getFormData(Request $request)
    {
        if ($request->ajax()) {
            $client = new Client(['http_errors' => false]);
            try {
                $deviceID = $this->getDeviceID($client);
                $networks = $this->getNetworks($client);
                return response()->json(["status" => 200, 'deviceID' => $deviceID, "networks" => $networks]);
            } catch (\Exception $exception) {
                return response()->json(['status' => '500']);
            }
        }
        return abort(404);
    }

//    private function getDeviceID(Client $client)
//    {
//        $response = $client->get("http://192.168.123.1/device-info");
////        $response = $client->get("http://localhost:9000/testApid");
//        if (json_decode($response->getStatusCode()) == 200) {
//            return json_decode($response->getBody()->getContents())->hardware_device_id;
//        }
//        return abort(500);
//    }

    private function getNetworks(Client $client)
    {
        $response = $client->get("http://192.168.123.1/networks");
//        $response = $client->get("http://localhost:9000/testApin");
        if (json_decode($response->getStatusCode()) == 200) {
            return json_decode($response->getBody()->getContents())->networks;
        }
        return [];
    }

//    public function heartDevice(Request $request)
//    {
//        if ($request->ajax()) {
//            $client = new Client(['http_errors' => false]);
//            try {
//                $response = $client->get("http://192.168.123.1/heart");
//            } catch (\Exception $exception) {
//                return response()->json(['status' => '500']);
//            }
//            return response()->json(['status' => $response->getStatusCode()]);
//        }
//        return abort(500);
//    }
}
