<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function index()
    {
        $puesto = Puesto::all();
        return view('puesto.index', compact('puesto'));
    }
    public function show($id)
    {
        $puesto = Puesto::find($id);

        if (!$puesto) {
            return redirect()->route('departamento.index')->with('error', 'puesto no encontrado.');
        }

        $puesto = collect([$puesto]);

        return view('puesto.index', compact('puesto'));
    }


    public function create()
    {
        return view('puesto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);
        Puesto::create($request->all());
        return redirect()->route('puesto.index')->with('success', 'Puesto creado correctamente.');
    }

    public function edit(Puesto $puesto)
    {
        return view('puesto.edit', compact('puesto'));
    }

    public function update(Request $request, Puesto $puesto)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);
        $puesto->update($request->all());
        return redirect()->route('puesto.index')->with('success', 'Puesto actualizado correctamente.');
    }

    public function destroy(Puesto $puesto)
    {
        $puesto->delete();
        return redirect()->route('puesto.index')->with('success', 'Puesto eliminado correctamente.');
    }
}
