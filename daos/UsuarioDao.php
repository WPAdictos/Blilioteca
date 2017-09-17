<?php


class UsuarioDao implements IUsuario{
    
    public function AllUsuarios(){
         //Devuelve todos los usuarios 
         $data_source= new Datasource();
         return  $data_source->getUsers();
    }

    public function UsuarioById($id){
       //Devuelve el usuario con $ID
       $data_source= new Datasource();
       return $data_source->getUserById($id);
       
    }

    public function insertUsuario($usuario){
        //Inserta un usuario
        $data_source= new Datasource();
        return $data_source->insertUser($usuario);
    }
    
    public function deleteUsuario($id){
        //Borra un usuario con un ID
        $data_source= new Datasource();
        return $data_source->deleteUser($id);
        
    }

    public function updateUsuario($usuario){
        //Actualiza los datos de un usuario
      
        $data_source= new Datasource();
        return $data_source-> updateUser($usuario);
        
    }

}