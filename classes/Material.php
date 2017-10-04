<?php
abstract class Material
{
    protected $titulo;
    protected $anno;
    protected $id;
    protected $tipo;
    protected $stock;      //Stock añadido SPRINT 4
    private static $contadorID=0; // Simulamos el generador de ID's autonumerico
    

    function __construct($titulo,$anno)
    {
        $this->id=++self::$contadorID;  // generamos y guardamos el ID autonumerico
        $this->titulo=$titulo;
        $this->anno=$anno;
        $this->stock=0;   //Añadido SPRINT 4
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