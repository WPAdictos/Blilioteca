<?php

interface IUsuario{

    public function AllUsuarios();
    public function UsuarioById(int $id);
    public function insertUsuario(Usuario $usuario);
    public function deleteUsuario(int $id);
    public function updateUsuario(Usuario $usuario);
    
}