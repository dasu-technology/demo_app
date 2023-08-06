<?php

namespace App\Interfaces;

interface EmpleadoRepositoryInterface
{
    public function getAllEmpleados();

    public function getEmpleadosById($empleadoId);

    public function deleteEmpleado($empleadoId);

    public function createEmpleado(array $EmpleadoDetails);

    public function updateEmpleado($empleadoId, array $newDetails);

}