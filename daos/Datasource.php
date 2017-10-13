<?php


/*
Clase de la fuente de datos: simularemos el acceso a los datos a un array y los alamacenaremos en el Datasource
aprovechando las caracteristicas de las variables estaticas, pero los arrays los meteremos como propiedades de un objeto stdclass
de PHP para de esa manera tener mas ordenado el codigo y mas legible

Diapositiva estructura de la clase: https://docs.google.com/presentation/d/16oqqSbnMsX2P7XG1Ls87vI79st4SfHWfftD6EwsUxMU/edit?usp=sharing

La clase stdclass de php, info adicional: http://mjcarrascosa.com/la-clase-stdclass-de-php/
*/

/*
Realmente esta clase seria un patron llamado Fachada o Facade o lo que nosotros antiguamente llamabamos Wrapper, una clase
que engloba una logica mas compleja y que se puede acceder desde el exterior, simplificando la logica de las clases DAO
*/
class Datasource
{

    //Representa a toda la base de datos del sistema, todos los arrays necesarios seran propiedades de este objeto stdclass
    private static $database;

    function __construct()
    {

        if (empty(self::$database)) {
            self::$database = new stdClass();  // La clase stdclass de php, info adicional: http://mjcarrascosa.com/la-clase-stdclass-de-php/
            self::$database->usuarios= array();     //Tabla usuarios
            self::$database->materiales= array();   //Tabla materiales
            self::$database->prestamos= array(); 
            // .... añadir tantas tablas como necesarias
        }
    }

    //DEvuelve todos los usuarios
    public function getUsers()
    {
        return self::$database->usuarios;
    }
    
    //Devuelve un usuario dado por ID o falso sino esta
    public function getUserById(int $id)
    {
        foreach (self::$database->usuarios as $user) {
            if ($user->id == $id) {
                return $user;
            }
        }
        return false;
    }

    //Inserta en el array y devuelve el numero de elementos del array
    public function insertUser(Usuario $usuario)
    {
        return array_push(self::$database->usuarios, $usuario);
    }

   
    //Borrado de un usuario por un ID, devuelve true/false si se ha borrado
    public function deleteUser(int $id)
    {
        $borrado=false;
        for ($i=0; $i < count(self::$database->usuarios); $i++) {
            if (self::$database->usuarios[$i]->id == $id) {
                array_splice(self::$database->usuarios, $i, 1);
                $borrado=true;
                break;
            }
        }
        return $borrado;
    }

    //Actualizado de usuarios, devuelve true si se ha hecho de forma correcta y false sino se ha encontrado
    public function updateUser(Usuario $user)
    {
        $actualizado=false;
        for ($i=0; $i < count(self::$database->usuarios); $i++) {
            if (self::$database->usuarios[$i]->id == $user->id) {
                self::$database->usuarios[$i]=$user;
                $actualizado=true;
                break;
            }
        }
        return $actualizado;
    }

    //------------------------------------------------------------------------------------------------------------
    //Materiales Copy y paste de la de usuarios y cambiar nombres de variables y nombre acceso al array
    
    //------------------------------------------------------------------------------------------------------------

    //Devuelve todos los materiales
    public function getMateriales()
    {
        return self::$database->materiales;
    }

        //Devuelve un usuario dado por ID o falso sino esta
    public function getMaterialById(int $id)
    {
        foreach (self::$database->materiales as $mat) {
            if ($mat->id == $id) {
                return $mat;
            }
        }
        return false;
    }


    //Inserta en el array y devuelve el numero de elementos del array
    public function insertMaterial(Material $mat)
    {
        return array_push(self::$database->materiales, $mat);
    }
    
    
    //Borrado de un material por un ID, devuelve true/false si se ha borrado
    public function deleteMaterial(int $id)
    {
        $borrado=false;
        for ($i=0; $i < count(self::$database->materiales); $i++) {
            if (self::$database->materiales[$i]->id == $id) {
                array_splice(self::$database->materiales, $i, 1);
                $borrado=true;
                break;
            }
        }
        return $borrado;
    }

    //Actualizado de materiales, devuelve true si se ha hecho de forma correcta y false sino se ha encontrado
    public function updateMaterial(Material $mat)
    {
        $actualizado=false;
        for ($i=0; $i < count(self::$database->materiales); $i++) {
            if (self::$database->materiales[$i]->id == $mat->id) {
                self::$database->materiales[$i]=$mat;
                $actualizado=true;
                break;
            }
        }
        return $actualizado;
    }
    

    //-------------------------------------------------------------------------------------------------------------
    //Prestamos
    //-------------------------------------------------------------------------------------------------------------

    
    //Devuelve todos los prestamos
    public function getPrestamos()
    {
        return self::$database->prestamos;
    }

    //Devuelve un prestamo dado por ID o falso sino esta
    public function getLoanById(int $id)
    {
        foreach (self::$database->prestamos as $pres) {
            if ($pres->id == $id) {
                return $pres;
            }
        }
        return false;
    }

    //Insertamos en numero de materiales que el usuario va a realizar en el prestamo
    //Decrementar el stock del Material
    public function insertLoan(Usuario $user, array $materiales) 
    {
 
        $prestamo= new Prestamo();
        $daoMaterial= new MaterialDao();
        $prestamo->idUsuario=$user->id;  
        //REcorremos el array de materiales y si tiene stock lo vamos alamacenando en otro array temporal
        //para luego meterlo via Inyeccion de dependencias
        $materialesAux=array();
        foreach ($materiales as $mat) {
            if($mat->stock > 0){
                array_push($materialesAux,$mat);
                $mat->stock=--$mat->stock;       //Reducimos stock
                $daoMaterial->updateMaterial($mat);   //Actualizamos en la BBDD el nuevo estado de STOCK
            }
        }
        $prestamo->setMaterial($materialesAux);            //Mediante ID inyectamos los materiales que se lleva el usuario
        array_push(self::$database->prestamos, $prestamo);   //Grabamos el prestamo en el array
        
         return ;
    }



    //Borrado de un prestamo por un ID, devuelve true/false si se ha borrado
    public function deleteLoan(int $id)
    {
        $borrado=false;
        for ($i=0; $i < count(self::$database->prestamos); $i++) {
            if (self::$database->prestamos[$i]->id == $id) {
                array_splice(self::$database->prestamos, $i, 1);
                $borrado=true;
                break;
            }
        }
        return $borrado;
    }

    //Actualizado de prestamos, devuelve true si se ha hecho de forma correcta y false sino se ha encontrado
    public function updateLoan(Prestamo $pres)
    {
        $actualizado=false;
        for ($i=0; $i < count(self::$database->prestamos); $i++) {
            if (self::$database->prestamos[$i]->id == $pres->id) {
                self::$database->prestamos[$i]=$pres;
                $actualizado=true;
                break;
            }
        }
        return $actualizado;
    }
}
