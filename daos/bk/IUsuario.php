<?php

interface IUsuario{

    public function AllUsuarios();
    public function UsuarioById($id);
    public function insertUsuario($usuario);
    public function deleteUsuario($id);
    public function updateUsuario($usuario);
    public function findUsuarios($condiciones);

}