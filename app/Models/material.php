<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'quantidade',
        'marca',
        'complemento',
    ];

    public function applicant(){
        return $this->hasMany('App\Models\Applicant');
    }
}
