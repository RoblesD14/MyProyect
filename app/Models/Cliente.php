<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $Nombre
 * @property $ApellidoPaterno
 * @property $ApellidoMaterno
 * @property $Ciudad
 * @property $Direccion
 * @property $Celular
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'ApellidoPaterno' => 'required',
		'ApellidoMaterno' => 'required',
		'Ciudad' => 'required',
		'Direccion' => 'required',
		'Celular' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','ApellidoPaterno','ApellidoMaterno','Ciudad','Direccion','Celular'];



}
