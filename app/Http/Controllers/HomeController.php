<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Level;
use App\Preference;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pre = Preference::all();

        foreach ($pre as $depName){

        }
        if (Auth::user()->updated==0){
            return view('pages.admins.updateAdmin')
                ->with('depName',$depName);
        }else{
            $amtPaid = Student::all()->sum('amount_paid');
            $allStudent = Student::all()->count();
            $level = Level::all();
            $getNumber =[];

            $getCurrentLevel=[];
            foreach ($level as $lvl){
                array_push($getNumber,$lvl->amountPaying*Student::where('level_id',$lvl->id)->count());
                array_push($getCurrentLevel,Student::where('level_id',$lvl->id)->count());
            }

            //return $getCurrentLevel;
            // $spliced =array_chunk($getCurrentLevel,2);
            $totalAmt = array_sum($getNumber);

            $countUsers = User::all()->count();
            $countAdmins = Admin::all()->count();
            return view('home')
                ->with('depName',$depName)
                ->with('amtPaid',$amtPaid)
                ->with('totalAmt',$totalAmt)
                ->with('countUsers',$countUsers)
                ->with('countAdmins',$countAdmins)
                ->with('allStudent',$allStudent);
        }

    }

    public function updateAdminInfo(Request $request)
    {
        if (Auth::user()->updated==0) {
            $admin = User::find($request->input('id'));
            $admin->title = $request->input('title');
            $admin->firstName = $request->input('firstName');
            $admin->lastName = $request->input('lastName');
            $admin->gender = $request->input('gender');
            $admin->dateOfBirth = $request->input('dateOfBirth');
            $admin->email = $request->input('email');
            $admin->phoneNumber = $request->input('phoneNumber');
            $admin->homeTown = $request->input('homeTown');
            $admin->region = $request->input('region');
            $admin->address = $request->input('address');
            $admin->houseNumber = $request->input('houseNumber');
            $admin->username = $request->input('username');
            $admin->password = Hash::make($request->input('password'));
            $admin->updated = 1;

            if ($admin->save()) {
                return redirect('/home')->with('update_success', 'Profile updated successfully');
            }
        }else{
            $admin =User::find($request->input('id'));
            $admin->title = $request->input('title');
            $admin->firstName = $request->input('firstName');
            $admin->lastName = $request->input('lastName');
            $admin->gender = $request->input('gender');
            $admin->dateOfBirth = $request->input('dateOfBirth');
            $admin->email = $request->input('email');
            $admin->phoneNumber = $request->input('phoneNumber');
            $admin->homeTown = $request->input('homeTown');
            $admin->region = $request->input('region');
            $admin->address = $request->input('address');
            $admin->houseNumber = $request->input('houseNumber');
            $admin->updated =1;

            if ($admin->save()) {
                return redirect('/home')->with('update_success', 'Profile updated successfully');
            }
        }

    }

    public function showAdminUpdateForm()
    {
        $pre = Preference::all();

        foreach ($pre as $depName){

        }
        return view('pages.admins.updateAdmin')
            ->with('depName',$depName);
    }

}
