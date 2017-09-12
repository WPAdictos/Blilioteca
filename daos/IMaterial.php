<?php

interface IMaterial{

    public function AllMateriales();
    public function MaterialById($id);
    public function insertMaterial($material);
    public function deleteMaterial($id);
    public function updateMaterial($material);
    public function findMateriales($condiciones);

}