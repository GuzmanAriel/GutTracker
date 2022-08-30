<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stool extends Model
{
    use HasFactory;

    protected $gaurded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
