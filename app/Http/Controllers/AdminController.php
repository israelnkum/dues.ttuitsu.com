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

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
      if (Auth::user()->updated==0){
           return view('pages.admins.updateSuperAdmin')
               ->with('depName',$depName);
       }else{
            $amtPaid = Student::all()->sum('amount_paid');
          $allStudent = Student::all()->count();

            $level = Level::all();
            $getNumber =[];

            $getCurrentLevel=[];
            foreach ($level as $lvl){
                array_push($getNumber,$lvl->amountPaying*Student::where('level_id',$lvl->id)->count());
                array_push($getCurrentLevel,Student::where('level_id',$lvl->id)->count(),$lvl->name);

            }




           $spliced =array_chunk($getCurrentLevel,2);


           // return $spliced;
             $totalAmt = array_sum($getNumber);

            $countUsers = User::all()->count();
            $countAdmins = Admin::all()->count();

           return view('home')

               ->with('depName',$depName)
               ->with('amtPaid',$amtPaid)
               ->with('totalAmt',$totalAmt)
               ->with('countUsers',$countUsers)
               ->with('countAdmins',$countAdmins)
               ->with('allStudent',$allStudent)
               ->with('spliced',$spliced);
       }
    }


    public function allAdmin()
    {

        $pre = Preference::all();

        foreach ($pre as $depName){

        }
        $allAdmin = User::all();
        $allSuperAdmin = Admin::all();
        return view('pages.admins.allAdmin')
            ->with('allAdmin',$allAdmin)
            ->with('allSuperAdmin',$allSuperAdmin)
            ->with('depName',$depName);
    }
    public function newAdmin()
    {
        $pre = Preference::all();

        foreach ($pre as $depName){

        }
        $allAdmin = User::all();
        return view('pages.admins.newAdmin')
            ->with('allAdmin',$allAdmin)
            ->with('depName',$depName);
    }

    public function newSuperAdmin()
    {
        $pre = Preference::all();

        foreach ($pre as $depName){

        }
        $allSuperAdmin = Admin::all();

        return view('pages.admins.newSuperAdmin')
            ->with('allSuperAdmin',$allSuperAdmin)
            ->with('depName',$depName);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSuperAdmin(Request $request)
    {

        // create post
        $admin = new Admin;
        $admin->username = $request->input('username');
        $admin->phoneNumber = $request->input('phoneNumber');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('username'));
        //$post->author = auth()->user()->name;
        $admin->save();

        return redirect('admin/newSuperAdmin')
            ->with('success','New Super Admin Created');

    }


    public function storeAdmin(Request $request)
    {

        // create post
        $admin = new User;
        $admin->username = $request->input('username');
        $admin->phoneNumber = $request->input('phoneNumber');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('username'));
        //$post->author = auth()->user()->name;
        $admin->save();

        return redirect('admin/newAdmin')
            ->with('success','New Admin Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdminDetails($id,$userType)
    {
        $pre = Preference::all();
        foreach ($pre as $depName){

        }
        if ($userType=='admin'){
            $adminDetail = Admin::find($id);
        }else{
            $adminDetail = User::find($id);
        }


       return view('pages.admins.showAdminDetails')
           ->with('adminDetail',$adminDetail)
           ->with('depName',$depName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSuperAdminUpdateForm()
    {
        $pre = Preference::all();
        foreach ($pre as $depName){

        }
        return view('pages.admins.updateSuperAdmin')
            ->with('depName',$depName);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSuperAdminInfo(Request $request)
    {

        $pre = Preference::all();
        foreach ($pre as $depName){

        }
        if (Auth::user()->updated==0) {
            $admin = Admin::find($request->input('id'));
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
                return redirect('/admin')->with('update_success', 'Profile updated successfully');
            }
        }else{
            $admin =Admin::find($request->input('id'));
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
                return redirect('/admin')
                    ->with('update_success', 'Profile updated successfully')
                    ->with('depName',$depName);
            }
        }

    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAdmin($id,$userType)
    {
        if ($userType=='admin'){
            $admin = Admin::find($id);
        }else{
            $admin = User::find($id);
        }

        $admin->delete();
        return redirect('/admin/allAdmin')->with('success','Deleted');

    }
}
