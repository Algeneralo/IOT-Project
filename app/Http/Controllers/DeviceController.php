<?php

namespace App\Http\Controllers;

use App\Devices;
use App\Http\Requests\StoreDeviceRequest;
use App\MQTT;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

const INTEGRITY_CONSTRAINT_VIOLATION = 23000;
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
     * @param StoreDeviceRequest $request
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
        } catch (QueryException $exception) {
            if ($exception->getCode() == INTEGRITY_CONSTRAINT_VIOLATION)
                return redirect('devices')->with("failed", "This device is already exists!");
            return abort(500);
        } catch (\Exception $exception) {
            return abort(500);
        }
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
        $mqtt = MQTT::where("user_id", Auth::id())->first();
        return view('devices.show', compact('device', 'mqtt'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (Devices::destroy($id))
                return redirect('devices')->with("success", "Device Deleted successfully");
            return redirect('devices')->with("failed", "Something went wrong");
        } catch (\Exception $exception) {
            return abort(500);
        }
    }
}
