<?php

namespace App\DTOs;

class puestoDTO
{
    public $id;
    public $nombre;
    public $departamento_id;
    public $departamento;

    public function __construct($id, $nombre, $departamento_id, $departamento)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->departamento_id = $departamento_id;
        $this->departamento = $departamento;
    }
    public static function fromModel($puesto)
    {
        return new self(
            $puesto->id,
            $puesto->nombre,
            $puesto->departamento_id,
            $puesto->departamento
        );
    }
    public static function collection($puesto)
    {
        return $puesto->map(fn($p) => self::fromModel($p));
    }
}
