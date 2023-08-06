<?php

namespace App\Repositories;

use App\DTO\EmpleadoDTO;
use App\Interfaces\EmpleadoRepositoryInterface;
use App\Models\Empleado;

class EmpleadoRepository implements EmpleadoRepositoryInterface
{
    public function getAllEmpleados()
    {
        return Empleado::select('empleados.*','departamentos.name as departamento')
        ->join('departamentos','departamentos.id','=','empleados.departament_id')
        ->get();
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