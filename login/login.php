<?php include_once "../cabecera.html" ?>
<?php include_once "autenticacion.php" ?>
<?php include_once "../modelo/servicios/servicioAutenticacion.php" ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>red social</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
 
    <form method="POST" action="login.php">

        <?php
        session_start();

        if (Autenticacion::estaAutenticado()) {

            header("Location: ../index.php");

            exit();
        }

        if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {

            if (Autenticacion::autenticar($_POST["usuario"], $_POST["contrasena"])) {

                header("Location: ../index.php");
                exit();
            } else {

                echo "Usuario o contraseña incorrectos";
            }
        }



        ?>

        <div>
            <p>Usuario</p><input class="contenido" type="text" name="usuario" value="<?php echo Autenticacion::obtenerCookieUsuario();?>">
        </div>

        <div>
            <p>Contraseña</p><input class="contenido" type="password" name="contrasena">
        </div>

        <div class="boton"><input id="publicar" type="submit" value="Iniciar sesion"></div>

    </form>


</body>

</html>