<?php


abstract class Usuario
{
    protected $nombre;
    protected $id;
    protected $tipo;
    private static $contadorID=0; // Simulamos el generador de ID's autonumerico
    

    function __construct($nombre)
    {
        $this->id=++self::$contadorID;  // generamos y guardamos el ID autonumerico
        $this->nombre=$nombre;
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
