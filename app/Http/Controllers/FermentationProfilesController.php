<?php

namespace App\Http\Controllers;

use App\FermentationProfiles;
use App\Http\Requests\StoreFremantionProfileRequest;
use App\Stages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FermentationProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = FermentationProfiles::where('user_id', Auth::id())->with("stages")->get();
        return view("FermentationProfiles.index", compact("profiles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFremantionProfileRequest $request)
    {
        try {
            $profile = FermentationProfiles::create([
                "user_id" => Auth::id(),
                "type" => $request->type,
                "mac_address" => $request->device_id,
                "name" => $request->name,
                "duration" => $request->duration,
                "fahrenheit" => $request->fahrenheit,
                "notes" => $request->notes,
            ]);
            if ($profile) {
                $this->storeStages($request, $profile->id);
                return redirect('ferments')->with("success", "Profile Added successfully");
            }
            return redirect('ferments')->with("failed", "something went wrong");
        } catch (\Exception $exception) {
            return abort(500);
        }
    }

    private function storeStages(Request $request, $profileID)
    {
        for ($counter = 0; $counter < count($request->sname); $counter++) {
            Stages::create([
                "profile_id" => $profileID,
                "name" => $request->sname[$counter],
                "temp" => $request->stemp[$counter],
                "time" => $request->stime[$counter],
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public
    function show($id)
    {
        $profile = FermentationProfiles::where('user_id', Auth::id())->with('stages')->findOrfail($id);
        $view = view("FermentationProfiles.modal.ShowSubView", compact("profile"))->render();
        return response()->json($view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        try {
            $profile = FermentationProfiles::findOrFail($id);
            $status = $profile->delete();
            if ($status)
                return redirect('ferments')->with("success", "Profile Deleted successfully");
            return redirect('ferments')->with("failed", "Something went wrong");
        } catch (\Exception $exception) {
            return abort(500);
        }
    }
}
