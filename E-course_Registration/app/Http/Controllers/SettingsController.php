<?php

/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 1/30/2017
 * Time: 1:24 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Session;


class SettingsController extends Controller
{
    public function index()
    {
        if(session()->get('success')!=null){

            $departmentCodeList= DB::table('department')->select('DEPT_CODE', 'DEPT_NAME_SHORT')->get();

            $courseLists=DB::table('courses')->orderBy('DEPT_CODE', 'asc')->
            orderBy('COURSE_LEVEL','asc')->orderBy('SEMESTER_NAME','asc')->get();
            $curriculumYear=DB::table('syllabus')->select('SYLLABUS_YEAR')->get();
            $offeredList=DB::table('schedule_of_exam')->orderby('EXAM_YEAR','asc')->orderby('SESSION_MONTH','asc')->get();


            Session::put('departmentCodeList', $departmentCodeList);
            Session::put('courseLists',$courseLists);
            Session::put('curriculumYearList',$curriculumYear);
            Session::put('offeredExamList',$offeredList);

            return view('admin.setting');
        }
        else
            return view('admin.error');

    }

}