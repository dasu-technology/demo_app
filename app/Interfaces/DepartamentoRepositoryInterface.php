<?php

namespace App\Interfaces;

interface DepartamentoRepositoryInterface
{
    public function getAllDepartamentos();

    public function getDepartamentoById($departamentoId);

    public function deleteDepartamento($departamentoId);

    public function createDepartamento(array $departamentoDetails);

    public function updateDepartamento($departamentoId, array $newDetails);

}