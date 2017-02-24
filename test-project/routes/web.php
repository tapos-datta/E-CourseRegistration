<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    $check=session()->get('success');
    echo $check;
    if($check!=null) {
        if ($check >= 0) return redirect()->route('check', ['id' => $check]);
    }
    else {
        return view('user.show');
    }

});



Route::get('/index', function () {
    return \view('user.show');

})->name('home');


Route:: post('/login','LogInController@login');



Route:: post('/createPdf/{id}',['as'=>'createpdf','uses'=>'PdfCreateController@makePdf']);

//Route::get('/download', ['uses' => 'PdfCreateController@makePdf', 'as' => 'download']);




Route::get('/registration',function(){

    return \view('user.registration');

})->name('registration');


Route::get('/loginForm',function(){

    return \view('user.loginForm');

})->name('loginform');


Route::get('/printform',function(){

    return \view('user.printregister');

})->name('print');



Route::get('/profile/{id}',function($id){

    return redirect()->route('check', ['id' => $id]);

})->name('profile');



/*Route::get('/settings',function(){

    if(session()->get('success')!=null){
        return view('admin.setting');
    }
    else
        return view('admin.error');

})->name('user_settings');*/

Route::get('/settings',array('as'=>'user_settings','uses'=>'SettingsController@index'));


Route::get('/user',function(){
    $check=session()->get('success');
    return redirect()->route('check', ['id' => $check]);

})->name('user_home');

Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));

/*Route::get('/logout',function(){

     session()->flush();
     return \view('user.loginForm');

})->name('user_logout');*/

Route::get('/logout', 'Auth\LoginController@logout')->name('user_logout');


Route::get('/user/{id}', ['uses' =>'SessionCheckController@invoke', 'as'=>'check']);

Route::get('/profile', ['uses' =>'profileController@showInfo', 'as'=>'user_profile']);






Route::get('htmltopdfview',array('as'=>'htmltopdfview','uses'=>'ProductController@htmltopdfview'));


Route::post('/add_department',['uses'=>'OperationController@addDepartment']);

Route::post('/add_course',['uses'=>'OperationController@addCourse']);

Route::post('/add_curriculum',['uses'=>'OperationController@addCurriculum']);

Route::get('/show_curriculum/{year}',['as'=>'show.curriculum','uses'=>'ShowCurriculumController@index']);

Route::get('/show_curriculum/',['uses'=>'ShowCurriculumController@_empty']);

Route::get('/show_curriculum/{year}',['as'=>'show.curriculum','uses'=>'ShowCurriculumController@index']);

Route::get('/show_curriculum={year}/department={code}',['as'=>'show.curriculum.dept','uses'=>'ShowCurriculumController@department']);

Route::get('/show_curriculum={year}/department={code}/add={semester}',['as'=>'addCourseToCurriculum','uses'=>'AddCurriculumController@index']);

Route::post('/add_course_curriculum',['uses'=>'OperationController@addCourseList']);

Route::post('/delete_course_from_curriculum',['as'=>'delete_course_curriculum' ,'uses'=>'ShowCurriculumController@deleteCourseFromCurriculum']);

Route::get('/list_of_departments',['as'=>'show.departments' ,'uses'=>'ShowCurriculumController@showDepartments']);

Route::post('/edit_department_info',['uses'=>'showCurriculumController@editDepartments']);

Route::post('/delete_department',['uses'=>'ShowCurriculumController@deleteDepartments']);

Route::post('/edited_info',['uses'=>'OperationController@editDeptInformation']);

Route::get('/add_department_info',['as'=>'add.department' ,'uses'=>'OperationController@addDepartmentInfo']);

Route::get('/add_course_info',['as'=>'add.course' ,'uses'=>'OperationController@addCourseInfo']);

Route::get('/list_of_courses',['as'=>'show.courses' ,'uses'=>'ShowCurriculumController@showCourses']);

Route::post('/edit_course_info',['uses'=>'showCurriculumController@editCourses']);

Route::post('/edited_course_info',['uses'=>'OperationController@editCourseInformation']);

Route::get('/add_offered_courses',[ 'as'=>'add.offered_course','uses'=>'OperationController@addOfferedCourse']);

Route::post('/exam_session_add',['uses'=>'OfferedCourseController@addOfferedCourses']);

Route::get('/exam_session_data/{examId}/{session_month}/year={year}',['as'=>'exam.session_data', 'uses'=>'OfferedCourseController@showExamSessionData']);

Route::get('/notification',['as'=>'user_notification','uses'=>'NotificationController@index']);

Route::get('/courses_registration_',['as'=>'registration.process','uses'=>'NotificationController@applyForRegistration']);

Route::get('/add_major_courses',['as'=>'add.current.MajorCourse','uses'=>'NotificationController@majorCourseAdd']);

Route::get('/add_non_major_courses',['as'=>'add.current.minorCourse','uses'=>'NotificationController@minorCourseAdd']);

Route::get('/add_drop/advance_courses',['as'=>'add.current.dropAdvanceCourse','uses'=>'NotificationController@dropAdvncCourseAdd']);

Route::post('/course_add_to_form',['uses'=>'NotificationController@courseAddToFrom']);

Route::post('/course_add_to_form_1',['uses'=>'NotificationController@minorCourseAddToFrom']);

Route::post('/course_add_to_form_2',['uses'=>'NotificationController@dropAdvanceCourseAddToFrom']);

Route::get('/course_add_to_form',function(){

    return redirect()->route('registration.process');

});

Route::get('/course_add_to_form_1',function(){

    return redirect()->route('registration.process');

});

Route::get('/course_add_to_form_2',function(){

    return redirect()->route('registration.process');

});

Route::post('/delete_offered_courses',['as'=>'delete.exam.schedule','uses'=>'OfferedCourseController@deleteSchedule']);

Route::get('/new_schedule',['as'=>'create.new.schedule','uses'=>'OfferedCourseController@addNewSchedule']);

Route::post('/add_new_schedule_to_list',['uses'=>'OfferedCourseController@addNewScheduleToList']);

Route::post('/submit_registration_form',['uses'=>'NotificationController@completeRegistration']);

Route::get('/admin_profile_',['as'=>'admin_profile','uses'=>'AdminUserController@index']);

Route::get('/add_a_new_user',['as'=>'add.new.user','uses'=>'AdminUserController@addUser']);

Route::post('/adding_new_user',['as'=>'add.new_person.data','uses'=>'AdminUserController@addUserData']);

Route::post('/add_batch_info',['uses'=>'ShowCurriculumController@addBatchInfo']);

Route::get('/view_batch_list',['as'=>'show.batches','uses'=>'ShowCurriculumController@showBatches']);

Route::get('/Add_new_batch',['as'=>'add.batch','uses'=>'ShowCurriculumController@AddBatch']);

Route::post('/edit_batch_info',['uses'=>'ShowCurriculumController@editBatch']);

Route::get('/edit_user_profile/{userId}',['as'=>'edit.user.profile','uses'=>'UserController@editProfile']);



