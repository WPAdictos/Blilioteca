<?php
require_once("./autoload.php");

/*
$estudiante= new Estudiante("Pepe",23,"X23456H");
$daoUsuario= new UsuarioDao();

$daoUsuario->insertUsuario($estudiante);


//Consultamos un usuario

$daoUsuario->UsuarioById(1);

*/

$dvd = new Dvd("El Hobbit",2015,140);
$daoMaterial= new MaterialDao();

$daoMaterial->insertMaterial($dvd);

print_r($dvd);