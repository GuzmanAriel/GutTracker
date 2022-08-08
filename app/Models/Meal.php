<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $gaurded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setMealTimeAttribute($value) {
       $this->attributes['meal_time'] = Carbon::createFromFormat('d.m.Y HH:mm:ss', $value)->toDateString();

        return $this->attributes['meal_time'];
    }
}
