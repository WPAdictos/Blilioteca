<?php

require_once("./config.php");

/*
Recursos de teoria y lectura: tutorial de PDO: https://diego.com.es/tutorial-de-pdo
*/

/*
Estructura de las tablas


CREATE TABLE `coches` (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `marcamodelo` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `matricula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `idConductor` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

CREATE TABLE `conductores` (
  `id` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `dni` varchar(20) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



Error de los get : https://stackoverflow.com/questions/38462131/indirect-modification-of-overloaded-property-app-categorythesizes-has-no-effe

*/

// Clases de Ejemplo
//--------------------------------------------------------------------------------------------------------------------------

class Conductor{
    private $nombre;
    private $dni;
    private $lastID;   //Se utiliza para recuperar el ID de la BBDD despues de insercion

    function __construct(){

    }
    
    function &__get($prop)
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

class Coche{
    private $marcaModelo;
    private $conductor;
    private $matricula;

    function __construct($matricula,$marcaModelo){
      $this->matricula=$matricula;
      $this->marcaModelo=$marcaModelo;
    }

    function setConductor(Conductor $conductor){
        $this->conductor=$conductor;
    }

    function &getConductor(){
        return $this->conductor;
    }

    function &__get($prop)
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

///--------------------------------------------------------------------------------------------
//Programa Principal

//Conexion a la BBDD
try {
    $conexion = new PDO($dsn, $user, $password);                         //creamos el Objeto conexion a la DDBB
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Gestion de Excepciones o errores
    echo "Conectado a la BBDD... <br>";

    
    // Insercion de un registro Conductor y Coche Basica
    $conductor= new Conductor();
    $conductor->nombre="Luis";
    $conductor->dni="C237377373";
    $coche= new Coche("HB-3434-3","Seat 11");
    

    $reg = $conexion->prepare("INSERT INTO Conductores(nombre, dni) VALUES (:nombre, :dni)");
    //Bind de parametros
    $reg->bindParam(':nombre', $conductor->nombre);
    $reg->bindParam(':dni', $conductor->dni);
    // Ejecutamos
    if ($reg->execute())  echo "Se ha insertado el registro Conductor de forma correcta.<br>";
    $conductor->lastID = $conexion->lastInsertId();  //Guardamos el ultimo id del registro al insertarlo
    $coche->setConductor($conductor); 

    //Insertamos el coche
    $reg = $conexion->prepare("INSERT INTO Coches(marcamodelo, matricula, idconductor) VALUES (:marcamodelo, :matricula, :idconductor)");
    //Bind de parametros
    $reg->bindParam(':marcamodelo', $coche->marcaModelo);
    $reg->bindParam(':matricula', $coche->matricula);
    $reg->bindParam(':idconductor', $coche->getConductor()->lastID);
    if ($reg->execute())  echo "Se ha insertado el registro Coche de forma correcta.<br>";

    //-----------------------------------------------------------------------------------------------------------------------
    //modificacion de un regsitro

    //Modificamos el resgitro con ID=7 la matricula
    $sql = "UPDATE `Coches` SET `matricula`='XXXXXXX' WHERE `id`=7";
    if ($conexion->exec($sql)){
        echo "<hr> Se ha actualizado el registro con Id= 7 de forma correcta";
    }

    //-----------------------------------------------------------------------------------------------------------------------
    //Borrado de registros usaremos transaciones ya que vamos a borrar dos regsitros
    $conexion->beginTransaction();
    $sql = "DELETE FROM Coches  WHERE id=8";
    echo "<br>Borrando el registro 8 de Coches= " . $conexion->exec($sql);
    $sql = "DELETE FROM Conductores  WHERE id=14";
    echo "<br>Borrando el registro 14 de Conductores= " . $conexion->exec($sql);
    $conexion->commit();



} catch (PDOException $e){
  echo $e->getMessage();
  $conexion->rollback();
}
$conexion=null;  //Se cierra la conexion

