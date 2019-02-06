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
     * @return void
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
                "type" => count($request->sname),
                "mac_address" => $request->device_id,
                "name" => $request->name,
                "duration" => array_sum($request->input("stime")),
                "fahrenheit" => $request->fahrenheit,
                "notes" => $request->notes,
            ]);
            if ($profile) {
                // get the profile id and store all stages
                for ($counter = 0; $counter < count($request->sname); $counter++) {
                    app('App\Http\Controllers\StagesController')->store($request, $profile->id, $counter);
                }
                return redirect('ferments')->with("success", "Profile Added successfully");
            }
            return redirect('ferments')->with("failed", "something went wrong");
        } catch (\Exception $exception) {
            dd($exception);
            return abort(500);
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
     * @throws \Throwable
     */
    public
    function edit($id)
    {
        $profile = FermentationProfiles::where('user_id', Auth::id())->with('stages')->findOrfail($id);
        $view = view("FermentationProfiles.modal.editSubView", compact("profile"))->render();
        return response()->json($view);
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
        try {
            // calculate the new duration and stages count
            $newDuration = 0;
            $stagesCount = 0;

            for ($counter = 0; $counter < count($request->sid); $counter++) {
                // update the stage if there's no flag to delete it
                if ($request->isDeleted[$counter] != 1) {
                    $newDuration += $request->stime[$counter];
                    $stagesCount++;
                    app('App\Http\Controllers\StagesController')->update($request, $request->sid[$counter], $counter);
                } //delete the stage if there's a flag to delete
                else
                    app('App\Http\Controllers\StagesController')->destroy($request->sid[$counter]);
            }
            $fermentationProfile = FermentationProfiles::findOrFail($id);
            $fermentationProfile->name = $request->name;
            $fermentationProfile->type = $stagesCount;
            $fermentationProfile->duration = $newDuration;
            $fermentationProfile->fahrenheit = $request->fahrenheit;
            $fermentationProfile->notes = $request->notes;
            if ($fermentationProfile->save()) {
                return redirect('ferments')->with("success", "Profile Updated successfully");
            }
            return redirect('ferments')->with("failed", "something went wrong");
        } catch (\Exception $exception) {
            dd($exception);
            return abort(500);
        }
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
            if (FermentationProfiles::destroy($id))
                return redirect('ferments')->with("success", "Profile Deleted successfully");
            return redirect('ferments')->with("failed", "Something went wrong");
        } catch (\Exception $exception) {
            return abort(500);
        }
    }
}
