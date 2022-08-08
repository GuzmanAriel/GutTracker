<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');



    Route::get('/', function () {
        return Inertia::render('Home', [

        ]);
    });

    Route::get('/users', function () {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                           ->when(Request::input('search'), function ($query, $search) {
                               $query->where('name', 'like', "%{$search}%");
                           })
                           ->paginate(10)
                           ->withQueryString()
                           ->through(fn($user) => [
                               'id' => $user->id,
                               'name' => $user->name
                           ]),

            'filters' => Request::only(['search'])
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

    Route::get('users/create', function () {
        return Inertia::render('Users/Create');
    });

    Route::post('/users', function () {

        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        User::create($attributes);

        return redirect('/users');
    });


