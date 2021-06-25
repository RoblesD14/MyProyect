<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Servicio extends Model
{
    use HasFactory;

    protected $perPage = 20;

    protected $dates = ['fservicio'];

    protected $fillable = [
        'id','cliente_id','empleado_id','fservicio','monto',
        'categoria_id','user_id','descripcion','formapago',
        'fpago','estado'
    ];

    /**
     * Get the categoria that owns the Servicio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
