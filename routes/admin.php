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
  // ---------------QuotationTypes------------------
  Route::resource('/admin/quate-type', 'QuotationTypesController');
  // ---------------Quate------------------
  Route::resource('/admin/quate', 'QuateController');
  Route::get('/admin/editQuate/{id}', 'QuateController@editQuate')->name('editQuate');
  Route::post('/admin/add-sector', 'QuateController@addSector')->name('addSector');
  Route::post('/admin/Edit-sector', 'QuateController@updateSector')->name('updateSector');
  Route::post('/admin/delete-sector/{id}', 'QuateController@deleteSector')->name('deleteSector');
  // ---------------wathbat_project------------------
  Route::resource('/admin/wathbat_project', 'WathbatProjectController');
  Route::post('/admin/add-projectGallery', 'WathbatProjectController@addGallery')->name('addProjectGallery');
  Route::post('/admin/Edit-projectGallery', 'WathbatProjectController@updateGallery')->name('updateProjectGallery');
  Route::post('/admin/delete-projectGallery/{id}', 'WathbatProjectController@deleteGallery')->name('deleteProjectGallery');
  Route::post('/admin/add-projectSlider', 'WathbatProjectController@addSlider')->name('addProjectSlider');
  Route::post('/admin/Edit-projectSlider', 'WathbatProjectController@updateSlider')->name('updateProjectSlider');
  Route::post('/admin/delete-projectSlider/{id}', 'WathbatProjectController@deleteSlider')->name('deleteProjectSlider');
});
