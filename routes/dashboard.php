<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Dashboard\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('dashboard')->middleware(['auth','admin'])->name('dashboard.')->group(function (){

    Route::get('index', 'DashboardController@index')->name('index');

    // setting routes
    Route::resource('setting', 'SettingController')->except(['show']);

    // service routes
    Route::resource('service', 'ServiceController')->except(['show']);

    // slider routes
    Route::resource('slider', 'SliderController')->except(['show']);

    // chose slider routes
    Route::resource('choseSlider', 'ChooseSliderController')->except(['show']);

    // chose slider routes
    Route::resource('footer', 'FooterController')->except(['show']);

    // about setting routes
    Route::resource('aboutsetting', 'AboutsettingController')->except(['show']);

    // chose routes
    Route::resource('chose', 'ChoseController')->except(['show']);

    // video routes
    Route::resource('video', 'VideoController')->except(['show']);

    // homespecialist routes
    Route::resource('homespecialist', 'HomespecialistController')->except(['show']);

    // counter routes
    Route::resource('counter', 'CounterController')->except(['show']);

    // email setting routes
    Route::resource('emailSetting', 'EmailSettingController')->except(['show']);


    //=====================About==========================================

    // aboutsectionone routes
    Route::resource('aboutsectionone', 'AboutsectiononeController')->except(['show']);

    // aboutsectionthree routes
    Route::resource('aboutsectionthree', 'AboutsectionthreeController')->except(['show']);


    //=====================services==========================================

    // servicesone routes
    Route::resource('servicesone', 'ServicesoneController')->except(['show']);

    // sevicestwo routes
    Route::resource('sevicestwo', 'ServicestwoController')->except(['show']);

    // sevicesthree routes
    Route::resource('sevicesthree', 'ServicesthreeController')->except(['show']);

    //=====================Doctor==========================================

    // doctor routes
    Route::resource('doctor', 'DoctorController')->except(['show']);


    //=====================gallery==========================================

    // gallery routes
    Route::resource('gallery', 'GalleryController')->except(['show']);

    //=====================Nationality==========================================

    // Nationality routes
    Route::resource('nationality', 'NationalityController')->except(['show']);

    //=====================specialization==========================================

    // specialization routes
    Route::resource('specialization', 'SpecializationController')->except(['show']);

    //=====================addmission==========================================

    // addmission routes
    // Route::resource('addmission', 'AdmissionController')->except(['show']);

    Route::get('/addmission', 'AdmissionController@index')->name('addmission.index');
    Route::get('/addmission/show/{id}', 'AdmissionController@show')->name('addmission.show');
    Route::get('/addmission/{id}', 'AdmissionController@subscription')->name('addmission.subscription');
    Route::delete('/addmission/{id}', 'AdmissionController@destroy')->name('addmission.destroy');

    //////////////////////////// step one

    Route::get('/addmission/interViewOne/{id}', 'AdmissionController@interViewOne')->name('addmission.interone');
    Route::get('/getaddmissionStepOne', 'AdmissionController@getaddmissionStepOne')->name('addmission.getaddmissionStepOne');
    Route::put('/addmissionStepOne/{id}', 'AdmissionController@addmissionStepOne')->name('addmission.addmissionStepOne');

    //////////////////////// step two

    Route::get('/addmission/interViewTwo/{id}', 'AdmissionController@interViewTwo')->name('addmission.intertwo');
    Route::get('/getaddmissionStepTwo', 'AdmissionController@getaddmissionStepTwo')->name('addmission.getaddmissionStepTwo');
    Route::put('/addmissionStepTwo/{id}', 'AdmissionController@addmissionStepTwo')->name('addmission.addmissionStepTwo');

    /// change enter view one date

    Route::get('/addmission/changinterviewone/{id}', 'AdmissionController@changeViewOne')->name('addmission.changinterviewone');
    Route::put('/changeStepOne/{id}', 'AdmissionController@changeStepOne')->name('addmission.changeStepOne');



    /////////////////////////// step three

    Route::get('/getaddmissionStepThree', 'AdmissionController@getaddmissionStepThree')->name('addmission.getaddmissionStepThree');
    Route::get('/addmissionStepThree/{id}', 'AdmissionController@addmissionStepThree')->name('addmission.addmissionStepThree');

    /// change enter view two date

    Route::get('/addmission/changinterviewtwo/{id}', 'AdmissionController@changeViewTwo')->name('addmission.changinterviewtwo');
    Route::put('/changeStepTwo/{id}', 'AdmissionController@changeStepTwo')->name('addmission.changeStepTwo');


    //////////////////////////////////// to exame

    Route::get('/addmission/student_To_Exame/{id}', 'AdmissionController@toExam')->name('addmission.toexam');
    Route::get('/addmissionToExam/{id}', 'AdmissionController@addmissionToExam')->name('addmission.addmissionToExam');
    Route::put('/ExamDate/{id}', 'AdmissionController@ExamDate')->name('addmission.ExamDate');

    /// change exam date

    Route::get('/addmission/ChangeExamDate/{id}', 'AdmissionController@toChangeExamDate')->name('addmission.toChangeExamDate');
    Route::put('/ChangeExamDate/{id}', 'AdmissionController@ChangeExamDate')->name('addmission.ChangeExamDate');


    //////////////////// waite exame
    Route::get('/getaddmissionWaitingExame', 'AdmissionController@getaddmissionWaitingExam')->name('addmission.getaddmissionWaitingExam');

   /////////////////////////////// fail

   Route::get('/getaddmissionFail', 'AdmissionController@getaddmissionFail')->name('addmission.getaddmissionFail');
   Route::get('/addmissionFail/{id}', 'AdmissionController@addmissionFail')->name('addmission.addmissionFail');

   ////////////////////////// success exam

   Route::get('/success', 'AdmissionController@getaddmissionSuccessExam')->name('addmission.getaddmissionSuccessExam');
   Route::get('/addmissionSuccessExam/{id}', 'AdmissionController@addmissionSuccessExam')->name('addmission.addmissionSuccessExam');
   Route::get('/subscriptionSuccess/{id}', 'AdmissionController@subscriptionSuccess')->name('addmission.subscriptionSuccess');

   ////////////////// accepted
   Route::get('/accepted', 'AdmissionController@accepted')->name('addmission.accepted');
    ////////////////////////// fail exam

    Route::get('/fail', 'AdmissionController@getaddmissionFailExam')->name('addmission.getaddmissionFailExam');
    Route::get('/subscriptionFail/{id}', 'AdmissionController@subscriptionFail')->name('addmission.subscriptionFail');




    //=====================comment==========================================

    // home Comment routes
    Route::get('/homeComment', 'CommentController@homeComment')->name('homeComment');
    // contact Comment routes
    Route::get('/contactComment', 'CommentController@contactComment')->name('contactComment');


    //================== Question ======================================
    Route::get('/question/idex', 'QuestionController@index')->name('question.index');
    Route::get('/question/show/{id}', 'QuestionController@show')->name('question.show');
    Route::get('/question/create', 'QuestionController@create')->name('question.create');
    Route::post('/question/store', 'QuestionController@store')->name('question.store');
    Route::get('/question/edite/{id}', 'QuestionController@edit')->name('question.edit');
    Route::put('/question/update/{id}', 'QuestionController@update')->name('question.update');
    Route::delete('/question/destroy/{id}', 'QuestionController@destroy')->name('question.destroy');









    // service routes
    Route::resource('word', 'WordController')->except(['show']);

    // service routes
    Route::resource('project', 'ProjectController')->except(['show']);

    // Clientsay routes
    Route::resource('clientsay', 'ClientsayController')->except(['show']);

    // residential routes
    Route::resource('residential', 'ResidentialController')->except(['show']);

    // Company footer routes
    Route::resource('company', 'CompanyController')->except(['show']);


    // about section routes
    Route::resource('aboutsec', 'AboutsecController')->except(['show']);

    // about count routes
    Route::resource('aboutcount', 'AboutcountController')->except(['show']);

    // about Agent routes
    Route::resource('agent', 'AgentController')->except(['show']);

    // about more info routes
    Route::resource('moreinfo', 'MoreinfoController')->except(['show']);

    // event routes
    Route::resource('event', 'EventController')->except(['show']);

    // Educational routes
    Route::resource('educational', 'EducationalController')->except(['show']);

    // Resort routes
    Route::resource('resort', 'ResortController')->except(['show']);

    // contact routes
    Route::resource('contact', 'ContactController')->except(['show']);

    // contact routes
    Route::resource('partenar', 'EventController')->except(['partenar']);



    Route::get('/media/edit/{media}', 'MediaController@edit');
    Route::match(['put', 'patch'],'/media/update/{media}', 'MediaController@update');
    Route::delete('/media/delete/{media}', 'MediaController@destroy');

    // media routes
    Route::resource('media', 'MediaController')->except(['show']);

    // Featured routes
    Route::resource('featured', 'FeaturedController')->except(['show']);

    // Masseges routes
    Route::get('/ContactMassege', 'MassegeController@ContactMassege')->name('ContactMassege');
    Route::get('/EventMassege', 'MassegeController@EventMassege')->name('EventMassege');
    Route::get('/ProjectMassege', 'MassegeController@ProjectMassege')->name('ProjectMassege');
    Route::get('/ResidnetialMassege', 'MassegeController@ResidnetialMassege')->name('ResidnetialMassege');
    Route::get('/EducationalMassege', 'MassegeController@EducationalMassege')->name('EducationalMassege');
    Route::get('/ResortMassege', 'MassegeController@ResortMassege')->name('ResortMassege');



});

