<?php

/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 1/29/2017
 * Time: 5:35 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;


class OperationController extends Controller
{
    public function addDepartment(Request $request){

        $deptCode=$request->input('departmentCode');
        $deptName=$request->input('departmentName');
        $deptNameShort=$request->input('departmentNameShortForm');
        $deptSchocl=$request->input('departmentSchool');
        $deptId=0;
        $deptId = DB::table('department')->insertGetId(
            ['DEPT_CODE' => $deptCode, 'DEPT_NAME' => $deptName, 'DEPT_NAME_SHORT'=> $deptNameShort, 'SCHOOL'=> $deptSchocl]
        );

        if($deptId!=0){
            Session::put('SetSettings', 5);
        }
        else{
            Session::put('SetSettings', -1);
        }
         return redirect()->route('user_settings');

     }

     public function addCourse(Request $request){
         $courseCode=$request->input('courseCode');
         $courseName=$request->input('courseName');
         $courseCredit=$request->input('courseCredit');
         $courseLevel=$request->input('courseLevel');
         $semesterName=$request->input('semesterName');
         $departmentCode=$request->input('departmentCode');

         $deptId=0;
         $deptId = DB::table('courses')->insertGetId(
             ['COURSE_CODE' => $courseCode, 'COURSE_NAME' => $courseName, 'COURSE_CREDIT'=> $courseCredit, 'COURSE_LEVEL'=> $courseLevel
             ,'SEMESTER_NAME'=> $semesterName , 'DEPT_CODE'=>$departmentCode]
         );

         if($deptId!=0){
             Session::put('SetSettings', 6);
         }
         else{
             Session::put('SetSettings', -1);
         }
         return redirect()->route('user_settings');

     }

     public function addCurriculum(Request $request){
         $curriculumYear=$request->input('curriculumYear');
         $maxCredit=$request->input('maxCredit');
         $minCredit=$request->input('minCredit');
         $data=DB::table('syllabus')->where('SYLLABUS_YEAR',$curriculumYear)->first();

         if(sizeof($data)==0){

             DB::table('syllabus')->insert([
                 'SYLLABUS_YEAR'=>$curriculumYear , 'MAX_CREDIT'=>$maxCredit , 'MIN_CREDIT'=> $minCredit
             ]);
             Session::put('SetSettings', 2);
         }
         else{
             Session::put('SetSettings', -1);
         }

         return redirect()->route('user_settings');
     }

}