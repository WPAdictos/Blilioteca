<?php
require_once("./autoload.php");

// Generamos la data fake para hacer las pruebas, creamos 10 usuarios aleatoriamente y 10 materiales
Factorias::generateUsers(10);
Factorias::generateMaterials(10);

// En este punto ya tenemos generadas dos tablas usuarios y materiales con 10 elementos cada uno

$usuarioDao= new UsuarioDao();
$materialDao= new MaterialDao();

//Vamos a simular el prestamo del usuario con id 5 y que va a coger un Material con el id 5
echo("Pintando usuario con Id=5....<br>");
print_r($usuarioDao->UsuarioById(5));
echo("<br><br>Pintando material con Id=5....<br>");
print_r($materialDao->MaterialById(5));

//Generamos el Prestamo y lo pintamos en pantalla
echo("<br><hr>Pintando prestamo realizado ....<br>");
$prestamoDao = new PrestamoDao();
if ($prestamoDao->insertPrestamo($usuarioDao->UsuarioById(5),$materialDao->MaterialById(5)))
    print_r($prestamoDao->PrestamoById(1)); 
    else   
    echo ("No hay stock");

//Volvemos a pintar el material con Id 5 para ver como se le ha decrementado el stock
echo("<br><hr>Pintando como quedo el stock....<br>");
print_r($materialDao->MaterialById(5));