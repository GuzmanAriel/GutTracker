<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OverallSymptomController;
use App\Models\AbdominalSymptom;
use App\Models\BloatingSymptom;
use App\Models\BrainSymptom;
use App\Models\DiscomfortSymptom;
use App\Models\Meal;
use App\Models\OverallSymptom;
use App\Models\Stool;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


    Route::middleware('auth')->get('/calendar', function (User $user, Meal $meal, Stool $stool,
        OverallSymptom $overallSymptom, AbdominalSymptom $abdominalSymptom, BloatingSymptom $bloatingSymptom,
        BrainSymptom $brainSymptom, DiscomfortSymptom $discomfortSymptom) {
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
            'overallSymptoms' => Auth::user()->overallSymptoms->map(function($overallSymptom){

                return [
                    'id' => $overallSymptom->id,
                    'overall_symptom' => $overallSymptom->overall_symptom,
                    'overall_symptom_time' => \Carbon\Carbon::parse($overallSymptom->overall_symptom_time)->diffForHumans(),
                ];
            }),
            'abdominalSymptoms' => Auth::user()->abdominalSymptoms->map(function($abdominalSymptom){

                return [
                    'id' => $abdominalSymptom->id,
                    'abdominal_symptom' => $abdominalSymptom->abdominal_symptom,
                    'abdominal_symptom_time' => \Carbon\Carbon::parse($abdominalSymptom->abdominal_symptom_time)->diffForHumans(),
                ];
            }),
            'bloatingSymptoms' => Auth::user()->bloatingSymptoms->map(function($bloatingSymptom){

                return [
                    'id' => $bloatingSymptom->id,
                    'bloating_symptom' => $bloatingSymptom->bloating_symptom,
                    'bloating_symptom_time' => \Carbon\Carbon::parse($bloatingSymptom->bloating_symptom_time)->diffForHumans(),
                ];
            }),
            'brainSymptoms' => Auth::user()->brainSymptoms->map(function($brainSymptom){

                return [
                    'id' => $brainSymptom->id,
                    'brain_symptom' => $brainSymptom->brain_symptom,
                    'brain_symptom_time' => \Carbon\Carbon::parse($brainSymptom->brain_symptom_time)->diffForHumans(),
                ];
            }),
            'discomfortSymptoms' => Auth::user()->discomfortSymptoms->map(function($discomfortSymptom){

                return [
                    'id' => $discomfortSymptom->id,
                    'discomfort_symptom' => $discomfortSymptom->discomfort_symptom,
                    'discomfort_symptom_time' => \Carbon\Carbon::parse($discomfortSymptom->discomfort_symptom_time)->diffForHumans(),
                ];
            }),

            'fatigueSymptoms' => Auth::user()->fatigueSymptoms->map(function($fatigueSymptom){

                return [
                    'id' => $fatigueSymptom->id,
                    'fatigue_symptom' => $fatigueSymptom->fatigue_symptom,
                    'fatigue_symptom_time' => \Carbon\Carbon::parse($fatigueSymptom->fatigue_symptom_time)->diffForHumans(),
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

    Route::name('save.')->prefix('save')->group(function () {

        Route::post('/overall-symptoms', [OverallSymptomController::class, 'save'])->name('overallSymptoms');
    });

});

