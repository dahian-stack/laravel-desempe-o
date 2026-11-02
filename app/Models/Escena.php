<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Escena extends Model
{
    protected $table = 'escena';
    protected $primaryKey = 'ID_escena';

    public $timestamps = false;

    protected $fillable = [
        'ID_produccion',
        'Descripcion',
        'Tiempo_estimado',
        'Complejidad',
        'Necesidades_especiales',
        'Estado',
    ];

    public function produccion(): BelongsTo
    {
        return $this->belongsTo(
            Produccion::class,
            'ID_produccion',
            'ID_produccion'
        );
    }
}
