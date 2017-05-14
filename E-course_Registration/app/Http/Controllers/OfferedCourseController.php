<?php

/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/7/2017
 * Time: 9:26 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;
use View;


class OfferedCourseController extends Controller
{

    public function addOfferedCourses(Request $request){
        //rule check korte hobe
        $role=Session::get('role');
        if($role=='admin') {
            $semesterName = $request->input('semesterName');
            $curriculumYear = $request->input('curriculumYear');
            $departmentCode = $request->input('departmentCode');
            $studentSession = $request->input('studentSession');
            $session_month =$request->input('sessionMonth');
            $examYear =$request->input('examYear');

            $examId=DB::table('schedule_of_exam')->select('EXAM_ID')->where('EXAM_YEAR',$examYear)->where('SESSION_MONTH',$session_month)->where('DEPT_CODE',$departmentCode)->first();

            $offeredID=DB::table('offered_courses')->select('OFFERED_ID')->where([
                'SEMESTER_NAME'=>$semesterName ,'SESSION'=>$studentSession,'SYLLABUS_YEAR'=>$curriculumYear,'EXAM_ID'=>$examId->EXAM_ID
            ])->first();

            if($offeredID==null) {
                DB::table('offered_courses')->insert([
                    'SEMESTER_NAME' => $semesterName, 'SESSION' => $studentSession, 'SYLLABUS_YEAR' => $curriculumYear, 'EXAM_ID' => $examId->EXAM_ID
                ]);
            }

            $offeredID=DB::table('offered_courses')->select('OFFERED_ID')->where([
                'SEMESTER_NAME'=>$semesterName ,'SESSION'=>$studentSession,'SYLLABUS_YEAR'=>$curriculumYear,'EXAM_ID'=>$examId->EXAM_ID
            ])->first();


            $tempData = DB::table('course_list')->where('SYLLABUS_YEAR', '=', $curriculumYear)->where('SEMESTER_NAME', '=', $semesterName)->where('DEPT_CODE', '=', $departmentCode)->get();
            $ListOfOfferedCourses = array();

            if (sizeof($tempData) >= 1) {

                foreach ($tempData as $temp) {
                    $courseDetails = DB::table('courses')->select('COURSE_CODE', 'COURSE_CREDIT', 'TYPE', 'CATEGORY')->where('COURSE_ID', '=', $temp->COURSE_ID)->first();
                    DB::table('offered_course_list')->insert([
                        'OFFERED_ID'=>$offeredID->OFFERED_ID, 'COURSE_CODE'=>$courseDetails->COURSE_CODE, 'COURSE_CREDIT'=>$courseDetails->COURSE_CREDIT,
                        'TYPE'=>$courseDetails->TYPE, 'CATEGORY'=>$courseDetails->CATEGORY
                    ]);

                }

               // Session::put('listOfOfferedCourses', $ListOfOfferedCourses);

            }


            return redirect()->route('exam.session_data', array('session_month' => $session_month, 'year' => $examYear));
        }
        else{
            return view('admin.404Error');
        }
    }

    public function showExamSessionData($session_month,$year){

        $role=Session::get('role');


        if( $role=='admin'){
            $userInfo=Session::get('userInformation');

            $examID=DB::table('schedule_of_exam')->select('EXAM_ID')->where('EXAM_YEAR',$year)->where('SESSION_MONTH',$session_month)->where('DEPT_CODE',$userInfo->DEPT_CODE)->first();

            if($examID!=null) {
                    $data = DB::table('offered_courses')->where('EXAM_ID',$examID->EXAM_ID)->get();

                    $dept = DB::table('department')->select('DEPT_NAME_SHORT')->where('DEPT_CODE', '=', $userInfo->DEPT_CODE)->first();

                    Session::put('offeredDataForExam', $data);
                    Session::put('offeredExamYear', $year);
                    Session::put('offeredSessoinMonth',$session_month);
                    Session::put('nameOfDepartment', $dept);

                    return view('admin.showExamSessionData');
                }
                else{
                    return view('admin.404Error');
                }
        }
        else
        {
            return view('admin.404Error');
        }
    }

    public function deleteSchedule(Request $request){
        $examYear=$request->input('examYear');
        $session_month=$request->input('session_month');

        $examId=DB::table('schedule_of_exam')->where('EXAM_YEAR','=',$examYear)->where('SESSION_MONTH',$session_month)->first();

        DB::table('offered_courses')->where('EXAM_ID','=',$examId->EXAM_ID)->delete();
        DB::table('schedule_of_exam')->where('EXAM_ID','=',$examId->EXAM_ID)->delete();

        return redirect()->route('user_settings');
            //echo "hello";

    }

    public function addNewSchedule(){
        return view('admin.offeredNew');
    }

    public function addNewScheduleToList(Request $request){

        $examYear=$request->input('examYear');
        $examSession=$request->input('examSession');
        $departmentCode=$request->input('departmentCode');
        $deadLine=$request->input('date');

            DB::table('schedule_of_exam')->insert([
                'EXAM_YEAR'=>$examYear, 'SESSION_MONTH'=>$examSession,'DEPT_CODE'=>$departmentCode,'DEAD_LINE'=>$deadLine,'STATUS'=>'0'
            ]);


        return redirect()->route('user_settings');
    }

    public function viewListofOfferedCourses($offeredID){

        $role=Session::get('role');

        if($role=='admin'){
            $check=DB::table('offered_courses')->where('OFFERED_ID',$offeredID)->first();

            if($check!=null){

                $viewCoursesList=DB::table('offered_course_list')->where('OFFERED_ID',$offeredID)->get();

                return View::make('admin.offeredCourseList')
                                ->with(compact('viewCoursesList'));

            }
            else{
                return view('admin.404Error');
            }

        }
        else {

            return view('admin.404Error');
        }
    }

    public function DeleteACourse(Request $request ){
        $offeredListId=$request->input('listId');
        $role=Session::get('role');

        if($role=='admin'){
            $check=DB::table('offered_course_list')->where('OFFERED_COURSE_LIST_ID',$offeredListId)->first();

            if($check!=null){

                $offeredID=$check->OFFERED_ID;
                DB::table('offered_course_list')->where('OFFERED_COURSE_LIST_ID',$offeredListId)->delete();

                return redirect()->route('view_offeredCourses',array('offeredID'=>$offeredID));

            }
            else{
                return view('admin.404Error');
            }

        }
        else {

            return view('admin.404Error');
        }
    }
    public function editDeadLine(){

    }

    public function DeleteASemester(Request $request){

        $offeredId=$request->input('listId');
        $role=Session::get('role');
        if($role=='admin'){

            DB::table('offered_course_list')->where('OFFERED_ID',$offeredId)->delete();

            DB::table('offered_courses')->where('OFFERED_ID',$offeredId)->delete();

            $year=Session::get('offeredExamYear');
            $sessionMonth=Session::get('offeredSessoinMonth');

            return redirect()
                    ->route('exam.session_data',array('session_month'=>$sessionMonth,'year'=>$year));
        }
        else {

            return view('admin.404Error');
        }

    }

    public function editSchedule($dept,$session_month,$year){
        $role=Session::get('role');
        if($role=='admin' || $role=='head'){
            $editableData=DB::table('schedule_of_exam')
                         ->where('DEPT_CODE','=',$dept)
                         ->where('EXAM_YEAR','=',$year)
                         ->where('SESSION_MONTH','=',$session_month)
                        ->first();

            if(sizeof($editableData)>0){
                return View::make('admin.editOfferedSchedule')
                    ->with(compact('editableData'));
            }
            else{
                return view('admin.404Error');
            }

        }
        else{
            return view('admin.404Error');
        }

    }

    public function editedScheduleToList(Request $request){
        $examYear=$request->input('examYear');
        $examSession=$request->input('examSession');
        $departmentCode=$request->input('departmentCode');
        $deadLine=$request->input('date');

        DB::table('schedule_of_exam')->where('EXAM_YEAR','=',$examYear)
            ->where('SESSION_MONTH','=',$examSession)
            ->where('DEPT_CODE','=',$departmentCode)
            ->update([
                'DEAD_LINE'=>$deadLine,'STATUS'=>'0'
        ]);


        return redirect()->route('user_settings');
    }


}