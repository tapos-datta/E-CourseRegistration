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
            $batchInfo=DB::table('batch_info')->select('SEMESTER_NAME','LEVEL','ADMIT_SESSION','CURRENT_SESSION')->where('BATCH_ID','=',$user1->BATCH_ID)->first();

            $registrationGoingOn=DB::table('schedule_of_exam')->where('DEPT_CODE','=',$user1->DEPT_CODE)->get();

            Session::put('studentOfBatch',$user1->BATCH_ID);
            Session::put('studentOfDepartment',$user1->DEPT_CODE);
            Session::put('studentOfAdmitSession',$batchInfo->ADMIT_SESSION);
            Session::put('studentOfCurrentSession',$batchInfo->CURRENT_SESSION);
            Session::put('studentOfCurrentSemester',$batchInfo->SEMESTER_NAME);
            Session::put('studentOfCurrentLevel',$batchInfo->LEVEL);
            if(sizeof($registrationGoingOn)>=1){
                Session::put('registrationGoingOn',$registrationGoingOn);
            }
            return view('admin.notificationUser1');
        }
        if($check!=null && $role=='admin'){

            $registeredList=DB::table('registration_process')->get();
            $syllabus_info=DB::table('syllabus')->get();
            Session::put('ListOfRegisteredStudent',$registeredList);
            Session::put('informationOfSyllabus',$syllabus_info);

            return view('admin.notificationHead');
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
                $tempCourseList=DB::table('offered_courses')->select('COURSE_ID')->where('EXAM_ID','=',$offered->EXAM_ID)->get();

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
                Session::put('DropAdvancedCourseList',$current);
            }


            return view('admin.registerDesign');
        }
        else
        {
            return view('admin.404Error');
        }

    }

    public function completeRegistration(Request $request){
        $check=Session::get('success');
        $role=Session::get('role');
        $isRegistered=Session::get('isRegistered');
        $majorList=array();
        $minorList=array();
        $dropAdList=array();
        $valid=Session::get('registrationGoingOn');
        if($check!=null && $role=='student'&& $isRegistered==null){
            $userInfo=DB::table('profile')->where('USER_ID','=',$check)->first();
            $user=DB::table('user')->where('USER_ID','=',$check)->first();
            $batchinfo=DB::table('batch_info')->where('BATCH_ID','=',$user->BATCH_ID)->first();
            $majorCourseListNumber = $request->input('majorCourseListNumber');
            $minorCourseListNumber = $request->input('minorCourseListNumber');
            $dropAdCourseListNumber = $request->input('dropAdCourseListNumber');
            $studentName = $request->input('studentName');
            $fatherName = $request->input('fatherName');
            $motherName= $request->input('motherName');
            $c_session = $request->input('c_session');
            $examYear = $request->input('examYear');
            $year = $request->input('year');
            $semesterNO= $request->input('semesterNo');
            $semesterName = $request->input('semesterName');
            $reg_no = $request->input('reg_no');
            $examName = $request->input('iCheck');
            $address = $request->input('address');
            $majorCredit=$request->input('majorCredit');
            $minorCredit=$request->input('minorCredit');
            $dropAdCredit=$request->input('dropAdCredit');
            $syllabusYear=substr($reg_no,0,4);


            for($i=1;$i<=$majorCourseListNumber;$i++){
                $temp=$request->input('majorCourseList'.$i);
                DB::table('registered_list')->insert([
                 'REG_NO'=>$reg_no,'COURSE_ID'=>$temp,'REG_SEMESTER'=>$batchinfo->SEMESTER_NAME,'SYLLABUS_YEAR'=>$syllabusYear
                ]);
                 array_push($majorList,$temp);
            }

            for($i=1;$i<=$minorCourseListNumber;$i++){
                $temp=$request->input('minorCourseList'.$i);
                DB::table('registered_list')->insert([
                    'REG_NO'=>$reg_no,'COURSE_ID'=>$temp,'REG_SEMESTER'=>$batchinfo->SEMESTER_NAME,'SYLLABUS_YEAR'=>$syllabusYear
                ]);
                array_push($minorList,$temp);
            }
            for($i=1;$i<=$dropAdCourseListNumber;$i++){
                $temp=$request->input('dropAdCourseList'.$i);
                DB::table('registered_list')->insert([
                    'REG_NO'=>$reg_no,'COURSE_ID'=>$temp,'REG_SEMESTER'=>$batchinfo->SEMESTER_NAME,'SYLLABUS_YEAR'=>$syllabusYear
                ]);
                array_push($dropAdList,$temp);
            }

           DB::table('registration_process')->insert([
                'REG_NO'=>$reg_no, 'EXAM_YEAR'=>$examYear, 'NAME'=>$studentName,'REQUEST'=>'0', 'TOTAL_CREDIT'=>($majorCredit+$minorCredit+$dropAdCredit),
               'SEMESTER_NAME'=>$semesterNO,'SYLLABUS_YEAR'=>$syllabusYear
            ]);

            return view('admin.showPrintableform');

        }

    }


}