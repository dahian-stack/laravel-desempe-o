<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Localizacion extends Model
{
    protected $table = 'localizacion';
    protected $primaryKey = 'ID_localizacion';
    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Direccion',
        'Coordenadas',
        'Tipo',
        'Propietario',
        'Caracteristicas',
        'Permisos',
        'Estado',
        'Costo',
        'Limitaciones',
        'Facilidades',
        'Accesibilidad'
    ];

    public function planes_rodaje(): HasMany
    {
        return $this->hasMany(PlanRodaje::class, 'ID_localizacion', 'ID_localizacion');
    }
}
