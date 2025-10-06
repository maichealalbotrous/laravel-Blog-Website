<?php
use App\Http\Controllers\postsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [postsController::class, 'postsAction'])->name('Allposts.index');
Route::get('posts/CreatePost', action: [postsController::class, 'CreatePost'])->name('CreatePost');

Route::post('/posts', [postsController::class, 'Store'])->name('store'); 
Route::get('/posts/{postId}/Edite', action: [postsController::class, 'Edite'])->name('EditePost');
Route::put('/posts/{postId}', action: [postsController::class, 'Update'])->name('UpdatePost');
Route::get('/posts/{postId}', action: [postsController::class, 'ShowPost'])->name('singlePost');
Route::delete('/posts/{postId}', action: [postsController::class, 'Delete'])->name(name: 'Delete');