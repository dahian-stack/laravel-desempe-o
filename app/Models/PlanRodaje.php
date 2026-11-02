<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanRodaje extends Model
{
    protected $table = 'plan_rodaje';
    protected $primaryKey = 'ID_plan';

    public $timestamps = false;

    protected $fillable = [
        'ID_produccion',
        'ID_localizacion',
        'ID_personal',
        'Fecha',
        'Hora_inicio',
        'Hora_fin',
        'Eficiencia',
        'Requerimientos',
        'Plan_contingencia',
    ];

    public function produccion(): BelongsTo
    {
        return $this->belongsTo(
            Produccion::class,
            'ID_produccion',
            'ID_produccion'
        );
    }

    public function localizacion(): BelongsTo
    {
        return $this->belongsTo(
            Localizacion::class,
            'ID_localizacion',
            'ID_localizacion'
        );
    }

    public function personal(): BelongsTo
    {
        return $this->belongsTo(
            Personal::class,
            'ID_personal',
            'ID_personal'
        );
    }
}
