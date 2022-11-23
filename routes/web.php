<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/', 'IndexController@index');

});


Route::middleware('auth')->group(function () {
Route::namespace('App\Http\Controllers')->prefix('/dashboard')->group(function () {
    Route::get('/home', 'DashboardController@home')->name('home');
    Route::get('/logout', 'AuthController@logout')->name('logout');

    //Setting
    Route::prefix('/setting')->group(function () {
        Route::get('/', function () {return view('Dashboard.Auth.setting');})->name('setting');
        Route::get('/edit', 'DashboardController@edit')->name('setting.edit');
        Route::post('/doedit', 'DashboardController@doedit')->name('setting.doedit');

    });

    //About ME
    Route::prefix('/about')->group(function () {
        Route::get('/', 'AboutController@index')->name('about');
        Route::get('/edit/{id}', 'AboutController@edit')->name('about.edit');
        Route::post('/doedit', 'AboutController@doedit')->name('about.doedit');

    });


    //Quality
    Route::prefix('/quality')->group(function () {
        Route::any('/', 'QualityController@index')->name('quality');
        Route::get('/show/{id}', 'QualityController@show')->name('quality.show');

        Route::get('/add', 'QualityController@add')->name('quality.add');
        Route::post('/doadd', 'QualityController@doadd')->name('quality.doadd');

        Route::get('/edit/{id}', 'QualityController@edit')->name('quality.edit');
        Route::post('/doedit', 'QualityController@doedit')->name('quality.doedit');

        Route::get('/delete/{id}', 'QualityController@delete')->name('quality.delete');
    });

    //Skills
    Route::prefix('/skill')->group(function () {
        Route::get('/', 'SkillController@index')->name('skill');
        Route::get('/show/{id}', 'SkillController@show')->name('skill.show');

        Route::get('/add', 'SkillController@add')->name('skill.add');
        Route::post('/doadd', 'SkillController@doadd')->name('skill.doadd');

        Route::get('/edit/{id}', 'SkillController@edit')->name('skill.edit');
        Route::post('/doedit', 'SkillController@doedit')->name('skill.doedit');

        Route::get('/delete/{id}', 'SkillController@delete')->name('skill.delete');
    });



    //Services
    Route::prefix('/service')->group(function () {
        Route::get('/', 'ServiceController@index')->name('service');
        Route::get('/show/{id}', 'ServiceController@show')->name('service.show');

        Route::get('/add', 'ServiceController@add')->name('service.add');
        Route::post('/doadd', 'ServiceController@doadd')->name('service.doadd');

        Route::get('/edit/{id}', 'ServiceController@edit')->name('service.edit');
        Route::post('/doedit', 'ServiceController@doedit')->name('service.doedit');

        Route::get('/delete/{id}', 'ServiceController@delete')->name('service.delete');
    });




    //Testmonials
    Route::prefix('/testmonial')->group(function () {
        Route::get('/', 'TestmonialController@index')->name('testmonial');
        Route::get('/show/{id}', 'TestmonialController@show')->name('testmonial.show');

        Route::get('/add', 'TestmonialController@add')->name('testmonial.add');
        Route::post('/doadd', 'TestmonialController@doadd')->name('testmonial.doadd');

        Route::get('/edit/{id}', 'TestmonialController@edit')->name('testmonial.edit');
        Route::post('/doedit', 'TestmonialController@doedit')->name('testmonial.doedit');

        Route::get('/delete/{id}', 'TestmonialController@delete')->name('testmonial.delete');
    });


    //Certificates
    Route::prefix('/certificate')->group(function () {
        Route::get('/', 'CertificateController@index')->name('certificate');
        Route::get('/show/{id}', 'CertificateController@show')->name('certificate.show');

        Route::get('/add', 'CertificateController@add')->name('certificate.add');
        Route::post('/doadd', 'CertificateController@doadd')->name('certificate.doadd');

        Route::get('/edit/{id}', 'CertificateController@edit')->name('certificate.edit');
        Route::post('/doedit', 'CertificateController@doedit')->name('certificate.doedit');

        Route::get('/delete/{id}', 'CertificateController@delete')->name('certificate.delete');
    });


        //Contact
        Route::prefix('/contact')->group(function () {
            Route::get('/', 'ContactController@index')->name('contact');
            Route::get('/show/{id}', 'ContactController@show')->name('contact.show');
            Route::get('/delete/{id}', 'ContactController@delete')->name('contact.delete');
        });


    //Hire
            Route::prefix('/hire')->group(function () {
                Route::get('/', 'HireController@index')->name('hire');
                Route::get('/show/{id}', 'HireController@show')->name('hire.show');
                Route::get('/delete/{id}', 'HireController@delete')->name('hire.delete');
            });

            //Notification
            Route::prefix('/notify')->group(function () {
                Route::get('/markAllRead' , 'NotificationController@readAll')->name('markAllRead');
                Route::get('/showAll' , 'NotificationController@showAll')->name('showAll');
                Route::get('/markRead/{id}' , 'NotificationController@read')->name('markRead');
            });

            //Projects
                Route::prefix('/project')->group(function () {
                    Route::get('/', 'ProjectController@index')->name('project');
                    Route::get('/show/{id}', 'ProjectController@show')->name('project.show');

                    Route::get('/add', 'ProjectController@add')->name('project.add');
                    Route::post('/doadd', 'ProjectController@doadd')->name('project.doadd');

                    Route::get('/edit/{id}', 'ProjectController@edit')->name('project.edit');
                    Route::post('/doedit', 'ProjectController@doedit')->name('project.doedit');

                    Route::get('/delete/{id}', 'ProjectController@delete')->name('project.delete');
                });



            //ImageProjects
            Route::prefix('/image-project')->group(function () {
                Route::get('/show/{id}', 'ImageProjectController@show')->name('imagep.show');
                Route::post('/doadd', 'ImageProjectController@doadd')->name('imagep.doadd');
                Route::post('/doedit', 'ImageProjectController@doedit')->name('imagep.doedit');
                Route::get('/delete/{id}', 'ImageProjectController@delete')->name('imagep.delete');
            });




    });

});

Route::namespace('App\Http\Controllers')->group(function () {
    // Route::get('/register', 'AuthController@regView')->name('reg');
    // Route::post('/do-register', 'AuthController@register')->name('register');
    Route::get('/login', 'AuthController@login')->name('login');
    Route::post('/do-login', 'AuthController@doLogin')->name('dologin');

    Route::get('/forgot-password', 'AuthController@forgot')->name('forgot');
    Route::post('/do-forgot', 'AuthController@doForgot')->name('doForgot');

    Route::get('/password/rest/{token}/{email}', 'AuthController@rest')->name('rest');
    Route::post('/do-rest', 'AuthController@doRest')->name('doRest');
   //Contact
    Route::prefix('/contacts')->group(function () {
    Route::get('/', 'ContactController@index')->name('contacts');
    Route::post('/save', 'ContactController@save')->name('contacts.save');
                                                });
 //Hires
    Route::prefix('/hires')->group(function () {
    Route::get('/', 'HireController@index')->name('hires');
    Route::post('/save', 'HireController@save')->name('hires.save');
                                                });
//Projects
    Route::prefix('/project')->group(function () {
    Route::get('/user-show/{id}', 'ProjectController@usershow')->name('project.user.show');
});

});

