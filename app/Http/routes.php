<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PostController@index');
Route::get('/home', 'PostController@index');

Route::auth();

// logged-in-only routes
Route::group(['middleware' => ['auth']], function()
{
  // display new post form
  Route::get('new-post', 'PostController@create');
  // save new post
  Route::post('new-post', 'PostController@store');
  // edit post form
  Route::get('edit/{slug}', 'PostController@edit');
  // update post
  Route::post('update', 'PostController@update');
  // delete post
  Route::get('delete/{id}', 'PostController@delete');

  // display all posts for user
  Route::get('posts', 'UserController@posts');
  // display user's drafts
  Route::get('drafts', 'UserController@drafts');

  // add comment to post
  Route::post('comment/add', 'CommentController@store');
  // delete comment
  Route::post('comment/delete/{id}', 'CommentController@delete');
});

// get user's profile
Route::get('user/{id}', 'UserController@profile')->where('id', '[0-9]+');
// display list of posts
Route::get('user/{id}/posts', 'UserController@list_posts')->where('id', '[0-9]+');
// display a post
Route::get('/{slug}', 'PostController@show')->where('slug', '[A-Za-z0-9-_]+');
