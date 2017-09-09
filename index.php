<?php
require_once("./autoload.php");


$estudiante= new Estudiante("Pepe",23,"X23456H");
$daoUsuario= new UsuarioDao();

$daoUsuario->insertUsuario($estudiante);


//Consultamos un usuario

$daoUsuario->UsuarioById(1);