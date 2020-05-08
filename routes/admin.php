<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 
|
*/
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function () {
  return view('auth.login');
});
Route::group(['namespace' => 'Admin'], function () {
  Route::get('/admin', 'AdminHomeController@home');
  // ---------------homeSlider------------------
  Route::resource('/admin/home-slider', 'HomeSliderController');
  // ---------------social Media------------------
  Route::resource('/admin/social-media', 'SocialMediaController');
  // ---------------Wathbat Number------------------
  Route::resource('/admin/wathbat-number', 'WathbatNumberController');
  // ---------------portfolio------------------
  Route::resource('/admin/portfolio', 'PortfolioController');
  // ---------------wathbat_data------------------
  Route::resource('/admin/wathbat_data', 'WathbatDataController');
   // ---------------Contact Messege------------------
   Route::resource('/admin/contact_messege', 'ContactMessegeController');
     // ---------------Client------------------
     Route::resource('/admin/client', 'ClientController');
      // ---------------client-review------------------
      Route::resource('/admin/client-review', 'ClientReviewController');
});
