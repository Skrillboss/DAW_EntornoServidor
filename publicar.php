<?php include_once "menu.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista previa</title>
</head>

<body>

    <?php

    $publicacion = publicacion::fromBody();

    ?>

    <form method="POST" action="publicar.php">

        <?php if (isset($_POST["aceptar"])) : ?>
            <h2>¡Tu mensaje se ha publicado con éxito !</h2>

            <?php include("verPublicacion.php") ?>

            <?php

            servicioPublicaciones::insertarPublicacion($publicacion);

            ?>

            <a href="index.php">Publicar un nuevo mensaje</a>



        <?php else : ?>
            <h2>Vas a publicar el siguiente mensaje:</h2>

            <?php include("verPublicacion.php") ?>

            <div class="boton"><input type="submit" value="Aceptar" name="aceptar"></div>
            <div class="boton"><input type="submit" value="Cancelar" formaction="index.php"></div>

        <?php endif; ?>

        <div><input type="hidden" name="nombre" value="<?php echo $publicacion->nombre; ?>"></div>
        <div><input type="hidden" name="usuario" value="<?php echo $publicacion->usuario; ?>"></div>
        <div><input type="hidden" name="texto" value="<?php echo $publicacion->texto; ?>"></div>




    </form>



</body>

</html>