<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\DTOs\DepartamentoDTO;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return response()->json(data: DepartamentoDTO::collection(departamento: $departamentos));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'subcuenta' => 'required|max:3',
        ]);

        Departamento::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Departamento creado correctamente.']);
    }

    public function show($id)
    {
        $departamento = Departamento::find($id);

        if (!$departamento) {
            return response()->json(['status' => 'error', 'message' => 'Departamento no encontrado.']);
        }
        $dep = DepartamentoDTO::fromModel($departamento);
        return response()->json([$dep]);
    }


    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'subcuenta' => 'required|max:3',
        ]);
        $departamento->update($request->all());
        return response()->json(['success' => 'Departamento actualizado correctamente.']);
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return response()->json(['success' => 'Departamento eliminado correctamente.']);
    }
}
