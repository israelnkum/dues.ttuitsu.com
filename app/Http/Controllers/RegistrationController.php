<?php

namespace App\Http\Controllers;

use App\Level;
use App\Preference;
use App\Student;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth:admin,web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = Level::all()->sortBy('name');
        $allStudent = Student::with('level')->where('registered','1')->get();
        $pre = Preference::all();

        foreach ($pre as $depName){

        }
        return view('pages.registrationStatus.registeredStudent')
            ->with('allStudent',$allStudent)
            ->with('depName',$depName)
            ->with('level',$level);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level = Level::all()->sortBy('name');
        $allStudent = Student::with('level')->where('registered','0')->get();
        $pre = Preference::all();

        foreach ($pre as $depName){

        }
        return view('pages.registrationStatus.unregisteredStudent')
            ->with('allStudent',$allStudent)
            ->with('depName',$depName)
            ->with('level',$level);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update($id)
    {
        $student = Student::find($id);
        $student ->registered = 1;

        $student->save();

        return redirect('/student')->with('update_success','Student Registered');
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
