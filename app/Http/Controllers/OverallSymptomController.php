<?php

namespace App\Http\Controllers;

use App\Models\OverallSymptom;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OverallSymptomController extends Controller
{
    //

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'overall_symptom' => 'required | integer',
        ]);
        ;

        $attributes['user_id'] = auth()->id();
        $attributes['overall_symptom_time'] = Carbon::now('UTC')->toDateTimeString();

        OverallSymptom::create($attributes);

        return redirect('/calendar');
    }
}
