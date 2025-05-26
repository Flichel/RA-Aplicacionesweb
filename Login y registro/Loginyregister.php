<!DOCTYPE html>
<html lang="en">
<head>
 <!--Convertiremos nuestro archivo original html a php-->   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y registro</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="icon" type="image/jpg/gif" href="img/Juarnachaz.png"/> 
</head>
<body>
<!--Seccion de header logo y cabeza de la pagina-->
        <header class="header">
        <div class="container">
            <div class="nav-header">
                <h1 class="logo">Travel</h1>
                <div class="airplane-icon">✈️</div>
            </div>
<!--Seccion de navbar-->         
            <div class="nav-tabs">
               <a href="experimento.html" class="nav-tab">Inicio</a>                
               <a href="Loginyregister.html" class="nav-tab">Registrate</a>
                <button class="nav-tab">Vuelos</button>
                <a href="reservations.html" class="nav-tab inactive">Reservaciones</a>
                <button class="nav-tab inactive">Hotel + Vuelo</button>
                <button class="nav-tab inactive">Disney</button>
            </div>      
<!--Seccion de divs para poder darle el estilo con css a nuestra cajas de registro y login-->     
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>Ya tienes una cuenta?</h3>
                    <p>Inicia sesion para entrar a la pagina</p>
                    <button id="btn__iniciar-sesion">Iniciar sesion</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>Aun no tienes una cuenta?</h3>
                    <p>Registrate para que puedas inicar sesion</p>
                    <button id="btn__registro">Registrarse</button>
                </div>
            </div>

<!--Formulario de Login y Register-->
<!--Aqui tenemos las etiquetas que despues usaremos como datos en nuestros formularios y como variables en nuestro php-->
<!--Para ello les asignaremos un nombre, estos nombres los almacenaremos en variables de php para mandarlos a que se guarden en nuestra Base de Datos-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="" class="formulario__login">
                    <h2>Iniciar sesion</h2>
                    <input type="text" placeholder="Usuario">
                    <input type="password" placeholder="Contrasena">
                    <button>Entrar</button>
                </form>
                <!--Register-->
<!--Esta linea action="php/Registro-usuario.php" la usamos para comunicarnos a nuestro archivo php -->
<!--Esta linea la usamos para definir el metodo por el que pasaremos los datos con esta linea por ejemplo
mediante el atributo name mediante el metodo POST vamos a obtener los datos
y sera con esta linea con el metodo POST con la clase formulario__register para 
obtener todos los datos de ese formulario method = "POST" class="formulario__register" -->
                <form action="php/Registro-usuario.php" method = "POST" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre Completo" name = "nombre_completo" >
                    <input type="text" placeholder="Correo Electronico" name = "correo">
                    <input type="text" placeholder="Usuario" name = "usuario">
                    <input type="password" placeholder="Contrasena" name = "password">
                    <button>Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="Scrip-login.js"></script>
</body>
</html>