<?php

class Prestamo{

    static $contadorID=0; // Simulamos el generador de ID's autonumerico
    private $id;
    private $idUsuario;
    private $idMaterial;
    private $fechaSalida;  //Fecha salida de la biblioteca
    private $fechaRegreso; //Fecha entrega biblio

    function __construct()
    {
        $this->id=++self::$contadorID;  // generamos y guardamos el ID autonumerico
    }

    function __get($prop)
    {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }else return null;
    }
    
    function __set($prop,$valor){
        if (property_exists($this,$prop))
           $this->$prop=$valor;
    }
    
}