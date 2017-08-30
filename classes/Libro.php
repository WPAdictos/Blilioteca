<?php

class Libro extends Material{

    protected $editorial;


    function __construct($titulo,$anno,$editorial)
    {
        parent::__construct($titulo,$anno);
        $this->tipo=__CLASS__;
        $this->editorial=$editorial;
        
    }

    public  function __toString(){
        return "Libro con ID= $this->id con Titulo = $this->titulo Año de publicacion = $this->anno y la editorial = $this->editorial <br>";
    }
}