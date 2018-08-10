<?php
Auth::routes();

  Route::get('/', 'SiteController@index')->name('site.home.index');
  Route::get('perfil', ['as'=>'site.perfil','uses'=>'SiteController@perfil']);
  Route::put('perfil', ['as'=>'site.perfil.update','uses'=>'SiteController@perfilUpdate']);

  Route::get('orders', ['as'=>'site.orders','uses'=>'SiteController@orders']);

  Route::get('favorites', ['as'=>'site.favorites','uses'=>'SiteController@favorites']);
  Route::post('favorites/{product}', ['as'=>'site.favorites.create','uses'=>'SiteController@favoritesCreate']);
  Route::delete('favorites/{product}', ['as'=>'site.favorites.delete','uses'=>'SiteController@favoritesDelete']);

  Route::get('/app', function () {
    return view('layouts.spa');
  });
 
 //Carrinho de compra 
 Route::get('/shop', 'ShopController@index')->name('shop.index');
 Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

 Route::get('/cart', 'CartController@index')->name('cart.index');
 Route::post('/cart', 'CartController@store')->name('cart.store');
 Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
 Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
 Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

 Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
 Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

 Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
 Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

 Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
 Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

 Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');


//Site
Route::group(['prefix' => 'site', 'namespace' => 'Site'], function(){    
    //Language route
    Route::post('/language/', array(
        'before'=> 'csrf',
        'as'    => 'language-chooser',
        'uses'  => 'LanguageController@chooser',
    ));    
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@detail');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::post('/login/social', 'Auth\LoginController@loginSocial');
Route::get('/login/callback', 'Auth\LoginController@loginCallback');
   
Route::get('/checkout/{id}', function ($id) {
    return view('site.store.checkout', compact('id'));
});

Route::post('/checkout/{id}', function ($id) {
    $data = request()->all();
    unset($data['_token']);

    $data['email'] = 'contato@psicanalysis.com.br';
    $data['token'] = '700255AE21ED44EB8A38F24E7F138954';
    $data['paymentMode'] = 'default';
    $data['paymentMethod'] = 'creditCard';
    $data['receiverEmail'] = 'contato@psicanalysis.com.br';
    $data['currency'] = 'BRL';

    $data['senderAreaCode'] = substr($data['senderPhone'], 0, 2);
    $data['senderPhone'] = substr($data['senderPhone'], 2, strlen($data['senderPhone']));

    /*
    $key = 1;
    foreach ($pedido->products as $product){
        $data['itemId'.$Key] = $produto->id;
        $data['itemDescription'.$Key] = $produto->title;
        $data['itemAmount'.$Key] = number_format($produto->value, 2, '.', '');
        $data['itemQuantity'.$Key] = $produto->qtd;

        $key ++;

    }
    */

    return $data;
});

Route::group(['prefix' => 'painel', 'namespace' => 'Painel', 'middleware' => ['auth']], function(){    
    
    Route::resource('clients', 'ClientsController');

    Route::get('states', 'StatesController@index')->name('states.index');
    Route::get('state/{state}', 'CitiesController@index');   

    //Route::get('get-cities/{idState}', 'CitiesController@getCities');

    //Route::get('states/{state}/cities', 'CitiesController@getCities');

    Route::resource('rooms', 'RoomsController');

    Route::resource('agendas', 'AgendasController');
    
    Route::resource('reserves', 'ReservesController');
      
    Route::get('products', 'ProductsController@index')->name('products.index');
    Route::post('products', 'ProductsController@store')->name('products.store');
    Route::get('products', 'ProductsController@edit')->name('products.edit');
    Route::resource('products', 'ProductsController');

    Route::get('products/gallery/{product}', ['as'=>'products.gallery','uses'=>'ProductsController@indexGallery']);
    Route::get('products/gallery/create/{product}', ['as'=>'products.gallery.create','uses'=>'ProductsController@createGallery']);
    Route::post('products/gallery/store', ['as'=>'products.gallery.store','uses'=>'ProductsController@storeGallery']);
    Route::delete('products/gallery/remove', ['as'=>'products.gallery.remove','uses'=>'ProductsController@removeGallery']);
  
    Route::get('products/gallery/edit/{gallery}', ['as'=>'products.gallery.edit','uses'=>'ProductsController@editGallery']);
    Route::put('products/gallery/update/{gallery}', ['as'=>'products.gallery.update','uses'=>'ProductsController@updateGallery']);
    Route::delete('products/gallery/delete/{gallery}', ['as'=>'products.gallery.delete','uses'=>'ProductsController@deleteGallery']);
   
    Route::get('imagens/excluidas', ['as'=>'imagens.excluidas','uses'=>'ImagensController@excluidas']);
    Route::put('imagens/recupera/{id}', ['as'=>'imagens.recupera','uses'=>'ImagensController@recupera']);
    
    Route::resource('imagens', 'ImagensController');
    Route::get('imagens', 'ImagensController@index')->name('imagens.index');
    Route::post('imagens', 'ImagensController@store')->name('imagens.store');

    Route::post('slides/store/ajax', ['as'=>'slides.store.ajax','uses'=>'SlidesController@storeSlide']);
    Route::delete('slides/remove/ajax', ['as'=>'slides.remove.ajax','uses'=>'SlidesController@removeSlide']);
    Route::resource('slides', 'SlidesController');
    
    Route::get('documents/excluidas', ['as'=>'documents.excluidas','uses'=>'DocumentsController@excluidas']);
    Route::put('documents/recupera/{id}', ['as'=>'documents.recupera','uses'=>'DocumentsController@recupera']);
    
    Route::get('documents', 'DocumentsController@index')->name('documents.index');
    Route::post('documents', 'DocumentsController@store')->name('documents.store');
    Route::resource('documents', 'DocumentsController');

    Route::get("teste1","testeImagemController@teste1");
    Route::post("teste1","testeImagemController@teste1Post");

    Route::get("teste2","testeImagemController@teste2");
    Route::post("teste2","testeImagemController@teste2Post");

});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function(){    

    Route::get('/', 'AdminController@index');

    Route::group(['prefix' => 'users', 'as' => 'admin.users.'], function (){
        Route::name('settings.edit')->get('settings', 'UserSettingsController@edit');
        Route::name('settings.update')->put('update', 'UserSettingsController@update');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function (){
        Route::name('show_details')->get('show_details', 'UserController@showDetails');
        Route::group(['prefix' => '{user}/profile'], function () {
            Route::name('profile.edit')->get('', 'UserProfileController@edit');
            Route::name('profile.update')->put('', 'UserProfileController@update');
        });
     });

    Route::resource('users', 'UserController');
      
    Route::get('users/role/{id}', ['as'=>'users.role','uses'=>'UserController@role']);
    Route::post('users/role/{role}', ['as'=>'users.role.store','uses'=>'UserController@roleStore']);
    Route::delete('users/role/{user}/{role}', ['as'=>'users.role.destroy','uses'=>'UserController@roleDestroy']);

    Route::resource('roles', 'RoleController');
  
    Route::get('roles/permission/{id}', ['as'=>'roles.permission','uses'=>'RoleController@permission']);
    Route::post('roles/permission/{permission}', ['as'=>'roles.permission.store','uses'=>'RoleController@permissionStore']);
    Route::delete('roles/permission/{role}/{permission}', ['as'=>'roles.permission.destroy','uses'=>'RoleController@permissionDestroy']);
  
    Route::resource('permissions', 'PermissionController');

    Route::get('researches/arcade/{research}', ['as'=>'researches.arcade','uses'=>'ResearchesController@indexArcade']);
    Route::get('researches/arcade/create/{research}', ['as'=>'researches.arcade.create','uses'=>'ResearchesController@createArcade']);
    Route::post('researches/arcade/store', ['as'=>'researches.arcade.store','uses'=>'ResearchesController@storeArcade']);
    Route::delete('researches/arcade/remove', ['as'=>'researches.arcade.remove','uses'=>'ResearchesController@removeArcade']);
  
    Route::get('researches/arcade/edit/{arcade}', ['as'=>'researches.arcade.edit','uses'=>'ResearchesController@editArcade']);
    Route::put('researches/arcade/update/{arcade}', ['as'=>'researches.arcade.update','uses'=>'ResearchesController@updateArcade']);
    Route::delete('researches/arcade/delete/{arcade}', ['as'=>'researches.arcade.delete','uses'=>'ResearchesController@deleteArcade']);
   
    Route::group(['prefix' => 'researches/{research}', 'as' => 'researches.'],
    function (){
        Route::resource('sets', 'ClassSetsController', ['only' => ['index', 'store', 'destroy']]);
    });

    Route::resource('researches', 'ResearchesController');

    Route::resource('categories', 'CategoriesController');

    Route::resource('subjects', 'SubjectsController');
    Route::resource('sheets', 'SheetsController');
    Route::resource('sub_sheets', 'SubSheetsController');
    Route::group(['prefix' => 'class_informations/{class_information}', 'as' => 'class_informations.'],
            function () {
                Route::resource('patients', 'ClassPatientsController', ['only' => ['index', 'store', 'destroy']]);
                Route::resource('meetings', 'ClassMeetingsController', ['only' => ['index','store','destroy']]);
            });
    Route::group(['prefix' => 'type_choices/{type_choice}', 'as' => 'type_choices.'],
            function () {
                Route::resource('choosings', 'ClassChoosingsController', ['only' => ['index','store','destroy']]);
                Route::resource('optings', 'ClassOptingsController', ['only' => ['index','store','destroy']]);
            });
    Route::resource('class_informations', 'ClassInformationsController');
    Route::resource('type_choices', 'TypeChoicesController');
    Route::resource('list_choices', 'ListChoicesController');

    Route::get('tools/toolkit/{tool}', ['as'=>'tools.toolkit','uses'=>'ToolsController@indexToolkit']);
    Route::get('tools/toolkit/create/{tool}', ['as'=>'tools.toolkit.create','uses'=>'ToolsController@createToolkit']);
    Route::post('tools/toolkit/store', ['as'=>'tools.toolkit.store','uses'=>'ToolsController@storeToolkit']);
    Route::delete('tools/toolkit/remove', ['as'=>'tools.toolkit.remove','uses'=>'ToolsController@removeToolkit']);
  
    Route::get('tools/toolkit/edit/{toolkit}', ['as'=>'tools.toolkit.edit','uses'=>'ToolsController@editToolkit']);
    Route::put('tools/toolkit/update/{toolkit}', ['as'=>'tools.toolkit.update','uses'=>'ToolsController@updateToolkit']);
    Route::delete('tools/toolkit/delete/{toolkit}', ['as'=>'tools.toolkit.delete','uses'=>'ToolsController@deleteToolkit']);
    
    Route::group(['prefix' => 'tools/{tool}', 'as' => 'tools.'],
    function (){
        Route::resource('toolkits', 'ClassToolkitsController', ['only' => ['index','store','destroy']]);
    });

    Route::resource('tools', 'ToolsController');
    Route::resource('ranks', 'RanksController');
    Route::resource('sub_ranks', 'SubRanksController');
   // Route::resource('sub_sub_ranks', 'SubSubRanksController');

  });

Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::group([
        'namespace' => 'Api\\',
        'as' => 'admin.api.',
        'middleware' => ['auth', 'can:admin'],
        'prefix' => 'api'
    ], function (){
        Route::name('patients.index')->get('patients','PatientsController@index');
        Route::name('subjects.index')->get('subjects', 'SubjectsController@index');
        Route::name('psychoanalysts.index')->get('psychoanalysts', 'PsychoanalystsController@index');
        Route::name('sheets.index')->get('sheets', 'SheetsController@index');
        Route::name('sub_sheets.index')->get('sub_sheets', 'SubSheetsController@index');
        Route::name('list_choices.index')->get('list_choices', 'ListChoicesController@index');
        Route::name('question_choices.index')->get('question_choices', 'QuestionChoicesController@index');
        Route::name('tools.index')->get('tools', 'ToolsController@index');
        Route::name('ranks.index')->get('ranks', 'RanksController@index');
        Route::name('sub_ranks.index')->get('sub_ranks', 'SubRanksController@index');
        //Route::name('sub_sub_ranks.index')->get('sub_sub_ranks', 'SubSubRanksController@index');
        Route::name('categories.index')->get('categories', 'CategoriesController@index');
    });
});
