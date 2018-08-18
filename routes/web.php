<?php




Route::get('/', 'GeneralController@index')->name('general.index');
Route::get('/traffic_rules', 'GeneralController@rules')->name('general.traffic');
Route::get('/traffic_signs', 'GeneralController@signs')->name('general.signs');
Auth::routes();


//Admin routes begins here
Route::get('/admin_index', 'AdminController@index')->name('admin.index');
Route::get('/admin_users/{id?}', 'AdminController@users')->name('admin_users');
Route::match(['get','post'],'/admin_register_users', 'AdminController@register_users')->name('admin_register_users');


Route::match(['get','post'],'/admin_register_vehicles', 'VehicleController@register_vehicles')->name('admin_register_vehicles');
Route::get('/admin_manage_vehicles/{id?}', 'VehicleController@manage_vehicles')->name('admin_manage_vehicles');

Route::match(['get','post'],'/admin_view_profile', 'AdminController@profile')->name('admin_profile');
Route::match(['get','post'],'/admin_edit_profile', 'AdminController@edit_profile')->name('admin_edit_profile');

Route::match(['get','post'],'/admin_new_rule', 'RulesController@new_rule')->name('admin_new_rule');
Route::match(['get','post'],'/admin_manage_rules/{id?}', 'RulesController@manage_rules')->name('admin_manage_rules');

Route::match(['get','post'],'/admin_new_sign', 'SignController@new_sign')->name('admin_new_sign');
Route::match(['get','post'],'/admin_manage_signs/{id?}', 'SignController@manage_signs')->name('admin_manage_signs');


Route::match(['get','post'],'/admin_log_offenders', 'OffendersController@log_offenders')->name('admin_log_offenders');
Route::match(['get','post'],'/admin_manage_offenders/{id?}', 'OffendersController@manage_offenders')->name('admin_manage_offenders');
Route::match(['get','post'],'/admin_manage_payments/{id?}', 'OffendersController@manage_payments')->name('admin_manage_payments');

Route::match(['get','post'],'/admin_new_message/{id?}', 'OffendersController@new_message')->name('admin_new_message');
Route::match(['get','post'],'/admin_manage_message/{id?}', 'OffendersController@manage_message')->name('admin_manage_message');

Route::match(['get','post'],'/admin_new_emblem/{id?}', 'EmblemController@add_emblem')->name('admin_new_emblem');
Route::match(['get','post'],'/admin_manage_emblem/{id?}', 'EmblemController@manage_emblem')->name('admin_manage_emblem');
Route::get('/admin_view_purchases/{id?}', 'EmblemController@view_purchases')->name('admin_view_purchases');


//User routes begins here
Route::get('/user_index', 'UserController@index')->name('user.index');
Route::match(['get','post'],'/view_vehicles', 'UserController@view_vehicles')->name('view_vehicles');
Route::match(['get','post'],'/view_messages/{id?}', 'UserController@view_messages')->name('view_messages');
Route::match(['get','post'],'/view_offences/{id?}', 'UserController@view_offences')->name('view_offences');

Route::match(['get','post'],'/profile', 'UserController@profile')->name('profile');
Route::match(['get','post'],'/edit_profile', 'UserController@edit_profile')->name('edit_profile');



//transaction  controller beginds
Route::match(['get','post'],'/make_payment', 'PaymentController@payments')->name('make_payment');
Route::get('/get_receipt/{id?}', 'PaymentController@receipt')->name('get_receipt');

//buy eblem starts
Route::match(['get','post'],'/buy_emblems', 'TransactionController@buy_emblem')->name('buy_emblem');
Route::get('/emblem_receipt/{id?}', 'TransactionController@emblem_receipt')->name('emblem_receipt');
