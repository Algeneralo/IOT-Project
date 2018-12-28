<?php

namespace App\Http\Controllers;

use App\Devices;
use App\MQTT;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $devices = Devices::where("user_id", Auth::id())->get();
        $mqtt = MQTT::where("user_id", Auth::id())->first();
        return view('home', compact('devices', 'mqtt'));
    }
}
