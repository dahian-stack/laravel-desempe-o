<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personal extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'personal';
    protected $primaryKey = 'ID_personal';

    protected $fillable = [
        'Nombres',
        'Apellidos',
        'Especialidad',
        'Experiencia',
        'Portafolio',
        'Disponibilidad',
        'Tarifa',
        'Contacto',
    ];

    public function planes_rodaje(): HasMany
    {
        return $this->hasMany(
            PlanRodaje::class,
            'ID_personal',
            'ID_personal'
        );
    }
}

