<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    
protected $table ="departamento";
    protected $fillable = ["nombre","descripcion","subcuenta"];
    public function Puestos(){
        return $this->hasMany(Puesto::class);
    }
}
