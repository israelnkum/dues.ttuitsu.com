<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Level;
use App\Preference;
use App\Student;
use Illuminate\Http\Request;
use Excel;


class UploadController extends Controller
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
        $pre = Preference::all();

        foreach ($pre as $depName){

        }

        $levels = Level::all()->sortBy('name');
        return view('pages.upload.uploadStudent')
            ->with('depName',$depName)
            ->with('levels',$levels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        set_time_limit(36000);
        $valid_exts = array('csv','xls','xlsx'); // valid extensions
        $file = $request->file('file');
        //$name = time() . '-' . $file->getClientOriginalName();
        if (!empty($file)) {

            $ext = strtolower($file->getClientOriginalExtension());
            if (in_array($ext, $valid_exts)) {

                $path = $request->file('file')->getRealPath();
                $data = Excel::load($path, function($reader) {})->get();

                $total=count($data);
                if(!empty($data) && $data->count()){

                   // $user = \Auth::user()->id;
                    foreach($data as $value=>$row)
                    {
                        $firstName = $row->firstname;
                        $lastName = $row->lastname;
                        $otherName = $row->othername;
                        if (substr($row->indexnumber,'0','1') !=0)
                        {
                            $indexNumber = "0".$row->indexnumber;
                        }else{
                            $indexNumber = $row->indexnumber;
                        }
                        if (substr($row->phone,'0','1') !=0)
                        {
                            $phonNumber = "0".$row->phone;
                        }else{
                            $phonNumber = $row->phone;
                        }
                        $level = strtoupper($row->level);

                       // return($level);
                        $individualStdLvl =[];
                        $stdLevel = Level::all();

                        foreach ($stdLevel as $lvl){
                            array_push($individualStdLvl,$lvl->name);
                                                  }

                     // return($individualStdId);
                       // $programme = Student::all(); // check if the programmes in the file tally wat is in the db
                        if (in_array($level,$individualStdLvl)) {

                            //check if student already exist
                            $testQuery = Student::where('indexNumber', $indexNumber)->first();

                            if(empty($testQuery)){

                                $student = new Student();
                                $student->firstName = $firstName;
                                $student->lastName = $lastName;
                                $student->otherName = $otherName;
                                $student->indexNumber = $indexNumber;
                                $student->level_id = $request->input('level');
                                $student->phone = $phonNumber;
                                $student->save();

                            }
                            else{

                                //update student information if student indexNumber already exist
                                $student = Student::where('indexNumber', $indexNumber)->first();
                                $student->firstName = $firstName;
                                $student->lastName = $lastName;
                                $student->otherName = $otherName;
                                $student->indexNumber = $indexNumber;
                                $student->level_id = $request->input('level');
                                $student->phone = $phonNumber;
                                $student->save();
                            }
                        }
                        else{
                            return redirect('/studentUpload')->with("error", "File contain unrecognize programme.please try again!");

                        }

                    }
                }
            } else {
               // return redirect('/upload/courses')->with("error", " <span style='font-weight:bold;font-size:13px;'></span> ");
                return redirect('/studentUpload')->with("error", "Only excel file is accepted!");

            }
        } else {
           // return redirect('/upload/courses')->with("error", " <span style='font-weight:bold;font-size:13px;'></span> ");
            return redirect('studentUpload')->with("error", "Please upload an excel file!");

        }


        return redirect('/student')->with("success", " $total Student uploaded successfully");


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
        //
    }

    public function import()
    {
        return Excel::import(new Student, 'users.xlsx');
    }

}
