<?php

/*
|--------------------------------------------------------------------------
| Iki Route nya yo bro
|--------------------------------------------------------------------------
|
| ojo lali tontoken middleware e.
|
| pisahen route gawe AJAX(api) opo sing request biasa.
| termasuk controllere ojo lali dipisah ben kepenak
|
*/

Route::get('login', ['uses' => 'GuestController@login', 'as'=>'login']);
Route::get('register', ['uses' => 'GuestController@register', 'as' => 'register']);

Route::post('auth/login', ['uses' => 'AuthController@login', 'as' => 'auth_login']);
Route::post('auth/register', ['uses' => 'AuthController@register', 'as' => 'auth_register']);
Route::get('auth/logout', ['uses' => 'AuthController@logout', 'as'=>'auth_logout']);

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'status', 'admin' => false, 'namespace' => 'User'], function(){
        Route::get('/', ['uses' => 'UserController@index', 'as' => 'user-home']);
        Route::get('u/{username}', ['uses' => 'ProfileController@index', 'as' => 'user-profile']);
        Route::get('profile/edit', ['uses' => 'SettingProfileController@index', 'as' => 'user-profile-edit']);
        Route::post('profile/edit', ['uses' => 'SettingProfileController@save', 'as' => 'user-profile-edit-save']);
        Route::get('profile/change-password', ['uses' => 'ProfileController@getPassword', 'as' => 'user-profile-edit-password']);
        Route::post('profile/change-ava', ['uses' => 'AvatarController@change', 'as' => 'user-avatar-change']);
        Route::get('message', ['uses' => 'MessageController@index', 'as'=>'user-message']);
        Route::get('message/{id}', ['uses' => 'MessageController@conversation', 'as' => 'user-conversation']);
        Route::post('message/{id}', ['uses' => 'MessageController@conversationSave', 'as' => 'user-conversation-save']);
        Route::get('search', ['uses' => 'SearchController@index', 'as' => 'user-search']);
        Route::get('upload', ['uses' => 'UploadController@index', 'as' => 'user-upload_image']);
        Route::post('upload', ['uses' => 'UploadController@upload', 'as' => 'user-upload_proses']);
        Route::get('post/{id}', ['uses' => 'PostController@single', 'as' => 'user-post-single']);
    });

    Route::group(['prefix'=>'admin','middleware' => 'status', 'admin' => true, 'namespace' => 'Admin'], function(){

        Route::get('/', ['uses' => 'HomeController@index', 'as'=>'admin-home']);
        Route::get('user/list', ['uses' => 'UserController@listUser', 'as' => 'admin-list-user']);
        Route::get('post/{id}', ['uses' => 'PostController@single', 'as' => 'admin-post-single']);
        Route::get('report/list', ['uses' => 'ReportController@listReport', 'as' => 'admin-list-report']);
        Route::get('report/{id}', ['uses' => 'ReportController@singleReport', 'as' => 'admin-single-report']);
        Route::post('report/action', ['uses' => 'ReportController@action', 'as' => 'admin-action-report']);

        Route::get('broadcast', ['uses' => 'BroadcastController@index', 'as' => 'admin-broadcast']);
        Route::post('broadcast/send', ['uses' => 'BroadcastController@send', 'as' => 'admin-broadcast-send']);
    });
});

Route::group(['prefix' => 'api', 'middleware' => 'auth'], function() {

        Route::group(['prefix' => 'user', 'namespace' => 'UserApi', 'middleware' => 'status', 'admin' => false], function() {
            //implement route for user
            Route::post('delete-post', ['uses' => 'PostController@delete', 'as' => 'api-user-delete-post']);
            Route::post('edit-caption', ['uses' => 'PostController@editCaption', 'as' => 'api-user-edit-caption']);
            Route::post('like', ['uses' => 'LikeController@like', 'as' => 'api-user-like']);
            Route::post('unlike', ['uses' => 'LikeController@unlike', 'as' => 'api-user-unlike']);
            Route::post('add-comment', ['uses' => 'CommentController@add', 'as' => 'api-user-comment']);
            Route::post('delete-comment', ['uses' => 'CommentController@delete', 'as' => 'api-user-delete-comment']);
            Route::post('follow', ['uses' => 'FriendshipController@follow', 'as' => 'api-user-follow']);
            Route::post('unfollow', ['uses' => 'FriendshipController@unfollow', 'as' => 'api-user-unfollow']);
            Route::post('send-report', ['uses' => 'ReportController@send', 'as' => 'api-user-send-report']);
            Route::post('change-password', ['uses' => 'PasswordController@change', 'as' => 'api-change-password']);
        });

        Route::group(['prefix' => 'admin', 'namespace' => 'AdminApi', 'middleware' => 'status', 'admin' => true], function(){
            //implement route for admin
            Route::post('delete-user', ['uses' => 'UserController@delete', 'as' => 'api-delete-user']);
        });
});