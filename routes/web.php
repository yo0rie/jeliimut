<?php

use App\Models\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('profile', [
        'profile' => Profile::query()->first(),
    ]);
});
