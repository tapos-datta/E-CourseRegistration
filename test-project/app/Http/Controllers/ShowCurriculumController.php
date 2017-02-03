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
      $data=DB::table('syllabus')->where('SYLLABUS_YEAR',$year)->first();
      $courseList=DB::table('course_list')-> where('SYLLABUS_YEAR',$year)->where('DEPT_CODE',$code)->orderBy('SEMESTER_NAME','asc')->first();
      Session::put('viewDeptCode',$code);
      Session::put('courseList',$courseList);
      return view('admin.coursesInCurriculum');
  }
}