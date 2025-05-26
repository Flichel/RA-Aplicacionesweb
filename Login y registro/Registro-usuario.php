<?php
/*
Los nombres de estas variables los sacamos de los nombres de los datos de nuestro codigo que en un principio fue html y luego php
En estas variables estaremos utilizando el metodo $_POST

El método $_POST en PHP es una superglobal variable que se utiliza para acceder a los datos enviados a un script PHP a través del método HTTP POST.
Este método es comúnmente usado para enviar información de formularios HTML, sin mostrar los datos en la URL. 

¿Cómo se usa?
En un formulario HTML, se usa el atributo method="POST" para indicar que los datos deben ser enviados a través del método POST. 
En el script PHP, se puede acceder a los valores de los campos del formulario usando $_POST['nombre_del_campo']. 

Ventajas de usar el método POST:
Seguridad: Los datos enviados con POST no son visibles en la URL, lo que puede proteger información sensible. 
Sin límite de datos: El método POST no tiene las limitaciones de longitud de la URL que tiene GET, permitiendo enviar grandes cantidades de datos. 
Mejor organización: El método POST permite separar los datos del formulario de la URL, lo que puede facilitar el desarrollo y mantenimiento del código. 
La flexibilidad del método POST también resulta muy útil: no solo se pueden enviar textos cortos, sino también otros tipos de información, como fotos o vídeos.

El método POST es aconsejable cuando el usuario debe enviar datos o archivos al servidor, como, por ejemplo, cuando se rellenan formularios o se suben fotos.

POST para la transferencia de información y datos
https://www.ionos.mx/digitalguide/paginas-web/desarrollo-web/get-vs-post/

EJEMPLO:

Dentro de nuestros POST escribiremos el nombre completo del campo del que vamos a obtener el dato
En nuestro html se mira  asi:  <input type="text" placeholder="Nombre Completo" name = "nombre_completo" > y usaremos el name
De esta manera en esta variable estariamos almacenando los datos que escribamos en el campo Nombre Completo de nuestro formulario Registrate

Ese nombre name en nuestro codigo html no lo obtuvimos al azar,
es el mismo nombre que le dimos a una de nuestras columnas en la tabla usuarios
de nuestra base de datos login_register_db.
*/
/*
Al declarar estas variables vamos a poder almacenar todos los valores de nuestro formulario Registrate
*/
//Ponemos el nombre de nuestro archivo que crea la conexion con la base de datos para poder conectarnos
// Aqui estamos incluyendo ese archivo sde esa forma tendremos acceso a la variable conexion para abrir la base de datos
include 'Conexion-Base-de-Datos.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

//Crearemos un jquery para que los datos que obtengamos en esas variables nos las guarde en nuestra tabla en la base de datos
//Crearemos una variable llamada jquery que sera igual a INSERT INTO
//Con INSERT INTO lo que estamos haciendo es que vamos a insertar datos en una tabla aqui estamos diciendo insertame los datos en la tabla usuarios y
//Entre parentesis le diremos que almacenara los datos  en los datos de nuestra tabla de la base de datos 
//Como pasamos  los datos de estas variables paa que se almacenene en cada uno de estos campos con VALUE
//Todo lleva un orden correo con correo usuario con usuario etc
//Tenemos que mantener ese ordenntal cual nuestra base de datos
$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, password) 
          VALUES('$nombre_completo', '$correo', '$usuario', '$password')";

//Necesitamos ejecutar la query para poder guardar los datos del formulario en nuestra base de datos
//Para eso crearemos una variable
//Le decimos que la variable conxion entre a nuestra base de datos y despues use la variable query
$ejecutar = mysqli_query($conexion, $query);

if*=($ejecutar){ //Si pasa esto
    echo '
            <script>
            alert("Usuario almacenado exitosamente"); //Que haga esto
            window.location = "../Loginyregister.php";
            </script>
    ';
}else{
        echo '
            <script>
            alert("Intentalo de nuevo, usuario no almacenado"); // Si no que haga esto
            window.location = "../Loginyregister.php";
            </script>
    ';
}

mysqli_close($conexion);


?>