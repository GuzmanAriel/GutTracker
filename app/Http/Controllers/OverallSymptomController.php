<?php

namespace App\Http\Controllers;

use App\Models\OverallSymptom;
use Illuminate\Http\Request;

class OverallSymptomController extends Controller
{
    //

    public function store(Request $request)
    {
        dd('hello world');
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        OverallSymptom::create($attributes);

        return redirect('/');
    }
}
