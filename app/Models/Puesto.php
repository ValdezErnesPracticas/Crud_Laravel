<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Puesto extends Model
{
    use SoftDeletes;
    protected $table ="puesto";
    protected $fillable = ["nombre","departamento_id"];
    public function Departamento(){
        return $this->belongsTo(Departamento::class);
    }
}
