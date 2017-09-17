<?php

interface IMaterial{

    public function AllMateriales();
    public function MaterialById(int $id);
    public function insertMaterial(Material $material);
    public function deleteMaterial(int $id);
    public function updateMaterial(Material $material);
   
}