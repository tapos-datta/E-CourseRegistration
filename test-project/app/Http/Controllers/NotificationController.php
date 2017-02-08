<?php

/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/7/2017
 * Time: 3:30 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;


class NotificationController extends Controller
{
    public function index(){
        $check=Session::get('success');
        $role=Session::get('role');
        if($check!=null && $role=='student') {

            $user1=DB::table('user')->select('BATCH_ID','DEPT_CODE')->where('USER_ID','=',$check)->first();
            $batchInfo=DB::table('batch_info')->select('SEMESTER_NAME','LEVEL')->where('BATCH_ID','=',$user1->BATCH_ID)->first();

            $registrationGoingOn=DB::table('offered_courses')->where('DEPT_CODE','=',$user1->DEPT_CODE)->get();

            Session::put('studentOfBatch',$user1->BATCH_ID);
            Session::put('studentOfDepartment',$user1->DEPT_CODE);
            Session::put('studentOfCurrentSemester',$batchInfo->SEMESTER_NAME);
            Session::put('studentOfCurrentLevel',$batchInfo->LEVEL);
            if(sizeof($registrationGoingOn)>=1){
                Session::put('registrationGoingOn',$registrationGoingOn);
            }
            return view('admin.notificationUser1');
        }
        if($check!=null && $role=='admin'){
            return view('admin.404Error');
        }
    }

    public function applyForRegistration(){
        $check=Session::get('success');
        $role=Session::get('role');
        $valid=Session::get('registrationGoingOn');
        $deptCode=Session::get('studentOfDepartment');
        $isRegistered=Session::get('isRegistered');

        if($check!=null && $role=='student' && $valid!=null && $isRegistered==null){
            $courses=array();
            $deptName=DB::table('department')->select('DEPT_NAME_SHORT')->where('DEPT_CODE','=',$deptCode)->first();

            Session::put('deptShort',$deptName);

            foreach ($valid as $offered){
                $tempCourseList=DB::table('course_list')->select('COURSE_ID')->where('SEMESTER_NAME','=',$offered->SEMESTER_NAME)->
                    where('SYLLABUS_YEAR','=',$offered->SYLLABUS_YEAR)->where('DEPT_CODE','=',$deptCode)->get();

                foreach ($tempCourseList as $temp){
                      $courseDetails=DB::table('courses')->where('COURSE_ID','=',$temp->COURSE_ID)->first();

                      $courses[]=$courseDetails;
                }

            }
            Session::put('listOfOfferedCourses',$courses);
            Session::put('MajorCourseList',null);
            Session::put('MinorCourseList',null);
            Session::put('DropAdvancedCourseList',null);
            return view('admin.registerDesign');

        }

    }

    public function majorCourseAdd(){
        $check=Session::get('success');
        $role=Session::get('role');
        $valid=Session::get('registrationGoingOn');

        $isRegistered=Session::get('isRegistered');

        if($check!=null && $role=='student'&& $valid!=null && $isRegistered==null){
//            return Session::get('listOfOfferedCourses');
            return view('admin.listOfAddingCourse');
        }
        else
        {
            return view('admin.404Error');
        }

    }
    public function minorCourseAdd(){
        $check=Session::get('success');
        $role=Session::get('role');
        $valid=Session::get('registrationGoingOn');

        $isRegistered=Session::get('isRegistered');

        if($check!=null && $role=='student'&& $valid!=null && $isRegistered==null){
//            return Session::get('listOfOfferedCourses');
            return view('admin.listOfAddingMinorCourse');
        }
        else
        {
            return view('admin.404Error');
        }

    }

    public function courseAddToFrom(Request $request){

        $check=Session::get('success');
        $role=Session::get('role');
        $valid=Session::get('registrationGoingOn');

        $isRegistered=Session::get('isRegistered');

        if($check!=null && $role=='student'&& $valid!=null && $isRegistered==null){
               $userInfo=DB::table('profile')->where('USER_ID','=',$check)->first();

            $previous=Session::get('MajorCourseList');


            $current=$request->input('check_list');

            if($previous!=null) {
                $new=array();
                foreach($previous as $pre){
                    $new[]=$pre;
                }
                if($current!=null) {
                    foreach ($current as $crnt) {
                        $new[] = $crnt;
                    }
                }

                Session::put('MajorCourseList', $new);
            }
            else{
                Session::put('MajorCourseList', $current);
            }


            return view('admin.registerDesign');
        }
        else
        {
            return view('admin.404Error');
        }

    }
    public function minorCourseAddToFrom(Request $request){

        $check=Session::get('success');
        $role=Session::get('role');
        $valid=Session::get('registrationGoingOn');

        $isRegistered=Session::get('isRegistered');

        if($check!=null && $role=='student'&& $valid!=null && $isRegistered==null){
            $userInfo=DB::table('profile')->where('USER_ID','=',$check)->first();

            $previous=Session::get('MinorCourseList');


            $current=$request->input('check_list');

            if($previous!=null) {
                $new=array();
                foreach($previous as $pre){
                    $new[]=$pre;
                }
                if($current!=null) {
                    foreach ($current as $crnt) {
                        $new[] = $crnt;
                    }
                }

                Session::put('MinorCourseList', $new);
            }
            else{
                Session::put('MinorCourseList', $current);
            }


            return view('admin.registerDesign');
        }
        else
        {
            return view('admin.404Error');
        }

    }

    public function dropAdvncCourseAdd(){

        $check=Session::get('success');
        $role=Session::get('role');
        $valid=Session::get('registrationGoingOn');

        $isRegistered=Session::get('isRegistered');

        if($check!=null && $role=='student'&& $valid!=null && $isRegistered==null){
//            return Session::get('listOfOfferedCourses');
            return view('admin.listOfAddingdropAdCourse');
        }
        else
        {
            return view('admin.404Error');
        }
    }

    public function dropAdvanceCourseAddToFrom(Request $request){

        $check=Session::get('success');
        $role=Session::get('role');
        $valid=Session::get('registrationGoingOn');

        $isRegistered=Session::get('isRegistered');

        if($check!=null && $role=='student'&& $valid!=null && $isRegistered==null){
            $userInfo=DB::table('profile')->where('USER_ID','=',$check)->first();

            $previous=Session::get('DropAdvancedCourseList');


            $current=$request->input('check_list');

            if($previous!=null) {
                $new=array();
                foreach($previous as $pre){
                    $new[]=$pre;
                }
                if($current!=null) {
                    foreach ($current as $crnt) {
                        $new[] = $crnt;
                    }
                }

                Session::put('DropAdvancedCourseList', $new);
            }
            else{
                Session::put('DropAdvancedCourseList', $current);
            }


            return view('admin.registerDesign');
        }
        else
        {
            return view('admin.404Error');
        }

    }


}