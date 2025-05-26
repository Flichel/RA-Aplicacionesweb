<?php
/*Estamos creando una variable
Al crear una variable siempre ponemos al principio el signo de  $
En la variable conexion estamos definiendo los datos para la conexion a nuestra base de datos
La variable para la conexion en esta variable estamos definiendo
El tipo de servidor que estaremos utilizando en este caso uno local  "localhost", el usuario "root", la password " ", el nombre de nuestra base de datos "login_register_db"
*/
    $conexion = mysqli_connect(     "localhost",        "root",        "",      "login_register_db");

//Crearemos un if, para en caso de que pongamos un dato mal y no nos demos cuenta
//En un nuestro if pondremos una condicional  $conexion ya que esta variable es igual ala conexion en una base de datos
//La compron\bacion la comectaremos al obntener una correcta a nuestra base de datos ya que si no se estaria
//imprimiendo constantemente.
if($conexion){//Si esta variable se conecta nos imprimira          Si pasa esto
            echo 'Conectado exitosamente a la Base de Datos';   // Que haga esto
}else{                                                          //Pero si no has esto
            echo 'No se a podido conectar a la base de datos';
}




?>