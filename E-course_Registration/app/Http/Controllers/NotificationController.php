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
use View;


class NotificationController extends Controller
{
    public function index(){

        $check=Session::get('success');
        $role=Session::get('role');
        if($check!=null && $role=='student') {

            $user1=DB::table('user')->select('BATCH_ID','DEPT_CODE')->where('USER_ID','=',$check)->first();
            $reg=DB::table('profile')->select('REGISTRATION_NO')->where('USER_ID','=',$check)->first();
            $batchInfo=DB::table('batch_info')->select('SEMESTER_NAME','LEVEL','ADMIT_SESSION','CURRENT_SESSION')->where('BATCH_ID','=',$user1->BATCH_ID)->first();
            $today=date('Y-m-d');

            $registrationGoingOn=DB::table('schedule_of_exam')->where('DEPT_CODE','=',$user1->DEPT_CODE)->where('DEAD_LINE','>',$today)->get();

            $data= DB::table('registration_process')->where('REG_NO',$reg->REGISTRATION_NO)->get();
            if(sizeof($data)>0){

                Session::put('isRegisteredUser','true');
            }
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

        if($check!=null && ($role=='admin' || $role=='head')){
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

            $deptName=DB::table('department')->select('DEPT_NAME_SHORT')->where('DEPT_CODE','=',$deptCode)->first();

            Session::put('deptShort',$deptName);

            $courses=array();

            foreach ($valid as $offered){
//                echo 'EXAM ID '.$offered->EXAM_ID.'\n';
               $offeredID= DB::table('offered_courses')->select('OFFERED_ID')->where('EXAM_ID',$offered->EXAM_ID)->get();


                foreach ($offeredID as $item) {
//                    echo 'offered Id '.$item->OFFERED_ID.'\n';

                    $offerdCourses= DB::table('offered_course_list')->where('OFFERED_ID',$item->OFFERED_ID)->get();

                    foreach ($offerdCourses as $course){
                        array_push($courses,$course);
                    }
                }
            }
//            return sizeof($courses);

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


           $currentofferedId=DB::table('offered_courses')
                ->join('schedule_of_exam', function ($join) {
                    $today=date('Y-m-d');
                    $studentOfCurrentSemester=Session::get('studentOfCurrentSemester');
                    $join->on('offered_courses.EXAM_ID', '=', 'schedule_of_exam.EXAM_ID')
                        ->where('schedule_of_exam.DEAD_LINE', '>', $today)
                        ->where('offered_courses.SEMESTER_NAME','=',$studentOfCurrentSemester);
                })
                ->first();

            $offeredMajorCourseList=null;


            if(sizeof($currentofferedId)>0) {
                $offeredMajorCourseList = DB::table('offered_course_list')
                    ->where('OFFERED_ID','=', $currentofferedId->OFFERED_ID)
                    ->where('CATEGORY', '=', 'MAJOR')
                    ->get();
//            return Session::get('listOfOfferedCourses');
            }
            Session::put('offeredMjor',$offeredMajorCourseList);
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

            $currentofferedId=DB::table('offered_courses')
                ->join('schedule_of_exam', function ($join) {
                    $today=date('Y-m-d');
                    $studentOfCurrentSemester=Session::get('studentOfCurrentSemester');
                    $join->on('offered_courses.EXAM_ID', '=', 'schedule_of_exam.EXAM_ID')
                        ->where('schedule_of_exam.DEAD_LINE', '>', $today)
                        ->where('offered_courses.SEMESTER_NAME','=',$studentOfCurrentSemester);
                })
                ->first();


            $offeredMinorCourseList=null;

            if(sizeof($currentofferedId)>0) {

                $offeredMinorCourseList = DB::table('offered_course_list')
                    ->where('OFFERED_ID','=', $currentofferedId->OFFERED_ID)
                    ->where('CATEGORY', '=', 'NON-MAJOR')
                    ->get();
//            return Session::get('listOfOfferedCourses');
            }
            Session::put('offeredMinor',$offeredMinorCourseList);

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

            $currentSemester=Session::get('studentOfCurrentSemester');
            $currentLevel=Session::get('studentOfCurrentLevel');
            $dropAdvanceofferedID=null;
            if($currentLevel+2<=4){

                $IdList=array();
                $advanceNotAllow=(($currentLevel+2)*2)-1;
                foreach ($valid as $offered){
//                echo 'EXAM ID '.$offered->EXAM_ID.'\n';
                    $offeredID= DB::table('offered_courses')
                                        ->where('EXAM_ID',$offered->EXAM_ID)
                                        ->where('SEMESTER_NAME','!=',$currentSemester)
                                        ->where('SEMESTER_NAME','<',$advanceNotAllow)
                                        ->get();

                    foreach ($offeredID as $item) {
//                    echo 'offered Id '.$item->OFFERED_ID.'\n';
                            array_push($IdList,$item);
                    }
                }

                $dropAdvanceofferedID=$IdList;


            }
            else{

                foreach ($valid as $offered){
//                echo 'EXAM ID '.$offered->EXAM_ID.'\n';
                    $offeredID= DB::table('offered_courses')->select('OFFERED_ID')
                        ->where('EXAM_ID','=',$offered->EXAM_ID)
                        ->where('SEMESTER_NAME','!=',$currentSemester)
                        ->get();

                    foreach ($offeredID as $item) {
//                    echo 'offered Id '.$item->OFFERED_ID.'\n';
                        array_push($IdList,$item);
                    }
                }

                $dropAdvanceofferedID=$IdList;
            }
            $dropAdCoursesList=array();

            if(sizeof($dropAdvanceofferedID)>0)
            foreach ($dropAdvanceofferedID as $dropAd){
                $list=DB::table('offered_course_list')->where('OFFERED_ID',$dropAd->OFFERED_ID)->get();
                foreach ($list as $item){
                    array_push($dropAdCoursesList,$item);
                }
            }

            return view('admin.listOfAddingdropAdCourse',compact('dropAdCoursesList'));
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

    public function dropAdvanceCourseModifiedToFrom(Request $request){
        $check=Session::get('success');
        $role=Session::get('role');
        $isRegistered=Session::get('isRegistered');

        $valid=Session::get('registrationGoingOn');
         if($check!=null && $role=='student'&& $isRegistered==null){
             $id=$request->input('offerdCourseId');
             $status=$request->input('status');

             if($status=='dropAd') {
                 $previous = Session::get('DropAdvancedCourseList');

                 $new = array();
                 foreach ($previous as $pre) {
                     if ($pre != $id) {
                         $new[] = $pre;
                     }
                 }

                 Session::put('DropAdvancedCourseList', $new);
             }
             else if($status=='minor'){
                 $previous = Session::get('MinorCourseList');

                 $new = array();
                 foreach ($previous as $pre) {
                     if ($pre != $id) {
                         $new[] = $pre;
                     }
                 }

                 Session::put('MinorCourseList', $new);
             }
             else if($status=='major'){
                 $previous = Session::get('MajorCourseList');

                 $new = array();
                 foreach ($previous as $pre) {
                     if ($pre != $id) {
                         $new[] = $pre;
                     }
                 }

                 Session::put('MajorCourseList', $new);
             }

             return view('admin.registerDesign');

        }
    }

    public function completeRegistration(Request $request){

        $check=Session::get('success');
        $role=Session::get('role');
        $isRegistered=Session::get('isRegistered');

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

                $courseCode=DB::table('offered_course_list')->select('COURSE_CODE')->where('OFFERED_COURSE_LIST_ID',$temp)->first();
                $courseId=DB::table('courses')->select('COURSE_ID')->where('COURSE_CODE',$courseCode->COURSE_CODE)->first();


//                $currentofferedId=DB::table('courses')
//                    ->join('offered_course_list', function ($join) {
//                        $t=$te
//                        $join->on('offered_course_list.COURSE_CODE', '=', 'courses.COURSE_CODE')
//                            ->where('offered_course_list.OFFERED_COURSE_LIST_ID', '=', $temp)
//                            ->where('offered_courses.SEMESTER_NAME','=',$studentOfCurrentSemester);
//                    })
//                    ->first();

                $exist=DB::table('registered_list')->where([
                        'REG_NO'=>$reg_no,'COURSE_ID'=>$courseId->COURSE_ID,'REG_SEMESTER'=>$batchinfo->SEMESTER_NAME,'OFFERED_COURSE_LIST_ID'=>$temp
                    ])->first();
    //
                if(sizeof($exist)==null) {

                    DB::table('registered_list')->insert([
                        'REG_NO' => $reg_no, 'COURSE_ID' => $courseId->COURSE_ID, 'REG_SEMESTER' => $batchinfo->SEMESTER_NAME, 'OFFERED_COURSE_LIST_ID' => $temp
                    ]);
                }
                // array_push($majorList,$temp);
            }

            for($i=1;$i<=$minorCourseListNumber;$i++) {
                $temp = $request->input('minorCourseList' . $i);

                $courseCode = DB::table('offered_course_list')->select('COURSE_CODE')->where('OFFERED_COURSE_LIST_ID', $temp)->first();
                $courseId = DB::table('courses')->select('COURSE_ID')->where('COURSE_CODE', $courseCode->COURSE_CODE)->first();
                $exist = DB::table('registered_list')->where([
                    'REG_NO' => $reg_no, 'COURSE_ID' => $courseId->COURSE_ID, 'REG_SEMESTER' => $batchinfo->SEMESTER_NAME, 'OFFERED_COURSE_LIST_ID' => $temp
                ])->first();
                if ($exist == null){
                    DB::table('registered_list')->insert([
                        'REG_NO' => $reg_no, 'COURSE_ID' => $courseId->COURSE_ID, 'REG_SEMESTER' => $batchinfo->SEMESTER_NAME, 'OFFERED_COURSE_LIST_ID' => $temp
                    ]);
                }
               // array_push($minorList,$temp);
            }
            for($i=1;$i<=$dropAdCourseListNumber;$i++){
                $temp=$request->input('dropAdCourseList'.$i);

                $courseCode=DB::table('offered_course_list')->select('COURSE_CODE')->where('OFFERED_COURSE_LIST_ID',$temp)->first();
                $courseId=DB::table('courses')->select('COURSE_ID')->where('COURSE_CODE',$courseCode->COURSE_CODE)->first();
//                DB::table('registered_list')->insert([
//                    'REG_NO'=>$reg_no,'COURSE_ID'=>$courseId->COURSE_ID,'REG_SEMESTER'=>$batchinfo->SEMESTER_NAME,'OFFERED_COURSE_LIST_ID'=>$temp
//                ]);
//               // array_push($dropAdList,$temp);

                $exist = DB::table('registered_list')->where([
                    'REG_NO' => $reg_no, 'COURSE_ID' => $courseId->COURSE_ID, 'REG_SEMESTER' => $batchinfo->SEMESTER_NAME, 'OFFERED_COURSE_LIST_ID' => $temp
                ])->first();
                if ($exist == null){
                    DB::table('registered_list')->insert([
                        'REG_NO' => $reg_no, 'COURSE_ID' => $courseId->COURSE_ID, 'REG_SEMESTER' => $batchinfo->SEMESTER_NAME, 'OFFERED_COURSE_LIST_ID' => $temp
                    ]);
                }
            }


            $dataCheck=DB::table('registration_process')->where('REG_NO',$reg_no)->where('SEMESTER_NAME',$semesterNO)->first();

            if(sizeof($dataCheck)>0){
                $totalCredits=$dataCheck->TOTAL_CREDIT;
                DB::table('registration_process')->where('REG_NO',$reg_no)->update([
                    'TOTAL_CREDIT'=> $totalCredits+$majorCredit+$minorCredit+$dropAdCredit, 'EXAM_NAME'=>$examName
                ]);
                Session::put('isRegisteredUser','true');
                Session::put('registered',true);
            }
            else {

               DB::table('registration_process')->insert([
                    'REG_NO'=>$reg_no, 'EXAM_YEAR'=>$examYear, 'NAME'=>$studentName,'REQUEST'=>'0', 'TOTAL_CREDIT'=>($majorCredit+$minorCredit+$dropAdCredit),
                   'SEMESTER_NAME'=>$semesterNO,'SYLLABUS_YEAR'=>$syllabusYear,'EXAM_NAME'=>$examName
                ]);
                    Session::put('isRegisteredUser','true');
                    Session::put('registered',true);
            }

            return view('admin.notificationUser1')->with('message','true');

           /* return view('admin.showPrintableform',array('studentName'=>$studentName,'fatherName'=>$fatherName,'motherName'=>$motherName,'c_session'=>$c_session
                         ,'examYear'=>$examYear, 'year'=>$year, 'semesterNO'=>$semesterNO,'reg_no'=>$reg_no,'examName'=>$examName, 'majorCredit'=>$majorCredit
                        ,  'minorCredit'=>$minorCredit ,'dropAdCredit'=>$dropAdCredit,'majorList'=>$majorList,'minorList'=>$minorList,'dropAdList'=>$dropAdList
                ));*/

        }

    }
    public function loadPage(){
        $check=Session::get('success');
        $role=Session::get('role');
        $isRegistered=Session::get('isRegistered');

        $valid=Session::get('isRegisteredUser');

        if($check!=null && $role=='student'&& $isRegistered==null && $valid=='true') {


            $userInfo = DB::table('profile')->where('USER_ID', '=', $check)->first();
            $user = DB::table('user')->select('BATCH_ID')->where('USER_ID', '=', $check)->get();
            $batchId=null;
            foreach ($user as $usr){
                $batchId=$usr->BATCH_ID;
            }

            $batchinfo = DB::table('batch_info')->where('BATCH_ID', '=', $batchId)->first();


            $processInfo = DB::table('registration_process')
                ->where('REG_NO', $userInfo->REGISTRATION_NO)->where('SEMESTER_NAME', $batchinfo->SEMESTER_NAME)
                ->where('REQUEST', 0)->first();

            if (sizeof($processInfo) != null) {

                $registered_list = DB::table('registered_list')->select('COURSE_ID')
                    ->where('REG_NO', $userInfo->REGISTRATION_NO)->where('REG_SEMESTER', $batchinfo->SEMESTER_NAME)->get();

                $registeredCourseList = array();
                foreach ($registered_list as $reg) {
                    $CourseData = DB::table('courses')
                        ->where('COURSE_ID', $reg->COURSE_ID)->first();
                    array_push($registeredCourseList, $CourseData);
                }
                $deptName=DB::table('department')->select('DEPT_NAME_SHORT')->where('DEPT_CODE',$userInfo->DEPT_CODE)->get();

                $batchInfo=json_decode(json_encode($batchinfo), True);
                $deptNameShort=$deptName;



                return view('admin.showPrintableform',
                        compact('deptNameShort','batchInfo','userInfo','processInfo','registeredCourseList'));

            }
            else{
                return view('admin.404Error');
            }

        }
        else{
            return view('admin.404Error');
        }
    }


}