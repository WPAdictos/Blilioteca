<?php
require_once("./autoload.php");



$dvd = new DVD("star Wars",1976,120);

print_r($dvd);
echo "<br>";



$libro = new Libro("El Señor de os anillos", 2000, "Salvat");
print_r( $libro);