<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::get('register', function(){
    return Inertia::render('Register');
});

Route::middleware('auth')->group(function(){



    Route::get('/', function () {
        return Inertia::render('Home', [

        ]);
    });


    Route::middleware('auth')->get('/calendar', function (User $user, Meal $meal) {
        return Inertia::render('Calendar', [
            'meals' => Auth::user()->meals->map(function ($meal) {
                return [
                    'id' => $meal->id,
                    'description' => $meal->description,
                    'meal_time' => \Carbon\Carbon::parse($meal->meal_time)->diffForHumans(),
                ];
            })
        ]);
    });


    Route::post('/users', function () {

        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        User::create($attributes);

        return redirect('/calendar');
    });

});

