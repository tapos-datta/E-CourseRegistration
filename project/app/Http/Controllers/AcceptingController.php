<?php

/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 3/7/2017
 * Time: 10:32 AM
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Input;

use App\User;
use App\UserRegisters;
use App\UserProfiles;
use Validator;
use View;
use Auth;
use App\Http\Controllers\Redirect;
use Illuminate\Routing\Redirector;
use Session;
use Hash;
use DB;

class AcceptingController extends Controller
{
    public function index(Request $request)
    {
        $role = Session::get('role');
        if ($role == 'admin') {
            $semester = $request->input('semesterName');
            $checked = $request->input('check_list');
            if ($checked != null && $checked!=null && $semester!=null) {
                foreach ($checked as $check) {
                    DB::table('registration_process')->where('REG_NO', $check)->update([
                        'REQUEST' => 1
                    ]);
                }

                if ($semester < 8) {

                    if ($semester + 1 <= 2) {
                        DB::table('batch_info')->where('SEMESTER_NAME', $semester)->update(['SEMESTER_NAME' => $semester + 1, 'LEVEL' => 1]);
                    }

                    if ($semester + 1 > 2 and $semester + 1 < 5) {
                        DB::table('batch_info')->where('SEMESTER_NAME', $semester)->update(['SEMESTER_NAME' => $semester + 1, 'LEVEL' => 2]);
                    }
                    if ($semester + 1 > 4 and $semester + 1 < 7) {
                        DB::table('batch_info')->where('SEMESTER_NAME', $semester)->update(['SEMESTER_NAME' => $semester + 1, 'LEVEL' => 3]);
                    }
                    if ($semester + 1 > 6 and $semester + 1 < 9) {
                        DB::table('batch_info')->where('SEMESTER_NAME', $semester)->update(['SEMESTER_NAME' => $semester + 1, 'LEVEL' => 4]);
                    }
                }

                return redirect()->route('user_notification')->with('message','Regisration process complete for '.$semester.'semester');
            }
            else{
                return redirect()->route('user_notification')->with('message',null);
            }


        }
    }

}