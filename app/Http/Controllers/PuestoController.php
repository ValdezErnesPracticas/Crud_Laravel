<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function index()
    {
        $puesto = Puesto::with('departamento:id,nombre')->get();

        return ( compact('puesto'));
    }
    public function show($id)
    {
        $puesto = Puesto::with('departamento:id,nombre')->find($id);

        if (!$puesto) {
            return response()->json(['error' => 'puesto no encontrado.']);
        }

        $puesto = collect([$puesto]);

        return (compact('puesto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);
        
        Puesto::create($request->all());
        return response()->json(['success' => $request->all()]);
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
