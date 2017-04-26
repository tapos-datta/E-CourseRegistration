<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;
use Image;



class UserController extends Controller
{
    public function editProfile($userId){
        $check=Session::get('success');

        if($check!=null and $check==$userId){

            $securityIssues=DB::table('user')->select('EMAIL','PASSWORD')->where('USER_ID','=',$userId)->first();

            Session::put('securityIssue',$securityIssues);

            return view('admin.editUserProfile');
        }
        else{
            return view('admin.404Error');
        }
    }
    public function updateProfile(Request $request)
    {
        $check = Session::get('success');
        $role_=Session::get('role');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $fatherName = $request->input('fatherName');
        $motherName = $request->input('motherName');
        $bloodGroup = $request->input('bloodGroup');
        $birthday = $request->input('birthday');
        $phoneNo = $request->input('phoneNo');

        if($role_=='admin'){

            $userId = $request->input('editUserId');
            $role = $request->input('role');
            $email = $request->input('email');
            $dept_code = $request->input('departmentCode');

            DB::table('profile')->where('USER_ID','=', $userId)->update([
                'FIRST_NAME' => $firstName, 'LAST_NAME' => $lastName, 'MOTHER_NAME' => $motherName, 'FATHER_NAME' => $fatherName
                , 'DOB' => $birthday, 'BLOOD_GROUP' => $bloodGroup, 'PHONE_NUM' => $phoneNo,'DEPT_CODE'=> $dept_code
            ]);


            DB::table('user')->where('USER_ID','=', $userId)->update([
                'EMAIL' => $email,'ROLE'=>$role ,'DEPT_CODE'=>$dept_code
            ]);
            $image = $request->file('image');
            if ($image != null)
            {
                $imagename =$check.'.'. $image->getClientOriginalExtension();

                $destinationPath = public_path('/images/users');
                $img = Image::make($image->getRealPath());
                $img->resize(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $imagename);

                DB::table('profile')->where('USER_ID','=', $userId)->update([
                    'IMAGE_NAME' => $imagename
                ]);

            }
            return redirect()->route('admin_profile')->with('message','Successfully changed information of UserId '.$userId);
        }
        else if($role_=='student' or $role_=='head')
        {
            DB::table('profile')->where('USER_ID','=', $check)->update([
                'FIRST_NAME' => $firstName, 'LAST_NAME' => $lastName, 'MOTHER_NAME' => $motherName, 'FATHER_NAME' => $fatherName
                , 'DOB' => $birthday, 'BLOOD_GROUP' => $bloodGroup, 'PHONE_NUM' => $phoneNo
            ]);

            $image = $request->file('image');


            if ($image != null)
            {
                $imagename =$check.'.'. $image->getClientOriginalExtension();

                $destinationPath = public_path('/images/users');
                $img = Image::make($image->getRealPath());
                $img->resize(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $imagename);

                DB::table('profile')->where('USER_ID','=', $check)->update([
                    'IMAGE_NAME' => $imagename
                ]);

            }

            return redirect()->route('user_profile');
        }



    }

    public function updatePassword(Request $request){
        $check = Session::get('success');
        $role=Session::get('role');
        if($check!=null and $role!='admin')
        {
            $newPass=$request->input('newPassword');
            $currentPass=$request->input('currentPassword');

           $valid= DB::table('user')->where('USER_ID',$check)->where('PASSWORD',$currentPass)->first();
            if($valid!=null)
            {
                DB::table('user')->where('USER_ID',$check)->update([
                    'PASSWORD'=>$newPass
                ]);

                return redirect()->route('user_profile')->with('message','Successfully changed Password');
            }
            else{
                return redirect()->route('edit.user.profile',array('userId'=>$check))->with('message','Current password not matched and not updated password');
            }

        }
        else if($check!=null and $role=='admin'){

            $newPass=$request->input('newPassword');
            $userId=$request->input('editUserId');

            DB::table('user')->where('USER_ID',$userId)->update([
                'PASSWORD'=>$newPass
            ]);
            return redirect()->route('admin_profile')->with('message','Successfully changed Password of UserId '.$userId);
        }
        else{
            return view('admin.404Error');
        }
    }

    public function rootEditInfo(Request $request){
        $userId=$request->input('userId');

        $userdata1=DB::table('user')->where('USER_ID',$userId)->first();
        $profileData1=DB::table('profile')->where('USER_ID',$userId)->first();
        $dept=DB::table('department')->get();
        Session::put('specificUserData',$userdata1);
        Session::put('SpecificUserProfile',$profileData1);
        Session::put('departmentCodeList',$dept);

        return view('admin.usersEditFile');
    }
}

