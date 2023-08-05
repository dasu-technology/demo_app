<?php

namespace App\Http\Controllers;
use BD;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $empleados = Empleado::select('empleados.*','departamentos.name as departamento')
       ->join('departamento','departamento.id','=','empleados.departamento_id')
       ->paginate(10);
       return response()->json($empleados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules= [
            'name'=> 'required|string|min:1|max:100',
            'email'=>'required|email|max:80',
            'phone'=>'required|max:15',
            'departamento_id'=>'required|numeric'
        ];
        $validator = Validator::make($request->input(),$rules);
        if ($validator->fails()){
            return response()->json([
                'status'=>true,
                'menssage'=>$validator->errors()->all()
            ],400); 
        }
        return response()->json([
            'status'=>true,
            'menssage'=>'Empleado creado satisfactoriamente.'
        ],200); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        return response()->json($empleado, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $rules= [
            'name'=> 'required|string|min:1|max:100',
            'email'=>'required|email|max:80',
            'phone'=>'required|max:15',
            'departamento_id'=>'required|numeric'
        ];
        $validator = Validator::make($request->input(),$rules);
        if ($validator->fails()){
            return response()->json([
                'status'=>true,
                'menssage'=>$validator->errors()->all()
            ],400); 
        }
        $empleado->update($request->input());
        return response()->json([
            'status'=>true,
            'menssage'=>'Empleado actualizado satisfactoriamente.'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return response()->json([
            'status'=>true,
            'menssage'=>'Empleado eliminado satisfactoriamente.'
        ],200);
    }

    
}
