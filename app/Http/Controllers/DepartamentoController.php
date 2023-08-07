<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartamentoRequest;
use App\Interfaces\DepartamentoRepositoryInterface;
use App\Repositories\DepartamentoRepository as RepositoriesDepartamentoRepository;
use Illuminate\Http\Response;

class DepartamentoController extends Controller
{
    protected RepositoriesDepartamentoRepository $departamentoRepository;

    public function __construct(DepartamentoRepositoryInterface $departamentoRepository)
    {
        $this->departamentoRepository = $departamentoRepository;
    }
   
    public function index()
    {
        return response()->json([
            'data' => $this->departamentoRepository->getAllDepartamentos()
        ]);
    }

    public function store(DepartamentoRequest $request)
    {
        $validated = $request->validated();
        return response()->json(
            [
                'data'=> $this->departamentoRepository->createDepartamento($validated)
            ]
        ,Response::HTTP_CREATED); 
    }

    public function show(string $id)
    {
        return response()->json(
            [
                'data'=> $this->departamentoRepository->getDepartamentoById($id)
            ]);
    }

    public function update(string $id, DepartamentoRequest $request)
    { 
        $validated = $request->validated();
        return response()->json(
            [
                'data'=>$this->departamentoRepository->updateDepartamento($id,$validated)
            ]);
    }

    public function destroy (string $id){
        $this->departamentoRepository->deleteDepartamento($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}