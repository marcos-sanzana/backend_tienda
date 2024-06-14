<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    use HasFactory;
    protected $table = 'sucursales';
    protected $primaryKey = 'id';
    protected $fillable =['id',
                          'nombre',
                          'region'];
    public $timestamps = false;
    public function scopeId($query, $id)
    {
        if(!is_null($id))
        {
            return $query->where('id',$query);
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
    public function scopeRegion($query, $region)
    {
        if(!is_null($region))
        {
            return $query->where('region','LIKE','%'.$region.'%');
        }
    }
}