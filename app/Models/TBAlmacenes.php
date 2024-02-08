<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TBAlmacenes extends Model
{
    use HasFactory;

    protected $table = 'TBAlmacenes';
    protected $primaryKey = 'AlmacenID';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;
}