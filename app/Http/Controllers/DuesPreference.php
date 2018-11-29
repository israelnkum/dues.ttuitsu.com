<?php

namespace App\Http\Controllers;

use App\Level;
use App\Preference;
use App\Sourvenir;
use Illuminate\Http\Request;
use App\Admin;

class DuesPreference extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin,web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depName=0;
        $pre = Preference::all();
        $souvenir = Sourvenir::all();
        $levels = Level::all();
        if (count($pre)==0)
        {
            $depName=0;
        }else{
            foreach ($pre as $depName){

            }
        }

        return view('pages.duesPreference.setPreference')
            ->with('depName',$depName)
            ->with('souvenir',$souvenir)
            ->with('levels',$levels);
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
        $count = count(Preference::all());

        if ($count ==0){
            $preference = new Preference();
            $preference ->departmentName = $request->input('departmentName');
            $preference ->logo = 0;
            $preference->save();
        }else{
            $preference = Preference::where('id', 1)->first();
            $preference ->departmentName = $request->input('departmentName');
            $preference ->logo = 0;

            $preference->save();

        }

        if ($request->file('select_file')==''){

            return back()
                ->with('success','Preferences Updated');
        }else{
            $this->validate($request,[
                'select_file'=>'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $image = $request->file('select_file');
            $new_name = 'logo.jpg';
            $image->move(public_path("logo"),$new_name);

            return back()
                ->with('success','Preferences Updated')
                ->with('path',$new_name);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
