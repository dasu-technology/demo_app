<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Interfaces\EmpleadoRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function store(EmpleadoRequest $request)
    {
        $validated = $request->validated();

        return response()->json(
            [
                'data'=> $this->empleadoRepository->createEmpleado($validated)
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

    public function update(string $id, EmpleadoRequest $request)
    {   
        $validated = $request->safe()->only(['name', 'email', 'phone']);
        return response()->json(
             [
                 'data'=>$this->empleadoRepository->updateEmpleado($id,$validated)
             ]);
    }

    public function destroy(string $id)
    {
        $this->empleadoRepository->deleteEmpleado($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
