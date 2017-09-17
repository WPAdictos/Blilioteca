<?php
require_once("./autoload.php");

echo "Insertando usuarios .. <br>";
$estudiante= new Estudiante("Pepe",23,"X23456H");
$daoUsuario= new UsuarioDao();
$daoUsuario->insertUsuario($estudiante);

$daoUsuario->insertUsuario(new Profesor("Bacterio", "Quimica", "X23456"));
$daoUsuario->insertUsuario(new Profesor("Nachete", "Matematicas", "X23456F"));

print_r($daoUsuario->AllUsuarios());
echo("<br> <hr>");

echo"Modificando un usuario .... El usuario con Id=3 <br>";
$usuario=$daoUsuario->UsuarioById(3);
$usuario->departamento="Secretaria";
$daoUsuario->updateUsuario($usuario);
print_r($daoUsuario->AllUsuarios());
echo("<br> <hr>");



echo "Borrando un usuario .. borramos el usuario con Id=2 <br>";
$daoUsuario->deleteUsuario(2);
print_r($daoUsuario->AllUsuarios());
echo("<br> <hr>");


