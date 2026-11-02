<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipoTecnico extends Model
{
    protected $table = 'equipo_tecnico';
    protected $primaryKey = 'ID_equipo';

    public $timestamps = false;

    protected $fillable = [
        'Categoria',
        'Marca',
        'Modelo',
        'Caracteristicas',
        'Estado',
        'Disponibilidad',
    ];
}
