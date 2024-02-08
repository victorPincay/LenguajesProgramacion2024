<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class TBMovimientoCAB extends Model
{
    use HasFactory;

    protected $table = 'TBMovimientoCAB';
    protected $primaryKey = 'DocumentoID';
    protected $guarded = [];
    public $timestamps = false;

    public function detalles(): HasMany {
        return $this->hasMany(TBMovimientoDET::class, 'DocumentoID', 'DocumentoID');
    }
}