<?php

/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/2/2017
 * Time: 4:21 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;

class ShowCurriculumController extends Controller
{
    //check session for valid access
   public function index($year){

       $data=DB::table('syllabus')->where('SYLLABUS_YEAR',$year)->first();

       if(sizeof($data)==1){

           $departmentCodeList= DB::table('department')->select('DEPT_CODE', 'DEPT_NAME')->get();

           Session::put('showCurriculumYear',$year);
           Session::put('departmentList',$departmentCodeList);

           return view('admin.showCurriculumDepartment');
       }

       return $year;

  }

  public function _empty(){
      return "ERROR";
  }

  public function department($year,$code){
      //valid check baki roiche

      $data=DB::table('syllabus')->where('SYLLABUS_YEAR',$year)->first();

      $courseID=DB::table('course_list')->select('COURSE_ID')->where('SYLLABUS_YEAR',$year)->where('DEPT_CODE',$code)->orderBy('SEMESTER_NAME','asc')->get();
      $courseList=array();
      foreach($courseID as $id){
          $courseDetails=DB::table('courses')->where('COURSE_ID',$id->COURSE_ID)->first();

          $courseList[]=$courseDetails;
      }

      Session::put('viewDeptCode',$code);
      Session::put('courseList',$courseList);
      return view('admin.coursesInCurriculum');
  }
  public function deleteCourseFromCurriculum(Request $request){
      $id=$request->input('course_id');
      $curriculumYear=$request->input('curriculumYear');
      $deptCode=$request->input('deptCode');

      DB::table('course_list')->where('COURSE_ID','=',$id )->delete();

      return redirect()->route('show.curriculum.dept', ['year' => $curriculumYear ,'code'=>$deptCode]);
  }

  public function showDepartments(){

      //jodi admin rule hoy tobe seta dekha jabe

       $dept= DB::table('department')->get();
      Session::put('ListsOfDepartment',$dept);

      return view('admin.viewDepartment');
  }
    public function showCourses(){

        //jodi admin rule hoy tobe seta dekha jabe

        $courses= DB::table('courses')->get();
        Session::put('ListsOfCourse',$courses);

        return view('admin.viewCourseLists');
    }

  public function editDepartments(Request $request){
         $id= $request->input('deptCode');
      $deptdetails=DB::table('department')->where('DEPT_CODE','=',$id)->first();

      if(sizeof($deptdetails)==1){
          Session::put('deptDetails',$deptdetails);
          return view('admin.editDepartment');
      }
      else {
          return view('admin.404Error');
      }

  }

  public function deleteDepartments(Request $request){
      //jodi admin rule hoy tobe seta dekha jabe

      $dept=$request->input('deptCode');
      DB::table('department')->where('DEPT_CODE','=',$dept)->delete();
      return redirect()->route('show.departments');
      return $dept;
  }

    public function editCourses(Request $request){
        $id= $request->input('courseCode');
        $coursedetails=DB::table('courses')->where('COURSE_ID','=',$id)->first();

        if(sizeof($coursedetails)==1){
            Session::put('courseDetails',$coursedetails);
            return view('admin.editCourse');
        }
        else {
            return view('admin.404Error');
        }

    }




}