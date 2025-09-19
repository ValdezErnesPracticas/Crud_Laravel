<?php

namespace App\DTOs;

class DepartamentoDTO
{
    public $id;
    public $nombre;
    public $subcuenta;
    public $descripcion;

    public function __construct($id, $nombre, $descripcion, $subcuenta)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->subcuenta = $subcuenta;
    }
    public static function fromModel($departamento): DepartamentoDTO
    {
        return new self(
            $departamento->id,
            $departamento->nombre,
            $departamento->descripcion,
            $departamento->subcuenta,

        );
    }
    public static function collection($departamento)
    {
        return $departamento->map(fn($d) => self::fromModel($d));
    }
}
