<?php

namespace App\Repositories;

use App\Interfaces\EmpleadoRepositoryInterface;
use App\Models\Empleado;

class EmpleadoRepository implements EmpleadoRepositoryInterface
{
    public function getAllEmpleados()
    {
        return Empleado::select('empleados.*','departamentos.name as departamento')
        ->join('departamento','departamento.id','=','empleados.departamento_id')
        ->paginate(10);
    }

    public function getEmpleadosById($empleadoId)
    {
        return Empleado::findOrFail($empleadoId);
    }

    public function deleteEmpleado($empleadoId)
    {
        Empleado::destroy($empleadoId);
    }

    public function createEmpleado(array $empleadoDetails)
    {
        return Empleado::create($empleadoDetails);
    }

    public function updateEmpleado($empleadoId, array $newDetails)
    {
        return Empleado::whereId($empleadoId)->update($newDetails);
    }
   
}