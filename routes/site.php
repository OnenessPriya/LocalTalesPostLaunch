<?php
Route::get('/','Site\HomeController@index')->name('site.home');
Route::get('event-list','Site\EventController@index');
Route::get('event-details/{id}/{slug}','Site\EventController@details');
Route::get('deal-list','Site\DealController@index');
Route::get('deal-details/{id}/{slug}','Site\DealController@details');
Route::get('directory-list','Site\BusinessController@index');
Route::get('directory-details/{id}/{slug}','Site\BusinessController@details');
Route::get('/search', 'Site\HomeController@search')->name('site.search');
Route::get('local-loops','Site\LoopController@index');
Route::get('blog-list','Site\BlogController@index');
Route::get('blog-details/{id}/{slug}','Site\BlogController@details');
Route::get('category-wise-blogs/{id}/{slug}','Site\BlogController@categoryWiseList');

Route::get('login', 'Site\LoginController@showLoginForm')->name('site.login');
Route::post('site-login', 'Site\LoginController@login')->name('site.login.post');
Route::get('register', 'Site\LoginController@register')->name('site.register');
Route::post('site-register', 'Site\LoginController@userCreate')->name('site.register.post');
Route::get('site-logout', 'Site\LoginController@logout')->name('site.logout');

Route::group(['middleware' => ['auth:user']], function () {
		Route::get('/dashboard', function () {
	      	return view('site.dashboard.index');
	    })->name('site.dashboard');

	    Route::get('saved-events','Site\DashboardController@savedEvents')->name('site.dashboard.saved_events');
	    Route::get('/{id}/delete', 'Site\DashboardController@removeSavedEvents')->name('site.dashboard.event.delete');
	    Route::get('saved-deals','Site\DashboardController@savedDeals')->name('site.dashboard.saved_deals');
	    Route::get('saved-deals/{id}/delete', 'Site\DashboardController@removeSavedDeals')->name('site.dashboard.deal.delete');
	    Route::get('saved-directory','Site\DashboardController@savedDirectories')->name('site.dashboard.saved_businesses');
	    Route::get('saved-directory/{id}/delete', 'Site\DashboardController@removeSavedDirectories')->name('site.dashboard.directory.delete');
	    Route::get('site-edit-profile', 'Site\DashboardController@editUserProfile')->name('site.dashboard.editProfile');
	    Route::post('site-update-profile', 'Site\DashboardController@updateProfile')->name('site.dashboard.updateProfile');
	    Route::get('notification-list', 'Site\DashboardController@notificationList')->name('site.dashboard.notificationList');

	    Route::post('site/comments/create', 'Site\LoopController@createComment')->name('site.comment.post');
	    Route::get('loop-like/{id}','Site\LoopController@loopLike');

	    Route::get('site-save-user-event/{id}','Site\EventController@saveUserEvent');
	    Route::get('site-delete-user-event/{id}','Site\EventController@deleteUserEvent');

	    Route::get('site-save-user-deal/{id}','Site\DealController@saveUserDeal');
	    Route::get('site-delete-user-deal/{id}','Site\DealController@deleteUserDeal');

	    Route::get('site-save-user-directory/{id}','Site\BusinessController@saveUserBusiness');
	    Route::get('site-delete-user-directory/{id}','Site\BusinessController@deleteUserBusiness');

        Route::get('site-LocalLoop-post', 'Site\LoopController@post')->name('site.localloop.post');
        Route::get('/site-LocalLoop-post/create', 'Site\LoopController@postcreate')->name('site.localloop.post.create');
		Route::post('/site-LocalLoop-post/store', 'Site\LoopController@poststore')->name('site.localloop.post.store');
		Route::get('/site-LocalLoop-post/{id}/edit', 'Site\LoopController@postedit')->name('site.localloop.post.edit');
		Route::post('/site-LocalLoop-post/update', 'Site\LoopController@postupdate')->name('site.localloop.post.update');
		Route::get('/site-LocalLoop-post/{id}/delete', 'Site\LoopController@postdelete')->name('site.localloop.post.delete');
		Route::post('site-LocalLoop-post/updateStatus', 'Site\LoopController@postupdateStatus')->name('site.localloop.post.updateStatus');
		Route::get('/site-LocalLoop-post/{id}/details', 'Site\LoopController@postdetails')->name('site.localloop.post.details');
	});

Route::get('about-us','Site\ContentController@about');
Route::get('terms-of-use','Site\ContentController@terms');
Route::get('privacy-policy','Site\ContentController@privacy');

// quotes
Route::get('local-product','Site\ContentController@getProduct')->name('local-product');
Route::get('get-quotes','Site\ContentController@getQuotes')->name('get-quotes');
Route::post('get-category','Site\ContentController@getCateory')->name('get-quotes.category');
Route::post('submit-quotes','Site\ContentController@submitQuotes')->name('get-quotes.submit');
Route::post('submit-quotes/test','Site\ContentController@submitQuotesTest')->name('get-quotes.submit.test');


Route::get('category/{id?}/directory', 'Front\IndexController@categoryWiseDirectory')->name('category.directory');
//business-signup



Route::get('/business-signup', 'Front\IndexController@businesssignup')->name('business.signup');

Route::post('/business-signup-page/create', 'Front\IndexController@pagestore')->name('business.signuppage.store');
?>







