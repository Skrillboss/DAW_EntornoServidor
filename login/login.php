<?php include_once "../cabecera.html" ?>
<?php include_once "autenticacion.php" ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>red social</title>
</head>

<body>
    <form method="POST" action="login.php">

        <?php

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
            <p>Usuario</p><input class="contenido" type="text" name="usuario">
        </div>

        <div>
            <p>Contraseña</p><input class="contenido" type="password" name="contrasena">
        </div>

        <div class="boton"><input id="publicar" type="submit" value="Iniciar sesion"></div>

    </form>

</body>

</html>