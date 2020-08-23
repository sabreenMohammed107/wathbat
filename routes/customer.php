
<?php

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| 
|   \Customer
*/

Route::namespace('Customer')->group(function () {
  /*-----------------------index-------------------*/
  Route::get('/', 'IndexController@index');
  Route::get('/projectDetails/{id}', 'IndexController@projectDetails')->name('projectDetails');
  Route::get('/about', 'IndexController@about');
  Route::get('/services', 'IndexController@services');
  Route::get('/portfolio', 'IndexController@portfolio');
  Route::get('/contact', 'IndexController@contact');
  Route::post('/contactForm', 'IndexController@contactForm')->name('contactForm');
  Route::get('/allProjects', 'IndexController@allProjects');
  Route::get('/ProjectType', 'IndexController@ProjectType');
  Route::get('/allPortoGallery', 'IndexController@allPortoGallery');
  Route::get('/PortoGalleryType', 'IndexController@PortoGalleryType');
  Route::get('dynamicdependentCat/fetch', 'IndexController@fetchCat')->name('dynamicdependentCat.fetch');
  Route::get('dynamicdependentCity/fetch', 'IndexController@fetchCity')->name('dynamicdependentCity.fetch');
  Route::get('dynamicdependentLastes/fetch', 'IndexController@fetchLastes')->name('dynamicdependentLastes.fetch');
  Route::get('/quoteForm', 'IndexController@quoteForm')->name('quoteForm');
  Route::get('/addToCard', 'IndexController@addToCard')->name('addToCard');
  Route::get('/quoteFormTest', 'IndexController@quoteFormTest')->name('quoteFormTest');
  Route::get('/removeItem/{id}', 'IndexController@removeItem')->name('removeItem');
  Route::get('/removeAll', 'IndexController@removeAll')->name('removeAll');


   //  Change Lang..
Route::get('changeLang/{lang}', function($lang){
 
	\Session::put('locale', $lang);

	return redirect()->back();

});

});

