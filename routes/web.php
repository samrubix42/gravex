<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home.home')->name('home');

Route::prefix('admin')->group(function () {
    Route::livewire('/', 'admin::dashboard.dashboard')->name('admin.dashboard');
    Route::livewire('/testimonials', 'admin::testimonial.testimonial-list')->name('admin.testimonial');
    Route::livewire('/blog-categories', 'admin::blog.blog-category-list')->name('admin.blog.categories');
});

Route::get('clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return redirect()->back();
});
