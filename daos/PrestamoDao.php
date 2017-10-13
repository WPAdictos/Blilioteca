<?php
// DAO de Prestamos

class PrestamoDao implements IPrestamo
{
    public function AllPrestamos()
    {
        //Devuelve todos los prestamos
        $data_source= new Datasource();
        return  $data_source->getPrestamos();
    }

    public function PrestamoById(int $id)
    {
        //Devuelve el prestamo con $ID
        $data_source= new Datasource();
        return $data_source->getLoanById($id);
    }

    public function insertPrestamo(Usuario $usuario, array $material)
    {
        //Inserta un prestamo
        //Pero tiene que hacer una serie de operaciones:
        //Decrementar el stock del Material
        $data_source= new Datasource();
        return $data_source->insertLoan($usuario,$material);
    }
   
    public function deletePrestamo(int $id)
    {
        //Borra un prestamo con un ID
        $data_source= new Datasource();
        return $data_source->deleteLoan($id);
    }

    public function updatePrestamo(Prestamo $prestamo)
    {
        //Actualiza los datos de un prestamo
     
        $data_source= new Datasource();
        return $data_source-> updateLoan($prestamo);
    }
}
