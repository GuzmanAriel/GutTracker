<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    //

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'overall_symptom' => 'required | integer',
            'abdominal_symptom' => 'required | integer'
        ]);
        ;

        $attributes['user_id'] = auth()->id();
        $attributes['symptom_time'] = Carbon::now('UTC')->toDateTimeString();

        Symptom::create($attributes);

        return redirect('/calendar');
    }
}
