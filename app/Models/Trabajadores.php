<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajadores extends Model
{
    use HasFactory;
    protected $table = 'trabajadores';
    protected $primaryKey = 'id';
    protected $fillable = ['id',
                           'nombre'];
    public $timestamps = false;
    public function scopeId($query, $id)
    {
        if(!is_null($id))
        {
            return $query->where('id',$id);
        }
        return $query;
    }
    public function scopeNombre($query, $nombre)
    {
        if(!is_null($nombre))
        {
            return $query->where('nombre','LIKE','%'.$nombre.'%');
        }
        return $query;
    }
    //Relaciones
    public function sucursalesHasTrabajadores()
    {
        return $this->belongsToMany('App\Models\Sucursales','sucursales_has_trabajadores','trabajador_id','sucursal_id');
    }
}