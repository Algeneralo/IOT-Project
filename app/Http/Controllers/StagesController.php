<?php

namespace App\Http\Controllers;

use App\Stages;
use Illuminate\Http\Request;

class StagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $profileID)
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
     */
    public function show($id)
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $counter)
    {
        $stage = Stages::findOrFail($id);
        $stage->name = $request->sname[$counter];
        $stage->temp = $request->stemp[$counter];
        $stage->time = $request->stime[$counter];
        $stage->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stages::destroy($id);
    }
}
