<?php
namespace App\DTO;

class EmpleadoDTO
{
    public string $name;
    public string $email;
    public string $phone;
    public int $departament_id;

    public function __construct(string $name, string $email, string $phone, int $departament_id)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->departament_id = $departament_id;
    }
}