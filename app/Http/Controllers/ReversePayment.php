<?php

namespace App\Http\Controllers;

use App\PaymentLog;
use App\Preference;
use App\Student;
use Illuminate\Http\Request;

class ReversePayment extends Controller
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
        $pre = Preference::all();
        foreach ($pre as $depName){

        }
        $paymentLog =PaymentLog::with('student')
            ->where('student_id',$id)->get();
        return view('pages.payments.reversePayment')
            ->with('depName',$depName)
            ->with('paymentLog',$paymentLog);
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
        //insert into payment log table
        $paymentLog = new PaymentLog();
        $paymentLog->student_id = $id;
        $arrears =$paymentLog->arrears = $request->input('amountPaying')- 25;

        $countLogs = PaymentLog::get()->count();
        if ($countLogs == 0){
            $receipt=  $paymentLog->receiptNumber = substr(date('Ymd'),'2').'00001';
        }else{
            $record = PaymentLog::latest()->first();
            $expNum = $record->receiptNumber;
            if ($expNum == '' ){
                $receipt=  $paymentLog->receiptNumber = substr(date('Ymd'),'2').'0001';
            } else {
                //increase 1 with last invoice number
                $receipt=  $paymentLog->receiptNumber =  $expNum+1;
            }
        }
        $amount= $paymentLog->amountPaid = $request->input('amountPaying');
        $paymentLog->paymentType = 'New Payment';
        $paymentLog ->souvenirTaken=preg_replace('/[^A-Za-z0-9\-"]/', ',', implode(',',$selectedSouvenirs));
        $user= $paymentLog->currentUser = Auth::user()->firstName." ".Auth::user()->lastName;
        $paymentLog->save();


        if ($paymentLog){

            $student = Student::where('id',$id)->get();
            return view('pages.payments.printPreview')
                ->with('student',$student)
                ->with('amount',$amount)
                ->with('receipt',$receipt)
                ->with('arrears',$arrears)
                ->with('user',$user);


        }
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
