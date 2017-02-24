<?php

/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/21/2017
 * Time: 6:55 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;

class AdminUserController extends Controller
{
    public function index(){
        $check=Session::get('success');
        $role=Session::get('role');

        if($check!=null and $role=='admin'){

            $departmentInfo=DB::table('department')->get();
            $userData=DB::table('user')->get();
            $profileData=DB::table('profile')->get();

            Session::put('AllUserInformation',$userData);
            Session::put('AllProfileInformation',$profileData);
            Session::put('DepartmentInfo',$departmentInfo);

            return view('admin.allUserProfile');

        }
        else{
            return view('admin.404Error');
        }
    }
    public function addUser(){
        $check=Session::get('success');
        $role=Session::get('role');

        if($check!=null and $role=='admin'){
            return view('admin.addUserForm');
        }
        else{
            return view('admin.404Error');
        }
    }

    public function addUserData(Request $request){
        $check=Session::get('success');
        $role=Session::get('role');
        if($check!=null and $role=='admin'){

            $firstName=$request->input('firstName');
            $lastName=$request->input('lastName');
            $motherName=$request->input('motherName');
            $fatherName=$request->input('fatherName');
            $email=$request->input('email');
            $phone=$request->input('phoneNO');
            $pass=$request->input('pass');
            $birthDay=$request->input('birthday');
            $role=$request->input('iCheck');
            $deptCode=$request->input('deptCode');
            $bloodGroup=$request->input('bloodGroup');
            $registrationID=$request->input('registrationNo');
            $batchID=substr($registrationID,0,4);



            $user_id=DB::table('user')->insertGetID([
                'EMAIL'=>$email,'PASSWORD'=>$pass,'ROLE'=>$role,'DEPT_CODE'=>$deptCode,'BATCH_ID'=>$batchID,'STATUS'=>'1'
            ]);

            DB::table('profile')->insert([
                'USER_ID'=>$user_id, 'FIRST_NAME'=>$firstName , 'LAST_NAME'=>$lastName,'MOTHER_NAME'=>$motherName,'FATHER_NAME'=>$fatherName
                ,'DOB'=>$birthDay,'BLOOD_GROUP'=>$bloodGroup,'ADDRESS'=>"",'REGISTRATION_NO'=>$registrationID,'PHONE_NUM'=>$phone,'DEPT_CODE'=>$deptCode
            ]);
            return redirect()->route('admin_profile');
        }

    }

}