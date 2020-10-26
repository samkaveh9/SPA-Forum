<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Notifications\HasDatabaseNotifications;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::apiResources([
    'question' => 'API\QuestionController',
    'categories' => 'API\CategoryController',
    'question/{question}/reply' => 'API\ReplyController'
]);

Route::post('likes/{reply}','API\LikeController@likeIt')->name('likes.likeIt');
Route::delete('likes/{reply}','API\LikeController@unLikeIt')->name('likes.unLikeIt');

// Route::post('notifications','API\NotificationController@index');

Route::post('notifications',function(){

    return[
            'read' => auth()->user()->readNotifications(),
            'unread' => auth()->user()->unreadNotifications(),
    ];
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'Auth\AuthController@login');
    Route::post('signup', 'Auth\AuthController@signup');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');

});