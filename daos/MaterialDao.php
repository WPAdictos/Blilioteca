<?php


class MaterialDao implements IMaterial{
    
    public function AllMateriales(){
         //Devuelve todos los materiales
         echo "Seleccionando materiales <br>";
         $data_source= new Datasource();
         $result= $data_source->ejecutarConsulta("SELECT * FROM Materiales");
         return $result;
    }

    public function MaterialById($id){
       //Devuelve el material con $ID
       echo "Seleccionando materiales por ID = $id <br>";
       $data_source= new Datasource();
       $result= $data_source->ejecutarConsulta("SELECT * FROM Materiales where ID=". $id);
       return $result;
    }

    public function insertMaterial($material){
        //Inserta un Material
        echo "Insertando materiales <br>";
        $data_source= new Datasource();
        $result= $data_source-> ejecutarActualizacion("INSERT INTO Materiales VALUES",$material);
        return $result;
    }
    
    public function deleteMaterial($id){
        //Borra un material con un ID
        echo "Borrando material por ID <br>";
        $data_source= new Datasource();
        $result= $data_source-> ejecutarActualizacion("DELETE FROM Materiales WHERE ID=" . $id, array("id"=>$id));
        return $result;

    }

    public function updateMaterial($material){
        //Actualiza los datos de un material
        echo "Actualizando materiales <br>";
        $data_source= new Datasource();
        $result= $data_source-> ejecutarActualizacion("UPDATE Materiales SET",$material);
        return $result;
    }

    public function findMateriales($condiciones){
        //Consulta materiales por varias condiciones
        echo "Consultando por varias condiciones <br>";
        $data_source= new Datasource();
        $condicion="";
        /*
          Aqui se construye la condicion, por ejemplo,las condiciones vienen por $condiciones y en
          $condicion constrimos la SELECT para enviar a la BBDD
          $condicion= "WHERE tipousuario='DVD' AND duracion > 120"

        */

        $result= $data_source->ejecutarConsulta("SELECT * FROM Materiales  ". $condicion);
        return $result;
    }

}