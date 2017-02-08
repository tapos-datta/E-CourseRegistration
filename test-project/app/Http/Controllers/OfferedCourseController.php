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
        $examYear=$request->input('examYear');
        $examSession=$request->input('examSession');
        $semesterName=$request->input('semesterName');
        $curriculumYear=$request->input('curriculumYear');
        $departmentCode=$request->input('departmentCode');

        $tempData=DB::table('course_list')->where('SYLLABUS_YEAR','=',$curriculumYear)->where('SEMESTER_NAME','=',$semesterName)->where('DEPT_CODE','=',$departmentCode)->get();

        if(sizeof($tempData)>=1){

            DB::table('offered_courses')->insert([
               'EXAM_YEAR'=>$examYear, 'SESSION_MONTH'=>$examSession,'DEPT_CODE'=>$departmentCode, 'SEMESTER_NAME'=>$semesterName, 'SYLLABUS_YEAR'=>$curriculumYear
            ]);

            Session::put('SetSettings', 4);
        }
        else{
            Session::put('SetSettings', -1);
        }

        return redirect()->route('user_settings');


    }

    public function showExamSessionData($session_month,$year){
        $data=DB::table('offered_courses')->where('EXAM_YEAR','=',$year)->where('SESSION_MONTH','=',$session_month)->get();

        if(sizeof($data)>=1){

            $dept=DB::table('department')->select('DEPT_CODE','DEPT_NAME_SHORT')->get();
            Session::put('offeredDataForExam',$data);
            Session::put('offeredExamYear',$year);
            Session::put('offeredSessionMonth',$session_month);
            Session::put('ListOfDepartments',$dept);
            return view('admin.showExamSessionData');
        }
        else
        {
            return view('admin.404Error');
        }
    }

}