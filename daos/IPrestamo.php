<?php

interface IPrestamo{

    public function AllPrestamos();
    public function PrestamoById($id);
    public function insertPrestamo($prestamo);
    public function deletePrestamo($id);
    public function updatePrestamo($prestamo);
   
}