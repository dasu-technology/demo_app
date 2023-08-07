<?php

namespace App\Repositories;

use App\Interfaces\DepartamentoRepositoryInterface;
use App\Models\Departamento;
use Throwable;

class DepartamentoRepository implements DepartamentoRepositoryInterface
{
    public function getAllDepartamentos()
    {
        try {
            return Departamento::all();
        } catch (Throwable $e) {
            report($e);
     
            return false;
        }
    }

    public function getDepartamentoById($departamentoId)
    {
        try {
            return Departamento::findOrFail($departamentoId);
        } catch (Throwable $e) {
            report($e);
     
            return false;
        }
    }

    public function deleteDepartamento($departamentoId)
    {
        try {            
            Departamento::destroy($departamentoId);
        } catch (Throwable $e) {
            report($e);
     
            return false;
        }
    }

    public function createDepartamento(array $departamentoDetails)
    {
        try {            
            return Departamento::create($departamentoDetails);
        } catch (Throwable $e) {
            report($e);     
            return false;
        }
    }

    public function updateDepartamento($departamentoId, array $newDetails)
    {
        try {
            return Departamento::whereId($departamentoId)->update($newDetails);
        } catch (Throwable $e) {
            report($e);     
            return false;
        }
    }
   
}