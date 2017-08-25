<?php

class Profesor extends Usuario{
    protected $departamento;
    protected $numeroEmpleado;

    function __construct($nombre,$departamento,$numeroEmpleado)
    {
        parent::__construct($nombre);
        $this->tipo=__CLASS__;
        $this->departamento=$departamento;
        $this->numeroEmpleado=$numeroEmpleado;
    }

    public  function __toString(){
        return "Profesor con ID= $this->id con Nombre = $this->nombre Departamento = $this->departamento y numero de empleado = $this->numeroEmpleado <br>";
    }
}