<?php

Route::get('profile', function () {
    return redirect(route('profile.show', auth()->id()));
});

Route::get('profile/{user}', function ($user) {
    $user = \App\User::find($user);
    return view('destiny::profile')->with(['user' => $user]);
})->name('profile.show');

Route::get('profile/{user}/avatar', function ($user) {
    $user = \App\User::find($user);
    return Storage::download('avatars/' . $user->avatar);
})->name('profile.avatar');

Route::get('profile/{user}/banner', function ($user) {
    $user = \App\User::find($user);
    return Storage::download('banners/' . $user->banner);
})->name('profile.banner');

Route::get('settings', function() {
    $user = auth()->user();
    return view('destiny::settings')->with(['user' => $user]);
});