<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return response()->json($departamentos);
    }

    public function store(Request $request)
    {
        $rules = ['name' => 'required|string|min:1|max:100'];
        $validatior= FacadesValidator::make($request->input(),$rules);
        if ($validatior->fails()){
            return response()->json([
                'status' => true,
                'errors' => $validatior->errors()->all()
            ], 400);
        }
        $departamento= new Departamento($request->input());
        $departamento->save();
        return response()->json(['status' => true,'menssage' => 'Departament created sussessfully'], 200);
    }

    public function show(Departamento $departamento)
    {
        return response()->json($departamento, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    { $rules = ['name' => 'required|string|min:1|max:100'];
        $validatior= FacadesValidator::make($request->input(),$rules);
        if ($validatior->fails()){
            return response()->json([
                'status' => true,
                'errors' => $validatior->errors()->all()
            ], 400);
        }
        $departamento->update($request->input());
        return response()->json(['status' => true,'menssage' => 'Departament update sussessfully'], 200);     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return response()->json(['status' => true,'menssage' => 'Departament delete sussessfully'], 200);
    }
}
