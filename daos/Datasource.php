<?php

/*
Clase de la fuente de datos: puede ser una BBD MySQl, un fichero  XML, Un array, etc etc
*/

class Datasource{

    private $conexion;
    private $cadenaConexion;

    function __construct(){
        //Al instanciarlo creamos una conexion
        //podriamos usar un parametro en el constructor para indicar el tipo de base de datos y asi crear conexiones a la carta

        //$this->cadenaConexion="mysql:host=localhost;dbaname=biblioteca";
        //$this->conexion= new PDO($this->cadenaConexion,"usuario","contraseña");
    }

    //Funciones con las cuales se consultara o manipulara la BBDD

    public function ejecutarConsulta($sql=""){
        //Sirve para trernos los registros de una BBD
        // devuelve de 0 a N registros

    }

    public function ejecutarActualizacion($sql="", $values){
        //Sirve para hacer actualizaciones en la DB
        //Operaciones de insercion, borrado o actualizacion
        //Devolveria si el resgistro se ha actualizado de forma correcta o no
    }

}