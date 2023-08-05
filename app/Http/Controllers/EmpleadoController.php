<?php

namespace App\Http\Controllers;

use App\Interfaces\EmpleadoRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
    protected EmpleadoRepositoryInterface $empleadoRepository;

    public function __construct(EmpleadoRepositoryInterface $empleadoRepository)
    {
        $this->empleadoRepository = $empleadoRepository;
    }
   
    public function index()
    {
      return response()->json([
            'data' => $this->empleadoRepository->getAllEmpleados()
        ]);
    }

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
        $empleado= new Empleado($request->input());
        $empleado->save();
        return response()->json([
            'status'=>true,
            'menssage'=>'Empleado creado satisfactoriamente.'
        ],200); 
    }

    public function show(Empleado $empleado)
    {
        return response()->json($empleado, 200);
    }

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

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return response()->json([
            'status'=>true,
            'menssage'=>'Empleado eliminado satisfactoriamente.'
        ],200);
    }

    /*public function empleadoDepartamento(){
        $empleados = Empleado::select(DB::raw('count(empleados.id) as count',
        'departamentos.name'))
        ->join('departamentos','departamentos.id','=','empleados.departament_id')
        ->groupBy('departamentos.name')
        ->get();
        
        return response()->json($empleados);
    }*/

    public function findAll()
    {
       $empleados = Empleado::select('empleados.*','departamentos.name as departamento')
       ->join('departamentos','departamentos.id','=','empleados.departament_id')
       ->get();
       return response()->json($empleados);
    }
}
