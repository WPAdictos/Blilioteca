<?php


class UsuarioDao implements IUsuario{
    
    public function AllUsuarios(){
         //Devuelve todos los usuarios 
         $data_source= new Datasource();
         return  $data_source->getUsers();
    }

    public function UsuarioById(int $id){
       //Devuelve el usuario con $ID
       $data_source= new Datasource();
       return $data_source->getUserById($id);
       
    }

    public function insertUsuario(Usuario $usuario){
        //Inserta un usuario
        $data_source= new Datasource();
        return $data_source->insertUser($usuario);
    }
    
    public function deleteUsuario(int $id){
        //Borra un usuario con un ID
        $data_source= new Datasource();
        return $data_source->deleteUser($id);
        
    }

    public function updateUsuario(Usuario $usuario){
        //Actualiza los datos de un usuario
      
        $data_source= new Datasource();
        return $data_source-> updateUser($usuario);
        
    }

}