<?php

Route::group(['prefix' => 'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
	Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

	//admin password reset routes
    Route::post('/password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Admin\ResetPasswordController@reset');
    Route::get('/password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

	Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register')->middleware('hasInvitation');
	Route::post('/register', 'Admin\RegisterController@register')->name('admin.register.post');

    Route::group(['middleware' => ['auth:admin']], function () {

	    Route::get('/', function () {
	        return view('admin.dashboard.index');
	    })->name('admin.dashboard');

		Route::get('/invite_list', 'Admin\InvitationController@index')->name('admin.invite');
	    Route::get('/invitation', 'Admin\InvitationController@create')->name('admin.invite.create');
		Route::post('/invitation', 'Admin\InvitationController@store')->name('admin.invitation.store');
		Route::get('/adminuser', 'Admin\AdminUserController@index')->name('admin.adminuser');
		Route::post('/adminuser', 'Admin\AdminUserController@updateAdminUser')->name('admin.adminuser.update');
	    Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
		Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

		Route::get('/profile', 'Admin\ProfileController@index')->name('admin.profile');
		Route::post('/profile', 'Admin\ProfileController@update')->name('admin.profile.update');
		Route::post('/changepassword', 'Admin\ProfileController@changePassword')->name('admin.profile.changepassword');

		Route::group(['prefix'  =>   'banner'], function() {
			Route::get('/', 'Admin\BannerController@index')->name('admin.banner.index');
			Route::get('/create', 'Admin\BannerController@create')->name('admin.banner.create');
			Route::post('/store', 'Admin\BannerController@store')->name('admin.banner.store');
			Route::get('/{id}/edit', 'Admin\BannerController@edit')->name('admin.banner.edit');
			Route::post('/update', 'Admin\BannerController@update')->name('admin.banner.update');
			Route::get('/{id}/delete', 'Admin\BannerController@delete')->name('admin.banner.delete');
			Route::post('updateStatus', 'Admin\BannerController@updateStatus')->name('admin.banner.updateStatus');
		});


		Route::group(['prefix'  =>   'users'], function() {
			Route::get('/', 'Admin\UserManagementController@index')->name('admin.users.index');
			Route::post('/', 'Admin\UserManagementController@updateUser')->name('admin.users.post');
			Route::get('/{id}/delete', 'Admin\UserManagementController@delete')->name('admin.users.delete');
			Route::get('/{id}/view', 'Admin\UserManagementController@viewDetail')->name('admin.users.detail');
			Route::post('updateStatus', 'Admin\UserManagementController@updateStatus')->name('admin.users.updateStatus');
			Route::get('/{id}/details', 'Admin\UserManagementController@details')->name('admin.users.details');
		});
        Route::group(['prefix'  =>   'state'], function() {


            Route::get('/', 'Admin\StateManagementController@index')->name('admin.state.index');
            Route::get('/create', 'Admin\StateManagementController@create')->name('admin.state.create');
            Route::post('/store', 'Admin\StateManagementController@store')->name('admin.state.store');
            Route::get('/{id}/edit', 'Admin\StateManagementController@edit')->name('admin.state.edit');
            Route::post('/update', 'Admin\StateManagementController@update')->name('admin.state.update');
            Route::get('/{id}/delete', 'Admin\StateManagementController@delete')->name('admin.state.delete');
            Route::post('updateStatus', 'Admin\StateManagementController@updateStatus')->name('admin.state.updateStatus');
            Route::get('/{id}/details', 'Admin\StateManagementController@details')->name('admin.state.details');
            Route::post('/csv-store', 'Admin\StateManagementController@csvStore')->name('admin.state.data.csv.store');
        });
        //**  Pin code management   **/
        Route::group(['prefix'  =>   'pin'], function() {
            Route::get('/', 'Admin\PinCodeManagementController@index')->name('admin.pin.index');
            Route::get('/create', 'Admin\PinCodeManagementController@create')->name('admin.pin.create');
            Route::post('/store', 'Admin\PinCodeManagementController@store')->name('admin.pin.store');
            Route::get('/{id}/edit', 'Admin\PinCodeManagementController@edit')->name('admin.pin.edit');
            Route::post('/update', 'Admin\PinCodeManagementController@update')->name('admin.pin.update');
            Route::get('/{id}/delete', 'Admin\PinCodeManagementController@delete')->name('admin.pin.delete');
            Route::post('updateStatus', 'Admin\PinCodeManagementController@updateStatus')->name('admin.pin.updateStatus');
            Route::get('/{id}/details', 'Admin\PinCodeManagementController@details')->name('admin.pin.details');

            Route::post('/csv-store', 'Admin\PinCodeManagementController@csvStore')->name('admin.pincode.data.csv.store');
          });
            //**  Suburb management   **/


            Route::group(['prefix'  =>   'suburb'], function() {

            Route::get('/', 'Admin\SuburbManagementController@index')->name('admin.suburb.index');
            Route::get('/create', 'Admin\SuburbManagementController@create')->name('admin.suburb.create');
            Route::post('/store', 'Admin\SuburbManagementController@store')->name('admin.suburb.store');
            Route::get('/{id}/edit', 'Admin\SuburbManagementController@edit')->name('admin.suburb.edit');
            Route::post('/update', 'Admin\SuburbManagementController@update')->name('admin.suburb.update');
            Route::get('/{id}/delete', 'Admin\SuburbManagementController@delete')->name('admin.suburb.delete');
            Route::post('updateStatus', 'Admin\SuburbManagementController@updateStatus')->name('admin.suburb.updateStatus');
            Route::get('/{id}/details', 'Admin\SuburbManagementController@details')->name('admin.suburb.details');
            Route::post('/csv-store', 'Admin\SuburbManagementController@csvStore')->name('admin.suburb.data.csv.store');
        });
		Route::group(['prefix'  =>   'business'], function() {
			Route::get('/', 'Admin\BusinessController@index')->name('admin.business.index');
			Route::get('/create', 'Admin\BusinessController@create')->name('admin.business.create');
			Route::post('/store', 'Admin\BusinessController@store')->name('admin.business.store');
			Route::get('/{id}/edit', 'Admin\BusinessController@edit')->name('admin.business.edit');
			Route::post('/update', 'Admin\BusinessController@update')->name('admin.business.update');
			Route::get('/{id}/delete', 'Admin\BusinessController@delete')->name('admin.business.delete');
			Route::post('updateStatus', 'Admin\BusinessController@updateStatus')->name('admin.business.updateStatus');
			Route::get('/{id}/details', 'Admin\BusinessController@details')->name('admin.business.details');
		});
        Route::group(['prefix'  =>   'business-advertisement'], function() {
			Route::get('/', 'Admin\AdvertisementController@index')->name('admin.business.advertisement.index');
			Route::get('/create', 'Admin\AdvertisementController@create')->name('admin.business.advertisement.create');
			Route::post('/store', 'Admin\AdvertisementController@store')->name('admin.business.advertisement.store');
			Route::get('/{id}/edit', 'Admin\AdvertisementController@edit')->name('admin.business.advertisement.edit');
			Route::post('/update', 'Admin\AdvertisementController@update')->name('admin.business.advertisement.update');
			Route::get('/{id}/delete', 'Admin\AdvertisementController@delete')->name('admin.business.advertisement.delete');
			Route::post('updateStatus', 'Admin\AdvertisementController@updateStatus')->name('admin.business.advertisement.updateStatus');
			Route::get('/{id}/details', 'Admin\AdvertisementController@details')->name('admin.business.advertisement.details');
		});


        //advertisement-report


        Route::group(['prefix'  =>   'business-advertisement-report'], function() {
			Route::get('/', 'Admin\AdvertisementController@report')->name('admin.business.advertisement.report.index');
			Route::get('/advertisement-view/{id}', 'Admin\AdvertisementController@view')->name('admin.business.advertisement.views');

           // Route::get('loop-like/{id}','Site\LoopController@loopLike');

			// Route::post('/store', 'Admin\AdvertisementReportController@store')->name('admin.business.advertisement.report.store');
			// Route::get('/{id}/edit', 'Admin\AdvertisementReportController@edit')->name('admin.business.advertisement.report.edit');
			// Route::post('/update', 'Admin\AdvertisementReportController@update')->name('admin.business.advertisement.report.update');
			// Route::get('/{id}/delete', 'Admin\AdvertisementReportController@delete')->name('admin.business.advertisement.report.delete');
			// Route::post('updateStatus', 'Admin\AdvertisementReportController@updateStatus')->name('admin.business.advertisement.report.updateStatus');
			// Route::get('/{id}/details', 'Admin\AdvertisementReportController@details')->name('admin.business.advertisement.report.details');
		});

        Route::get('/user-advertisement-view/{id}', 'Admin\AdvertisementController@userview')->name('admin.business.advertisement.user.views');



		Route::group(['prefix'  =>   'category'], function() {
			Route::get('/', 'Admin\CategoryController@index')->name('admin.category.index');
			Route::get('/create', 'Admin\CategoryController@create')->name('admin.category.create');
			Route::post('/store', 'Admin\CategoryController@store')->name('admin.category.store');
			Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.category.edit');
			Route::post('/update', 'Admin\CategoryController@update')->name('admin.category.update');
			Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.category.delete');
			Route::post('updateStatus', 'Admin\CategoryController@updateStatus')->name('admin.category.updateStatus');
			Route::get('/{id}/details', 'Admin\CategoryController@details')->name('admin.category.details');
		});

		Route::group(['prefix'  =>   'event'], function() {
			Route::get('/', 'Admin\EventController@index')->name('admin.event.index');
			Route::get('/create', 'Admin\EventController@create')->name('admin.event.create');
			Route::post('/store', 'Admin\EventController@store')->name('admin.event.store');
			Route::get('/{id}/edit', 'Admin\EventController@edit')->name('admin.event.edit');
			Route::post('/update', 'Admin\EventController@update')->name('admin.event.update');
			Route::get('/{id}/delete', 'Admin\EventController@delete')->name('admin.event.delete');
			Route::post('updateStatus', 'Admin\EventController@updateStatus')->name('admin.event.updateStatus');
			Route::get('/{id}/details', 'Admin\EventController@details')->name('admin.event.details');
		});

		Route::group(['prefix'  =>   'deal'], function() {
			Route::get('/', 'Admin\DealController@index')->name('admin.deal.index');
			Route::get('/create', 'Admin\DealController@create')->name('admin.deal.create');
			Route::post('/store', 'Admin\DealController@store')->name('admin.deal.store');
			Route::get('/{id}/edit', 'Admin\DealController@edit')->name('admin.deal.edit');
			Route::post('/update', 'Admin\DealController@update')->name('admin.deal.update');
			Route::get('/{id}/delete', 'Admin\DealController@delete')->name('admin.deal.delete');
			Route::post('updateStatus', 'Admin\DealController@updateStatus')->name('admin.deal.updateStatus');
			Route::get('/{id}/details', 'Admin\DealController@details')->name('admin.deal.details');
		});

		Route::group(['prefix'  =>   'property'], function() {
			Route::get('/', 'Admin\PropertyController@index')->name('admin.property.index');
			Route::get('/create', 'Admin\PropertyController@create')->name('admin.property.create');
			Route::post('/store', 'Admin\PropertyController@store')->name('admin.property.store');
			Route::get('/{id}/edit', 'Admin\PropertyController@edit')->name('admin.property.edit');
			Route::post('/update', 'Admin\PropertyController@update')->name('admin.property.update');
			Route::get('/{id}/delete', 'Admin\PropertyController@delete')->name('admin.property.delete');
			Route::post('updateStatus', 'Admin\PropertyController@updateStatus')->name('admin.property.updateStatus');
			Route::get('/{id}/details', 'Admin\PropertyController@details')->name('admin.property.details');
		});

		Route::group(['prefix'  =>   'blog'], function() {
			Route::get('/', 'Admin\BlogController@index')->name('admin.blog.index');
			Route::get('/create', 'Admin\BlogController@create')->name('admin.blog.create');
			Route::post('/store', 'Admin\BlogController@store')->name('admin.blog.store');
			Route::get('/{id}/edit', 'Admin\BlogController@edit')->name('admin.blog.edit');
			Route::post('/update', 'Admin\BlogController@update')->name('admin.blog.update');
			Route::get('/{id}/delete', 'Admin\BlogController@delete')->name('admin.blog.delete');
			Route::post('updateStatus', 'Admin\BlogController@updateStatus')->name('admin.blog.updateStatus');
			Route::get('/{id}/details', 'Admin\BlogController@details')->name('admin.blog.details');
		});
        Route::group(['prefix'  =>   'admin/market-cat'], function() {
			Route::get('/', 'Admin\MarketCategoryController@index')->name('admin.market-cat.index');
			Route::get('/create', 'Admin\MarketCategoryController@create')->name('admin.market-cat.create');
			Route::post('/store', 'Admin\MarketCategoryController@store')->name('admin.market-cat.store');
			Route::get('/{id}/edit', 'Admin\MarketCategoryController@edit')->name('admin.market-cat.edit');
			Route::post('/update', 'Admin\MarketCategoryController@update')->name('admin.market-cat.update');
			Route::get('/{id}/delete', 'Admin\MarketCategoryController@delete')->name('admin.market-cat.delete');
			Route::post('updateStatus', 'Admin\MarketCategoryController@updateStatus')->name('admin.market-cat.updateStatus');
			Route::get('/{id}/details', 'Admin\MarketCategoryController@details')->name('admin.market-cat.details');
		});
        Route::group(['prefix'  =>   'admin/market-subcat'], function() {
			Route::get('/', 'Admin\MarketSubCategoryController@index')->name('admin.market-subcat.index');
			Route::get('/create', 'Admin\MarketSubCategoryController@create')->name('admin.market-subcat.create');
			Route::post('/store', 'Admin\MarketSubCategoryController@store')->name('admin.market-subcat.store');
			Route::get('/{id}/edit', 'Admin\MarketSubCategoryController@edit')->name('admin.market-subcat.edit');
			Route::post('/update', 'Admin\MarketSubCategoryController@update')->name('admin.market-subcat.update');
			Route::get('/{id}/delete', 'Admin\MarketSubCategoryController@delete')->name('admin.market-subcat.delete');
			Route::post('updateStatus', 'Admin\MarketSubCategoryController@updateStatus')->name('admin.market-subcat.updateStatus');
			Route::get('/{id}/details', 'Admin\MarketSubCategoryController@details')->name('admin.market-subcat.details');
		});

		Route::group(['prefix'  =>   'notification'], function() {
			Route::get('/', 'Admin\NotificationController@index')->name('admin.notification.index');
			Route::get('/create', 'Admin\NotificationController@create')->name('admin.notification.create');
			Route::post('/store', 'Admin\NotificationController@store')->name('admin.notification.store');
			Route::get('/{id}/delete', 'Admin\NotificationController@delete')->name('admin.notification.delete');
		});

		Route::group(['prefix' => 'loop'], function() {
			Route::get('/', 'Admin\LoopController@index')->name('admin.loop.index');
			Route::get('/{id}/delete', 'Admin\LoopController@delete')->name('admin.loop.delete');
			Route::post('updateStatus', 'Admin\LoopController@updateStatus')->name('admin.loop.updateStatus');
			Route::get('/{id}/details', 'Admin\LoopController@details')->name('admin.loop.details');
		});

        Route::group(['prefix' => 'localtrade/question'], function() {
			Route::get('/', 'Admin\LocalTradeQuestionController@index')->name('admin.localtrade.question.index');
			Route::get('/create', 'Admin\LocalTradeQuestionController@create')->name('admin.localtrade.question.create');
			Route::post('/store', 'Admin\LocalTradeQuestionController@store')->name('admin.localtrade.question.store');
			Route::get('/{id}/edit', 'Admin\LocalTradeQuestionController@edit')->name('admin.localtrade.question.edit');
			Route::post('/update', 'Admin\LocalTradeQuestionController@update')->name('admin.localtrade.question.update');
			Route::get('/{id}/delete', 'Admin\LocalTradeQuestionController@delete')->name('admin.localtrade.question.delete');
			Route::post('updateStatus', 'Admin\LocalTradeQuestionController@updateStatus')->name('admin.localtrade.question.updateStatus');
			Route::get('/{id}/details', 'Admin\LocalTradeQuestionController@details')->name('admin.localtrade.question.detail');
		});

	});

});
?>
