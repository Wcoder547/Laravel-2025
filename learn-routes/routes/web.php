<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//about route
Route::get('/about', function () {
    return view('about');
});

Route::get('/submit-form', function () {
    return "Form submitted successfully!";
});
//contact route
Route::get('/contact/social-media', function () {
    return view('contact');
});

Route::get('/user/{id?}', function ($id) {
    return "User ID is: " . $id;
});
Route::get('/post/{postId}/comment/{commentId}', function ($postId, $commentId) {
    return "Post ID: " . $postId . ", Comment ID: " . $commentId;
})->whereAlphaNumeric('postId')->whereNumber('commentId');
// Route parameter constraints
// ->numeric() ->alpha() ->alphaNumeric() ->where('id', '[0-9]+') ->where('name', '[a-zA-Z]+')

Route::get('/search/{query}', function ($query) {
    return "Search query: " . $query;
})->where('query', '.*'); // This allows any characters including slashes

Route::redirect('/old-contact', '/contact/social-media');
Route::get('/products/{category}/{id}', function ($category, $id) {
    return "Category: " . $category . ", Product ID: " . $id;
})->where(['category' => '[a-zA-Z]+', 'id' => '[0-9]+']);

Route::get('/page/path', function () {
    return "This is the page path route";
})->name('page-path');

Route::fallback(function () {
    return "404 Not Found. The page you are looking for does not exist.";
});

//grouped routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Admin Dashboard";
    });
    Route::get('/settings', function () {
        return "Admin Settings";
    });
});
