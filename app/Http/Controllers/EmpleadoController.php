<?php

namespace App\Http\Controllers;

use App\DTO\EmpleadoDTO;
use App\Interfaces\EmpleadoRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            'departament_id'=>'required|numeric'
        ];
        $validator = Validator::make($request->input(),$rules);
        if ($validator->fails()){
            return response()->json([
                'status'=>true,
                'menssage'=>$validator->errors()->all()
            ],400); 
        }

        return response()->json(
            [
                'data'=> $this->empleadoRepository->createEmpleado($request->input())
            ]
        ,Response::HTTP_CREATED); 
    }

    public function show(string $id)
    {
        return response()->json(
            [
                'data'=> $this->empleadoRepository->getEmpleadosById($id)
            ]);
    }

    public function update(Request $request, Empleado $empleado)
    {
       /* $rules= [
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
        }*/
        
        return response()->json(
             [
                 'data'=>$this->empleadoRepository->updateEmpleado($empleado->id,$request->input())
             ]);
    }

    public function destroy(string $id)
    {
        $this->empleadoRepository->deleteEmpleado($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    /*public function empleadoDepartamento(){
        $empleados = Empleado::select(DB::raw('count(empleados.id) as count',
        'departamentos.name'))
        ->join('departamentos','departamentos.id','=','empleados.departament_id')
        ->groupBy('departamentos.name')
        ->get();
        
        return response()->json($empleados);
    }*/
}
