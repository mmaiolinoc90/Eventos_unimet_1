<?php
session_start();
include("conexion.php");

//Aqui trae el valor de los campos que pertenecen a la tabla evento_interno
$_POST['nombre'];
$_POST['apellido'];
$_POST['rif'];
$_POST['correo'];
$_POST['telefono'];
$_POST['empresa'];
$_POST['cargo'];

//se hace la conexion a la BD, y se le envia el query para insertar el registro.
$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla evento");	
 
mysql_query("INSERT INTO usuario_externo (nombre, apellido, rif, correo, nro_telefono, empresa, cargo_solicitante) VALUES ('$_POST[nombre]','$_POST[apellido]','$_POST[rif]','$_POST[correo]','$_POST[telefono]','$_POST[empresa]', '$_POST[cargo]')",$conexion);

//se le indica a que pagina debe ir, y se le manda la variable $fecha_sistema
echo '<script>window.location="../gestion_evento_externo.php?user='.$_POST['correo'].'"</script>';
		
?>