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
            //para consultar a lista das alternativas, terei que consultar primeiro o tipo de alternativa. 
            Route::group(['prefix' => 'type_choices/{type_choice}', 'as' => 'type_choices.'], function () {
                Route::resource('list_choices', 'ListChoicesController', ['except' => ['create', 'edit']]);
            });
            Route::resource('class_informations', 'ClassInformationsController', ['only' => ['index', 'show']]);
            Route::resource('class_meetings', 'ClassMeetingsController', ['only' => ['index', 'show']]);
            Route::get('class_toolkits', function (){
                $class_toolkits = \App\Models\Painel\ClassToolkit::all();
                return \App\Http\Resources\ClassToolkitResource::collection($class_toolkits);
            });
            Route::get('ranks', function (){
                $ranks = \App\Models\Painel\Rank::with('subRanks.subSubRanks')->get();
                return \App\Http\Resources\RankCustomResource::collection($ranks);
            });
            Route::get('tools', function (){
                $tools = \App\Models\Painel\Tool::all();
                return \App\Http\Resources\ToolResource::collection($tools);
            });
            //Se eu quiser receber apenas um recurso min 35:49
            Route::get('tools/{tool}', function (\App\Models\Painel\Tool $tool){
                return new \App\Http\Resources\ToolResource($tool);
            });
            
            //Route::resource('tools', 'ToolsController', ['only' => ['index', 'show']]);
            //Route::resource('class_toolkits', 'ClassToolkitsController', ['only' => ['index', 'show']]);
            Route::resource('class_choosings', 'ClassChoosingsController', ['only' => ['index', 'show']]);
            Route::resource('researches', 'ResearchesController', ['only' => ['index', 'show']]);
            Route::resource('class_sets', 'ClassSetsController', ['only' => ['index', 'show']]);
            Route::resource('type_choices', 'TypeChoicesController', ['only' => ['index', 'show']]);
        });
        Route::group([
            'prefix' => 'patient', 
            'as' => 'patient.', 
            'namespace' => 'Patient\\',
            //Observe que o middleware can:psychoanalyst está fazendo a segurança da rota para que pacientes não consigam acessá-la. A diretiva can testa a habilidade que criamos no App\Providers\AuthServiceProvider, anteriormente.
            'middleware' => 'can:patient'
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
