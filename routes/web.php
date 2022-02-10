<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* redirect to "posts" page */

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});
/* SHOW main page - posts */
Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {
    /* SHOW / posts */
    Route::get('/', 'IndexController')->name('post.index');
    /* SHOW / posts/{post} */
    Route::get('/{post}', 'ShowController')->name('post.show');
    /* SHOW / posts/{post}/comments (post) */
    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', 'StoreController')->name('post.comment.store');
        
    });
    Route::group(['namespace' => 'Liked', 'prefix' => '{post}/liked'], function () {
        Route::post('/', 'StoreController')->name('post.liked.store');
        
    });
});
/* SHOW /personal */
Route::group([
    'namespace' => 'App\Http\Controllers\Personal', 
    'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {

        /* SHOW /personal */

    Route::group(['namespace' => 'Main', 'prefix' => 'main'], function () {
        Route::get('/', 'IndexController')->name('personal');
    });
        /* SHOW /personal/liked */

    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        /* SHOW /personal/liked */
        Route::get('/', 'IndexController')->name('personal.liked.index');
        /* SHOW /personal/liked/delete */
        Route::delete('/{post}', 'DeleteController')->name('personal.liked.delete');
    });
        /* SHOW /personal/comment */

    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}', 'DeleteController')->name('personal.comment.delete');
    });

});
/* SHOW /admin... */

Route::group([
    'namespace' => 'App\Http\Controllers\Admin', 
    'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {

        /* SHOW /admin */

    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin');;
    });

/* SHOW /admin/categories */
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
            /* SHOW /admin/categories */
            Route::get('/', 'IndexController')->name('admin.category.index');
            /* SHOW /admin/categories/create (get) */
            Route::get('/create', 'CreateController')->name('admin.category.create');
            /* SHOW /admin/categories/create (post) */
            Route::post('/', 'StoreController')->name('admin.category.store');
            /* SHOW /admin/categories/category/show */
            Route::get('/{category}', 'ShowController')->name('admin.category.show');
            /* SHOW /admin/categories/category/edit */
            Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
            /* SHOW /admin/categories/category/update */
            Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
            /* SHOW /admin/categories/category/delete */
            Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');
    });

/* SHOW /admin/tags */
       Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
            /* SHOW /admin/tags */
            Route::get('/', 'IndexController')->name('admin.tag.index');
            /* SHOW /admin/tags/create (get) */
            Route::get('/create', 'CreateController')->name('admin.tag.create');
            /* SHOW /admin/tags/create (post) */
            Route::post('/', 'StoreController')->name('admin.tag.store');
            /* SHOW /admin/tags/tag/show */
            Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
            /* SHOW /admin/tags/tag/edit */
            Route::get('/{tag}/edit', 'EditController')->name('admin.tag.edit');
            /* SHOW /admin/tags/tag/update */
            Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
            /* SHOW /admin/tags/tag/delete */
            Route::delete('/{tag}', 'DeleteController')->name('admin.tag.delete');
    });
/* SHOW /admin/posts */
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
            /* SHOW /admin/posts */
            Route::get('/', 'IndexController')->name('admin.post.index');
            /* SHOW /admin/posts/create (get) */
            Route::get('/create', 'CreateController')->name('admin.post.create');
            /* SHOW /admin/posts/create (post) */
            Route::post('/', 'StoreController')->name('admin.post.store');
            /* SHOW /admin/posts/post/show */
            Route::get('/{post}', 'ShowController')->name('admin.post.show');
            /* SHOW /admin/posts/post/edit */
            Route::get('/{post}/edit', 'EditController')->name('admin.post.edit');
            /* SHOW /admin/posts/post/update */
            Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
            /* SHOW /admin/posts/post/delete */
            Route::delete('/{post}', 'DeleteController')->name('admin.post.delete');
    });
/* SHOW /admin/users */
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        /* SHOW /admin/users */
        Route::get('/', 'IndexController')->name('admin.user.index');
        /* SHOW /admin/users/create (get) */
        Route::get('/create', 'CreateController')->name('admin.user.create');
        /* SHOW /admin/users/create (post) */
        Route::post('/', 'StoreController')->name('admin.user.store');
        /* SHOW /admin/users/user/show */
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        /* SHOW /admin/users/user/edit */
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        /* SHOW /admin/users/user/update */
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        /* SHOW /admin/users/user/delete */
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
});
});
Auth::routes([ 'verify' => true ]);

