<?php

namespace App\Http\Controllers;
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

class LogInController extends Controller
{

    public function login()
      {
          echo "i am a boy.";
          //getting all post data
//          $data= DB::table('user')->get();
//          return $data;

          $email=Input::get('email');
          $password=Input::get('password');

          $data=DB::table('user')-> where('email',$email)->where('password',$password)->first();


        if(sizeof($data)==1){

            Session::put('success', $data->USER_ID);

            return redirect()->route('check', ['id' => $data->USER_ID]);
        }
        else{
            echo 'not successfully login.';
        }
          //applying validation rules

         /* $rules = array(
              'email' => 'require|email',
               'password'=>'require|min:5'
            );
          $validator = Validator::make($data,$rules);

          if($validator->fails()){
              return Redirect::to('/login')->withInput(Input::expect('password')) -> withErrors($validator);
          }
         */
        //  echo $email . " " .$password ;

        //  $users = DB::table('user')->
           //        where([
           //         ['email', '=',$email ],
         //           ['password','=',$password],
       //   ])->get();
       //   $withComma = implode(",", $users);
        //   echo $withComma;
      }

}
