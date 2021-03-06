<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Models\User;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SummaryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function() {
    Route::get('me', [HomeController::class, 'me']);

    Route::post('notes', [NotesController::class, 'create']);
    Route::get('notes', [NotesController::class, 'timeline']);

    Route::delete('notes/{noteId}', [NotesController::class, 'delete']);

    Route::post('notes/{noteId}/favorites', [FavoritesController::class, 'favorite']);
    Route::delete('notes/{noteId}/favorites', [FavoritesController::class, 'unfavorite']);
    Route::get('favorites', [FavoritesController::class, 'favoritedNotes']);

    Route::post('users/{userId}', [UsersController::class, 'follow']);
    Route::delete('users/{userId}', [UsersController::class, 'unfollow']);

    Route::post('notes/{noteId}/comments', [CommentController::class, 'replyToNote']);
    Route::post('notes/{noteId}/comments/{commentId}', [CommentController::class, 'replyToComment']);
    Route::delete('notes/{noteId}/comments/{commentId}', [CommentController::class, 'delete']);

    Route::get('notifications', [NotificationController::class, 'notifications']);

    Route::put('notifications/{notificationId}', [ NotificationController::class ,'read']);

    Route::get('notifications/{notificationId}', [NotificationController::class, 'find']);

    Route::post('me/profile', [UsersController::class, 'updateProfile']);

    Route::post('settings/profile', [UsersController::class, 'updateProfile']);

    Route::post('settings/profile/avatar', [UsersController::class, 'updateAvatar']);



});

Route::get('users/{userId}/followers', [UsersController::class, 'followers']);

Route::get('users/{userId}/followings', [UsersController::class, 'followings']);

Route::get('notes/{noteId}', [NotesController::class, 'get']);

Route::get('users/followers-count-ranking', [UsersController::class, 'followerCountsRanking']);


Route::get('users/{userId}', [UsersController::class, 'get']);


Route::get('users/{userId}/notes', [UsersController::class, 'notes']);

Route::get('users/{userId}/favorites', [UsersController::class, 'favoriteNotes']);


Route::get('tags', [TagsController::class, 'search']);

Route::post('notes/search-by-tag', [NotesController::class, 'searchByTag']);

Route::get('notes/{noteId}/favorites', [FavoritesController::class, 'favorites']);


Route::get('notes/{noteId}/comments', [CommentController::class, 'findAllByNote']);

Route::get('notes/{noteId}/comments/{commentId}', [CommentController::class, 'show']);
Route::get('comments/{commentId}/comments', [CommentController::class, 'findComments']);

Route::post('summaries/fetch', [SummaryController::class, 'fetch']);

Route::get('summaries/{summaryId}', [SummaryController::class, 'get']);



Route::get('csrf', [HomeController::class, 'csrfToken']);

Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [LoginController::class, 'login']);

Route::get('no-auth', function(){
    return response( json_encode(['message'=> 'login']), 401);
})->name('login');


Route::get('users-relatid-to-tags', [UsersController::class, 'relatedToTags']);













