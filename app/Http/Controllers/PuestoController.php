<?php

namespace App\Http\Controllers;


use App\Models\Puesto;
use Illuminate\Http\Request;
use App\DTOs\puestoDTO;

class PuestoController extends Controller
{
    public function index()
    {
        $puesto = Puesto::with('departamento:id,nombre')->get();

        return response()->json(data: puestoDTO::collection($puesto));
    }
    public function show($id)
    {
        $puesto = Puesto::with('departamento:id,nombre')->find($id);

        if (!$puesto) {
            return response()->json(['error' => 'puesto no encontrado.']);
        }
        return response()->json([puestoDTO::fromModel($puesto)]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        Puesto::create($request->all());
        return response()->json(['success' => 'Creado con exito']);
    }

    public function update(Request $request, Puesto $puesto)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);
        $puesto->update($request->all());
        return response()->json(['success' => 'Puesto actualizado correctamente.']);
    }

    public function destroy(Puesto $puesto)
    {
        $puesto->delete();
        return response()->json(['success' => 'Puesto eliminado correctamente.']);
    }
}
