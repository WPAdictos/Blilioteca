<?php


class MaterialDao implements IMaterial
{
    
    public function AllMateriales()
    {
         //Devuelve todos los usuarios 
         $data_source= new Datasource();
         return  $data_source->getMateriales();
    }

    public function MaterialById(int $id)
    {
       //Devuelve el material con $ID
       $data_source= new Datasource();
       return $data_source->getMaterialById($id);
    }

    public function insertMaterial(Material $material)
    {
        //Inserta un Material
        $data_source= new Datasource();
        return $data_source->insertMaterial($material);
    }
    
    public function deleteMaterial(int $id)
    {
        //Borra un material con un ID
        $data_source= new Datasource();
        return $data_source->deleteMaterial($id);
    }

    public function updateMaterial(Material $material)
    {
        //Actualiza los datos de un material
        $data_source= new Datasource();
        return $data_source-> updateMaterial($material);
    }

}
