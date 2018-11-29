<?php

namespace App\Http\Controllers;

use App\Level;
use App\Preference;
use Illuminate\Http\Request;

class LevelController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = new Level();

        $checkLevel = Level::where('name',strtoupper($request->input('levelName')))
            ->get()->count();

        if ($checkLevel>0){
            return redirect('/duesPreference')->with('error','Class already exist');
        }else{
            $level->name= strtoupper($request->input('levelName'));
            $level->amountPaying= $request->input('amountPaying');
            $level->save();

            return redirect('/duesPreference')->with('success','Class Added Successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pre = Preference::all();
        foreach ($pre as $depName){
        }
        $levels = Level::find($id);

        return view('pages.duesPreference.edit-level')
            ->with('levels',$levels)
            ->with('depName',$depName);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $level = Level::find($id);
        $level ->name = $request->input('newName');
        $level->amountPaying=$request->input('newAmtPaying');

        $level->save();

        return redirect('/duesPreference')->with('success','Amount Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::find($id);

        $level->delete();
        return redirect('/duesPreference')->with('success','Class Deleted Successfully');


    }
}
