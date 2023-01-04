<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory;
    use SoftDeletes;

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
