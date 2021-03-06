<?php


class UsuarioDao implements IUsuario{
    
    public function AllUsuarios(){
         //Devuelve todos los usuarios
         echo "Seleccionando usuarios <br>";
         $data_source= new Datasource();
         $result= $data_source->ejecutarConsulta("SELECT * FROM Usuarios");
         return $result;
    }

    public function UsuarioById($id){
       //Devuelve el usuario con $ID
       echo "Seleccionando usuarios por ID = $id <br>";
       $data_source= new Datasource();
       $result= $data_source->ejecutarConsulta("SELECT * FROM Usuarios where ID=". $id);
       return $result;
    }

    public function insertUsuario($usuario){
        //Inserta un usuario
        echo "Insertando usuarios <br>";
        $data_source= new Datasource();
        $result= $data_source-> ejecutarActualizacion("INSERT INTO Usuarios VALUES",$usuario);
        return $result;
    }
    
    public function deleteUsuario($id){
        //Borra un usuario con un ID
        echo "Borrando usuarios <br>";
        $data_source= new Datasource();
        $result= $data_source-> ejecutarActualizacion("DELETE FROM Usuarios WHERE ID=" . $id, array("id"=>$id));
        return $result;

    }

    public function updateUsuario($usuario){
        //Actualiza los datos de un usuario
        echo "Actualizando usuarios <br>";
        $data_source= new Datasource();
        $result= $data_source-> ejecutarActualizacion("UPDATE Usuarios SET",$usuario);
        return $result;
    }

    public function findUsuarios($condiciones){
        //Consulta usuarios por varias condiciones
        echo "Consultando por varias condiciones <br>";
        $data_source= new Datasource();
        $condicion="";
        /*
          Aqui se construye la condicion, por ejemplo,las condiciones vienen por $condiciones y en
          $condicion constrimos la SELECT para enviar a la BBDD
          $condicion= "WHERE tipousuario='Estudiante' AND nombre like 'Pepe'"

        */

        $result= $data_source->ejecutarConsulta("SELECT * FROM Usuarios  ". $condicion);
        return $result;
    }

}