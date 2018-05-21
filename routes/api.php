<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'as' => 'api.',
    'namespace' => 'Api\\'
], function () {
    Route::post('/access_token', 'AuthController@accessToken');
    Route::group(['middleware' => ['auth:api','auth.renew']], function () {
        Route::get('/user', function (Request $request) {
            return \Auth::user();
        });
        Route::group([
            'prefix' => 'psychoanalyst', 
            'as' => 'psychoanalyst.', 
            'namespace' => 'Psychoanalyst\\',
            //Observe que o middleware can:psychoanalyst está fazendo a segurança da rota para que pacientes não consigam acessá-la. A diretiva can testa a habilidade que criamos no App\Providers\AuthServiceProvider, anteriormente.
            'middleware' => 'can:psychoanalyst'
        ], function(){ //GET /class_meeting/1/class_tests/1 - forma alinhada porque para consultar as questões, preciso consultar as meetings
            Route::group(['prefix' => 'class_meetings/{class_meeting}', 'as' => 'class_meetings.'], function () {
                Route::resource('class_tests', 'ClassTestsController', ['except' => ['create', 'edit']]);
            });
            Route::resource('class_informations', 'ClassInformationsController', ['only' => ['index', 'show']]);
            Route::resource('class_meetings', 'ClassMeetingsController', ['only' => ['index', 'show']]);
            Route::resource('categories', 'CategoriesController', ['only' => ['index', 'show']]);
            Route::resource('researches', 'ResearchesController', ['only' => ['index', 'show']]);
            Route::resource('tools', 'ToolsController', ['only' => ['index', 'show']]);
            Route::resource('class_toolkits', 'ClassToolkitsController', ['only' => ['index', 'show']]);
        });
        Route::group([
            'prefix' => 'patient', 
            'as' => 'patient.', 
            'namespace' => 'Patient\\',
            //Observe que o middleware can:psychoanalyst está fazendo a segurança da rota para que pacientes não consigam acessá-la. A diretiva can testa a habilidade que criamos no App\Providers\AuthServiceProvider, anteriormente.
            'middleware' => ['can:patient']
        ], function(){ //GET /class_meeting/1/class_tests/1 - forma alinhada porque para consultar as questões, preciso consultar as meetings
            Route::group(['prefix' => 'class_informations/{class_information}', 'as' => 'class_informations.'], function(){
                Route::resource('class_meetings', 'ClassMeetingsController', ['only' => ['index', 'show']]);
            });
            Route::group(['prefix' => 'class_meetings/{class_meeting}', 'as' => 'class_meetings.'], function () {
                Route::resource('class_tests', 'ClassTestsController', ['only' => ['index', 'show']]);
            });
            Route::group(['prefix' => 'class_tests', 'as' => 'class_tests.'], function () {
                Route::group(['prefix' => '{class_test}'], function(){
                    Route::resource('do', 'PatientClassTestsController', ['only' => ['show','store']]);
                });
                Route::group(['prefix' => 'results'], function(){ //class_tests/results/per_subject
                    Route::get('per_subject', 'ClassTestResultsController@perSubject');
                });
            }); 
            Route::resource('class_informations', 'ClassInformationsController', ['only' => ['index', 'show']]);
        });
    });

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/logout', 'AuthController@logout');
    });
});
