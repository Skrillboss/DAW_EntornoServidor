<?php include_once "menu.php" ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>red social</title>

</head>

<body>
    <p class="nombreUsuario"><?php echo $nombreUsuario; ?></p>


    <form method="POST" action="publicar.php">

        <?php

        $publicacion = publicacionVista::fromBody();

        $publicaciones = array();

        $publicaciones = servicioPublicaciones::obtenerPublicacion();

        ?>

        <div class="contenedorPadre">
            <div class="contenedor">
                <p>Nombre del usuario</p><input class="contenido" type="text" name="nombre" value="<?php echo $publicacion->nombre; ?>">
            </div>

            <div class="contenedor">
                <p>Usuario normal/de pago</p><select class="contenido" name="usuario">

                    <option value="usuarioNormal" <?php if ($publicacion->usuario == "usuarioNormal") {
                                                        echo "selected";
                                                    } ?>>Usuario normal</option>
                    <option value="usuarioPago" <?php if ($publicacion->usuario == "usuarioPago") {
                                                    echo "selected";
                                                } ?>>Usario de pago</option>

                </select>
            </div>

            <div class="contenedor">
                <p>Texto del mensaje</p><input class="contenido" type="text" name="texto" value="<?php echo $publicacion->texto; ?>">
            </div>
        </div>

        <div class="boton"><input id="publicar" type="submit" value="Publicar"></div>

    </form>
    <div class="publicaciones">

        <?php if (count($publicaciones) > 0) : ?>


            <h2>Publicaciones realizadas</h2>

        <?php endif; ?>


        <?php

        foreach ($publicaciones as $publicacion) {

            include "verPublicacion.php";
        }

        ?>

    </div>

</body>

</html>