<a href="login/logout.php" id="cerrarSesion">Cerrar sesion</a>

<?php include_once "cabecera.html" ?>
<?php include_once "modelo/entidades/publicacionVista.php" ?>
<?php include_once "modelo/servicios/servicioPublicaciones.php" ?>
<?php include_once "login/autenticacion.php" ?>
<?php include_once "modelo/servicios/servicioAutenticacion.php" ?>
<?php session_start(); ?>
<?php $nombreUsuario = Autenticacion::obtenerNombreUsuario(); ?>
<?php include_once "modelo/rest/apiHelper.php" ?>
<?php include_once "modelo/dto/publicacionDto.php" ?>



<?php
if (!Autenticacion::estaAutenticado()) {

    header("Location: login/login.php");

    exit();
}
?>