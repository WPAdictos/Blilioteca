<?php


class PrestamoDao implements IPrestamo
{
    public function AllPrestamos()
    {
        //Devuelve todos los usuarios
        $data_source= new Datasource();
        return  $data_source->getUsers();
    }

    public function PrestamoById($id)
    {
        //Devuelve el usuario con $ID
        $data_source= new Datasource();
        return $data_source->getUserById($id);
    }

    public function insertPrestamo($usuario)
    {
        //Inserta un usuario
        $data_source= new Datasource();
        return $data_source->insertUser($usuario);
    }
   
    public function deletePrestamo($id)
    {
        //Borra un usuario con un ID
        $data_source= new Datasource();
        return $data_source->deleteUser($id);
    }

    public function updatePrestamo($usuario)
    {
        //Actualiza los datos de un usuario
     
        $data_source= new Datasource();
        return $data_source-> updateUser($usuario);
    }
}
