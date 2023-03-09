<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraHour extends Model
{
    use HasFactory;

    protected $fillable = ['funcionario', 'entrada', 'saida'];
}
