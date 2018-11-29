<?php

namespace App\Http\Controllers;

use App\Level;
use App\PaymentLog;
use App\Preference;
use App\Sourvenir;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Auth;
use QR_Code\Types\QR_meCard;
use QR_Code\QR_Code;
class PaymentController extends Controller
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
        return view('pages.payments.makePayment')
            ->with('depName',$depName);
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
        $selectedSouvenirs=[];
        $student = Student::find($id);

        //   return(explode(',',));
        $souvenirs =Sourvenir::all();

        $allSouvenirs=[];
        foreach ($souvenirs as $sour){
            array_push($allSouvenirs,$sour->name);
        }

        $lvl = Level::where('id',$student->level_id)->get();

        foreach ($lvl as $lv){

            $maxAmount =$lv->amountPaying;
            $stdLevel = $lv->name;
        }


        $keywords = explode(' ',implode(' ',preg_replace('/\s+/', '',  $allSouvenirs)));

        $foundWords = [];
        foreach ($keywords as $key)
        {
            if (!in_array($key,explode(',',$student->souvenir)))
            {
                $foundWords[] = $key;
            }
        }
        foreach($foundWords as $word)
        {
            array_push($selectedSouvenirs,$word);
        }


        return view('pages.payments.makePayment')
            ->with('selectedSouvenirs',$selectedSouvenirs)
            ->with('student',$student)
            ->with('depName',$depName)
            ->with('maxAmount',$maxAmount)
            ->with('stdLevel',$stdLevel)
            ;
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
        //find Current Student
        $student = Student::find($id);


        $selectedSouvenirs=[];
        $souvenir = Sourvenir::all();
        $array = [];

        //get Selected Souvenirs
        foreach($souvenir as $so){
            array_push($array,preg_replace('/\s+/', '',  $so->name));
        }

        $keywords = explode(' ',$re= implode(' ',$array));

        $foundWords = [];
        foreach ($keywords as $key)
        {
            if (in_array($key, $request->toArray()))
            {
                $foundWords[] = $key;
            }
        }
        foreach($foundWords as $word)
        {
            array_push($selectedSouvenirs,$word);
        }



        $getStudentLevel = $request->input('stdLevel');


        //return ($student);

        if ($student->souvenir!='' && strpos($student->souvenir,',') ==false){
            $student->souvenir=$student->souvenir.",".preg_replace('/[^A-Za-z0-9\-"]/', ',', implode(',',$selectedSouvenirs));

        }elseif ($student->souvenir!=''){
            $student->souvenir=$student->souvenir.",".preg_replace('/[^A-Za-z0-9\-"]/', ',', implode(',',$selectedSouvenirs));

        }else{
            $student->souvenir=$student->souvenir.preg_replace('/[^A-Za-z0-9\-"]/', ',', implode(',',$selectedSouvenirs));
        }

        $getAmtToBePaid = Level::select('amountPaying')->where('id',$student->level_id)->get();

        foreach ($getAmtToBePaid as $td){

        }


        if ($request->input('amountPaying') ==0){
            $amount =0;
        }else{
            $amount =$request->input('amountPaying');
        }


        if ($student->amount_paid == $td->amountPaying){
            $arrears = 0;
        }else{
            $arrears = $td->amountPaying- ($student->amount_paid+$amount);
        }
        $student->amount_paid = $request->input('amountPaying')+$student->amount_paid;

        $student->save();


        //insert into payment log table
        $paymentLog = new PaymentLog();
        $paymentLog->student_id = $id;


        $countLogs = PaymentLog::get()->count();
        if ($countLogs == 0){
            $receipt=  $paymentLog->receiptNumber = substr(date('Ymd'),'2').'0001';
        }else{
            $record = PaymentLog::latest()->first();
            $expNum = $record->receiptNumber;
            if ($expNum == '' ){
                $receipt=  $paymentLog->receiptNumber = substr(date('Ymd'),'2').'001';
            } else {
                //increase 1 with last receipt number
                $receipt=  $paymentLog->receiptNumber =  $expNum+1;
            }
        }
        $paymentLog->arrears =$arrears;
        $paymentLog->amountPaid = $request->input('amountPaying');
        $paymentLog->paymentType = 'New Payment';
        $sour=$paymentLog ->souvenirTaken=preg_replace('/[^A-Za-z0-9\-"]/', ',', implode(',',$selectedSouvenirs));
        $user= $paymentLog->currentUser = Auth::user()->firstName." ".Auth::user()->lastName;
        $dateTime = $paymentLog->created_at=(date('Y-m-d h:i:m'));
        $paymentLog->updated_at=(date('Y-m-d h:i:m'));

        $std=$student->lastName.' '.$student->firstName.' '.$student->otherName;

        QR_Code::png(
            'Student---'.$std.
                     ' Supervisor---'.$user.
                     ' Amount Paid--- '.$amount.'Gh Cedis '.
                     ' Souvenir(s) --- '.$sour.
                     ' Date---'.$dateTime,
            public_path('qrCodes/'.$receipt.'.png'));

        $paymentLog->save();


        if ($paymentLog){

            $student = Student::where('id',$id)->get();
            return view('pages.payments.printPreview')
                ->with('student',$student)
                ->with('amount',$amount)
                ->with('receipt',$receipt)
                ->with('arrears',$arrears)
                ->with('user',$user)
                ->with('dateTime',$dateTime)
                ->with('getStudentLevel',$getStudentLevel)
                ->with('receipt',$receipt);
        }

        //return redirect('/student')->with('payment_success','Payment Successful');

    }

    public function generateReceipt($id){
        $log =PaymentLog::with('student')
            ->where('id',$id)->get();
        //die($log);
        return view('pages.students.genereateReceipt')
            ->with('log',$log);
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
