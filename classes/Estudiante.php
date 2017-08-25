<?php


class Estudiante extends Usuario{
    protected $edad;
    protected $numeroMatricula;

    function __construct($nombre,$edad,$matricula)
    {
        parent::__construct($nombre);
        $this->tipo=__CLASS__;
        $this->edad=$edad;
        $this->numeroMatricula=$matricula;
    }

    public  function __toString(){
        return "Estudiante con ID= $this->id con Nombre = $this->nombre Edad = $this->edad y numero de matricula = $this->numeroMatricula <br>";
    }
}