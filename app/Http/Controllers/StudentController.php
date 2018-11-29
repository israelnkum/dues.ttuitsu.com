<?php

namespace App\Http\Controllers;
use App\Level;
use App\Preference;
use App\Sourvenir;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
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
        $pre = Preference::all();

        foreach ($pre as $depName){

        }

        $souvenirs = Sourvenir::all('name')->count();


        $allStudent = Student::with('level')->get();

      //  die($allStudent);
        return view('pages.students.allStudents')
            ->with('allStudent',$allStudent)
            ->with('depName',$depName)
            ->with('souvenirs',$souvenirs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pre = Preference::all();

        foreach ($pre as $depName){

        }

        $level = Level::all()->sortBy('name');
        return view('pages.students.newStudent')
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
       $student = new Student();
       $student ->firstName = $request->input('firstName');
        $student ->lastName = $request->input('lastName');
        $student ->otherName = $request->input('otherName');
        $student ->indexNumber = $request->input('indexNumber');
        $student ->level_id = $request->input('level');
        $student ->phone = $request->input('phoneNumber');

        $student->save();

        return redirect('/student')->with('success','New Student Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $student = Student::find($id);
        $level = Level::all()->sortBy('name');
        return view('pages.students.editStudent')
            ->with('student',$student)
            ->with('depName',$depName)
            ->with('level',$level);
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
        $student = Student::find($id);
        $student ->firstName = $request->input('firstName');
        $student ->lastName = $request->input('lastName');
        $student ->otherName = $request->input('otherName');
        $student ->indexNumber = $request->input('indexNumber');
        $student ->level_id = $request->input('level');
        $student ->phone = $request->input('phoneNumber');

        $student->save();

        return redirect('/student')->with('update_success','Student Info Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();
        return redirect('/student')->with('delete_success','Student Deleted Successfully');

    }

}
