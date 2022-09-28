<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SymptomController;
use App\Models\Meal;
use App\Models\Stool;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::name('save.')->prefix('save')->group(function () {

    Route::post('/symptoms', [SymptomController::class, 'store'])->name('symptoms');
});

Route::get('register', function(){
    return Inertia::render('Register');
});

Route::middleware('auth')->group(function(){




    Route::get('/', function () {
        return Inertia::render('Home', [

        ]);
    });


    Route::middleware('auth')->get('/calendar', function (User $user, Meal $meal, Stool $stool,
        Symptom $symptom) {
        return Inertia::render('Calendar', [
            'meals' => Auth::user()->meals->map(function ($meal) {
                return [
                    'id' => $meal->id,
                    'description' => $meal->description,
                    'meal_time' => \Carbon\Carbon::parse($meal->meal_time)->diffForHumans(),
                ];
            }),
            'stools' => Auth::user()->stools->map(function($stool){

                return [
                    'id' => $stool->id,
                    'stool_symptom' => $stool->stool_symptom,
                    'stool_time' => \Carbon\Carbon::parse($stool->stool_time)->diffForHumans(),
                ];
            }),
            'symptoms' => Auth::user()->symptoms->map(function($symptom){

                return [
                    'id' => $symptom->id,
                    'symptom_time' => \Carbon\Carbon::parse($symptom->symptom_time)->diffForHumans(),
                    'overall_symptom' => $symptom->overall_symptom,
                    'abdominal_symptom' => $symptom->abdominal_symptom,
                    'bloating_symptom' => $symptom->bloating_symptom,
                    'brain_symptom' => $symptom->brain_symptom,
                    'discomfort_symptom' => $symptom->discomfort_symptom,
                    'fatigue_symptom' => $symptom->fatigue_symptom,
                ];
            }),
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

