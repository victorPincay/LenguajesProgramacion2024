<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TBArticulos extends Model
{
    use HasFactory;

    protected $table = 'TBArticulos';
    protected $primaryKey = 'ArticuloID';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;
}