<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'produccion';
    protected $primaryKey = 'ID_produccion';

    protected $fillable = [
        'ID_cliente',
        'Titulo',
        'Tipo',
        'Estado',
        'Presupuesto',
        'Fecha_inicio',
        'Fecha_fin',
        'Descripcion',
    ];

    public function cliente()
    {
        return $this->belongsTo(
            Cliente::class,
            'ID_cliente',
            'ID_cliente'
        );
    }

    public function escenas()
    {
        return $this->hasMany(
            Escena::class,
            'ID_produccion',
            'ID_produccion'
        );
    }

    public function planesRodaje()
    {
        return $this->hasMany(
            PlanesRodaje::class,
            'ID_produccion',
            'ID_produccion'
        );
    }
}
