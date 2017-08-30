<?php

class Dvd extends Material{

    protected $duracion;

    function __construct($titulo,$anno,$duracion)
    {
        parent::__construct($titulo,$anno);
        $this->tipo=__CLASS__;
        $this->duracion=$duracion;
    }

    public  function __toString(){
        return "DVD con ID= $this->id con Titulo = $this->titulo Año de publicacion = $this->anno y de duracion = $this->duracion <br>";
    }
}