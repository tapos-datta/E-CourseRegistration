<?php

/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 2/2/2017
 * Time: 8:21 PM
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;

class AddCurriculumController extends Controller
{

    public function index($year,$code,$semester){
        $role=Session::get('role');

        if($role=='admin' ){
            $data2=DB::table('syllabus')->where('SYLLABUS_YEAR',$year)->first();
            $data1=DB::table('department')->where('DEPT_CODE',$code)->first();
            if(sizeof($data1)>=1 && sizeof($data2)>=1 && $semester>=1 && $semester<=8) {

                $tempDataFromCourselistSemester = DB::table('courses')
                    ->where('DEPT_CODE', $code)->where('SEMESTER_NAME', $semester)->get();
                $previouslyAdded = DB::table('course_list')->select('COURSE_ID')->where('DEPT_CODE', $code)->where('SEMESTER_NAME', $semester)->get();
                $item = array();

                foreach ($tempDataFromCourselistSemester as $temp) {
                    $flag = 0;
                    foreach ($previouslyAdded as $previous) {
                        if ($temp->COURSE_ID == $previous->COURSE_ID) {
                            $flag = 1;
                            break;
                        }
                    }
                    if ($flag == 0) {
                        $item[] = $temp;
                    }
                }

    //            foreach($item as $i)
    //            {
    //                echo $i->COURSE_ID." ".$i->COURSE_CODE;
    //            }

                Session::put('viewSemester', $semester);
                Session::put('courseListOfSemester', $item);
                return view('admin.addCourses');
            }

        }
        else{
            return view('admin.404Error');
        }
    }

    public function newCurriculum(){

        $role=Session::get('role');
        if($role=='admin' ){
            return view('admin.newCurriculum');
        }
        else{
            return view('admin.404Error');
        }
    }

    public function editCurriculum($year){

        $role=Session::get('role');
        if($role=='admin' || $role=='head' ){

            $curriculumInfo=DB::table('syllabus')->where('SYLLABUS_YEAR','=',$year)->first();
            if(sizeof($curriculumInfo)>0){

                return view('admin.editCurriculum',compact('curriculumInfo'));
            }
            else{
                return view('admin.404Error');
            }

        }
        else{
            return view('admin.404Error');
        }
    }

    public function updateCurriculum(Request $request){
        $role=Session::get('role');

        $curriculumYear=$request->input('curriculumYear');
        $maxCredit=$request->input('maxCredit');
        $minCredit=$request->input('minCredit');

        if($role=='admin' || $role=='head' ){
            DB::table('syllabus')->where('SYLLABUS_YEAR','=',$curriculumYear)
                ->update([
                  'MAX_CREDIT'=>$maxCredit, 'MIN_CREDIT'=>$minCredit
            ]);
            return view('admin.setting')->with('SetSettings',1);
        }
        else{
            return view('admin.404Error');
        }
    }

}