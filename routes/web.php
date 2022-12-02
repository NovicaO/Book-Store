<?php

Auth::routes();


Route::get('/',function (){
return redirect('/books');
});

Route::resource('/books', 'FrontEndBooksController');

Route::get('/cart/{book}/addToCart','CartController@putInCart');

Route::get('/cart/{book}/putInCartAndShowCart','CartController@putInCartAndShowCart');

Route::get('/cart/{rowId}/removeFromCart','CartController@removeFromCart');

Route::get('/cart/{rowId}/removeAllSelectedBook','CartController@removeAllSelectedBook');

Route::get('/cart','CartController@showCart');

Route::get('/cart/empty','CartController@cartEmpty');

Route::post('/cart/placeOrder','CartController@placeOrder');

Route::post('/cart/updateCartItems','CartController@updateCartItems');




Route::get('/administration',function (){
    return view('layouts.master');
})->middleware('auth');

Route::resource('administration/books', 'BooksController');
Route::get('administration/books/{book}/removeImage','BooksController@removeImage');
Route::POST('administration/books/defaultImage','BooksController@defaultImage');


Route::resource('administration/categories', 'CategoriesController');

Route::resource('administration/publishers', 'PublishersController');

Route::resource('administration/authors', 'AuthorsController');

Route::get('/administartion/authors', 'AuthorController@create');

Route::resource('/administration/orderStatus', 'OrderStatusController');

Route::resource('/administration/orders', 'OrderController');

Route::resource('/administration/finance', 'FinanceController');

Route::resource('/administration/users','UsersController');

Route::resource('/administration/roles','RolesController');

Route::resource('/administration/users','UsersController');

Route::resource('/administration/currencies','CurrenciesController');

Route::get('/administration/user/edit','PersonalDataController@edit');

Route::patch('/administration/user/update','PersonalDataController@update');








