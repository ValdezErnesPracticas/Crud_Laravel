<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamento.index', compact('departamentos'));
    }

    public function create()
    {
        return view('departamento.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'subcuenta' => 'required|max:3',
        ]);
        Departamento::create($request->all());
        return redirect()->route('departamento.index')->with('success', 'Departamento creado correctamente.');
    }

    public function edit(Departamento $departamento)
    {
        return view('departamento.edit', compact('departamento'));
    }
    public function show($id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return redirect()->route('departamento.index')->with('error', 'Departamento no encontrado.');
        }

        $departamentos = collect([$departamento]);

        return view('departamento.index', compact('departamentos'));
    }


    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'subcuenta' => 'required|max:3',
        ]);
        $departamento->update($request->all());
        return redirect()->route('departamento.index')->with('success', 'Departamento actualizado correctamente.');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamento.index')->with('success', 'Departamento eliminado correctamente.');
    }
}
