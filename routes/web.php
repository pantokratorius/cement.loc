<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
      return Cache::rememberForever('cement_page', function () {
        $html = view('welcome')->render();
        return Response::make($html)
            ->header('Cache-Control', 'public, max-age=604800'); // cache in browser 7 days
    });
});


// php8.4 artisan cache:forget cement_page 

// php8.4 artisan view:cache
// php8.4 artisan route:cache



