<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'ID_cliente';

    public $timestamps = false;

    protected $fillable = [
        'Nombre',
        'Tipo',
        'Contacto',
        'user_id',
    ];

    public function producciones(): HasMany
    {
        return $this->hasMany(
            Produccion::class,
            'ID_cliente',
            'ID_cliente'
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }
}
