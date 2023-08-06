<?php

namespace App\Repositories;

use App\Interfaces\DepartamentoRepositoryInterface;
use App\Models\Departamento;

class DepartamentoRepository implements DepartamentoRepositoryInterface
{
    public function getAllDepartamentos()
    {
        return Departamento::all();
    }

    public function getDepartamentoById($departamentoId)
    {
        return Departamento::findOrFail($departamentoId);
    }

    public function deleteDepartamento($departamentoId)
    {
        Departamento::destroy($departamentoId);
    }

    public function createDepartamento(array $departamentoDetails)
    {
        return Departamento::create($departamentoDetails);
    }

    public function updateDepartamento($departamentoId, array $newDetails)
    {
        return Departamento::whereId($departamentoId)->update($newDetails);
    }
   
}