<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajadoresHasSucursales extends Model
{
    use HasFactory;
    protected $table = 'sucursales_has_trabajadores';
    protected $primaryKey = 'sucursal_id';
    protected $fillable = ['sucursal_id',
                           'trabajador_id'];
    public $timestamps = false;
    public function scopeSucursalId($query, $sucursalId)
    {
        if(!is_null($sucursalId))
        {
            return $query->where('sucursa_id',$sucursalId);
        }
        return $query;
    }
    public function scopeTrabajadorId($query, $trabajadorId)
    {
        if(!is_null($trabajadorId))
        {
            return $query->where('trabador_id',$trabajadorId);
        }
        return $query;
    }
    // Relaciones
    public function sucursal()
    {
        return $this->hasMany('App\Models\Sucursales','sucursal_id');
    }
    public function trabajador()
    {
        return $this->hasMany('App\Models\Trabajadores','trabajador_id');
    }
}