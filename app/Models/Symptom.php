<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getOverallSymptomAttribute($value){
        $symptom = config('symptoms.overallSymptoms');
        return $symptom[$value];
    }
}
