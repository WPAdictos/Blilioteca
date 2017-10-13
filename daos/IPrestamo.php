<?php
// Interface del Dao de Prestamos

interface IPrestamo{

    public function AllPrestamos();
    public function PrestamoById(int $id);
    public function insertPrestamo(Usuario $usuario, array $material);
    public function deletePrestamo(int $id);
    public function updatePrestamo(Prestamo $prestamo);
   
}