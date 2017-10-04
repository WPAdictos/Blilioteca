<?php
// Factorias de ayuda, para crear la dummy data

class Factorias{


    //crea aleatoriamente N numero de usuarios
    //por ejemplo cuando sea par creamos un tipo y cuando sea impar otro
    public static function generateUsers(int $num){
        
        $daoUsuario= new UsuarioDao();
        for($i=1; $i <= $num; $i++ ){
            if($i%2==0){  // es par creamos por ejemplo un estudiante
                $estudiante= new Estudiante("Nombre".$i,rand(10,35),"Matricula".$i);
                $daoUsuario->insertUsuario($estudiante);
            }else{        // es impar creamos un Profesor
                $profesor = new Profesor("Nombre".$i,"Departamento".$i,"Numeroempleado".$i);
                $daoUsuario->insertUsuario($profesor);
            }    
        }
    }


    //crea aleatoriamente N numero de Materiales
    //por ejemplo cuando sea par creamos un tipo y cuando sea impar otro
    public static function generateMaterials(int $num){

        $daoMaterial= new MaterialDao();
          for($i=1; $i <= $num; $i++ ){
            if($i%2==0){  // es par creamos por ejemplo un Libro
                $libro= new Libro("TituloLibro".$i,rand(1900, 2017),"Editorial".$i);
                $libro->stock=rand(1,10);
                $daoMaterial->insertMaterial($libro);

            }else{   // es impar creamos un DVD
                $dvd = new DVD("TituloDVD".$i,rand(1975, 2017),rand(60,120));
                $dvd->stock=rand(1,10);
                $daoMaterial->insertMaterial($dvd);
            }
          }
    }
}