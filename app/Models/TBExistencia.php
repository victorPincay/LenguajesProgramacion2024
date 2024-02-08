<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TBExistencia extends Model
{
    use HasFactory;

    protected $table = 'TBExistencia';
    protected $primaryKey = null;
    public $timestamps = false;
}