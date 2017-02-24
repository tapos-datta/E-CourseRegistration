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


class OfferedCourseController extends Controller
{

    public function addOfferedCourses(Request $request){
        //rule check korte hobe
        $examId=$request->input('examId');
        $semesterName=$request->input('semesterName');
        $curriculumYear=$request->input('curriculumYear');
        $departmentCode=$request->input('departmentCode');

        $tempData=DB::table('course_list')->where('SYLLABUS_YEAR','=',$curriculumYear)->where('SEMESTER_NAME','=',$semesterName)->where('DEPT_CODE','=',$departmentCode)->get();
        $ListOfOfferedCourses=array();
        if(sizeof($tempData)>=1){

            foreach ($tempData as $temp){
                $courseDetails=DB::table('courses')->select('COURSE_CODE','COURSE_CREDIT','TYPE','SEMESTER_NAME')->where('COURSE_ID','=',$temp->COURSE_ID)->first();
                DB::table('offered_courses')->insert([
                    'EXAM_ID'=>$examId,'COURSE_ID'=>$temp->COURSE_ID,'SEMESTER_NAME'=>$semesterName
                ]);
                $ListOfOfferedCourses[]=$courseDetails;
            }

            Session::put('listOfOfferedCourses',$ListOfOfferedCourses);


        }
        $session_month=Session::get('offeredSessionMonth');
        $year=Session::get('offeredExamYear');

        return redirect()->route('exam.session_data',array('examId'=>$examId,'session_month'=>$session_month,'year'=>$year));
    }

    public function showExamSessionData($examId,$session_month,$year){

        $data=DB::table('schedule_of_exam')->where('EXAM_ID',$examId)->first();

        if(sizeof($data)>=1){

            $dept=DB::table('department')->select('DEPT_CODE','DEPT_NAME_SHORT')->where('DEPT_CODE','=',$data->DEPT_CODE)->first();

            Session::put('offeredDataForExam',$data);
            Session::put('offeredExamYear',$year);
            Session::put('offeredSessionMonth',$session_month);
            Session::put('nameOfDepartment',$dept);
            Session::put('examYearId',$examId);
            return view('admin.showExamSessionData');
        }
        else
        {
            return view('admin.404Error');
        }
    }

    public function deleteSchedule(Request $request){
//        $examYear=$request->input('examYear');
//        $session_month=$request->input('session_month');
//        DB::table('offered_courses')->where('EXAM_YEAR','=',$examYear)->where('SESSION_MONTH','=',$session_month)->delete();

//        return redirect()->route('user_settings');
            echo "hello";

    }

    public function addNewSchedule(){
        return view('admin.offeredNew');
    }

    public function addNewScheduleToList(Request $request){
        $examYear=$request->input('examYear');
        $examSession=$request->input('examSession');
        $departmentCode=$request->input('departmentCode');
        $tempData=DB::table('schedule_of_exam')->where('DEPT_CODE','=',$departmentCode)->where('EXAM_YEAR','=',$examYear)->where('SESSION_MONTH','=',$examSession)->first();

        if(sizeof($tempData)<1){

            DB::table('schedule_of_exam')->insert([
                'EXAM_YEAR'=>$examYear, 'SESSION_MONTH'=>$examSession,'DEPT_CODE'=>$departmentCode
            ]);

            Session::put('SetSettings', 4);
        }
        else{
            Session::put('SetSettings', -1);
        }

        return redirect()->route('user_settings');
    }

}