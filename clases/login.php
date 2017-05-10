<?php
session_start();
include("conexion.php");

$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");

//recibir info
$usu = strip_tags($_POST['usuario']);
$pass = strip_tags($_POST['password']);
$ip = $_SERVER['REMOTE_ADDR'];

$query = @mysql_query('SELECT id_usuario_interno FROM usuario_interno WHERE correo="'.mysql_real_escape_string($usu).'" AND cedula="'.mysql_real_escape_string($pass).'"');

if($existe = @mysql_fetch_object($query))
{
	$_SESSION['Logged'] = 'Yes';
	$_SESSION['user'] = $usu;
	echo '<script>window.location="../gestion_evento_interno.php?query='.$usu.'"</script>';
}
else
{
	echo 'Login o contrasena incorrecta';
}
?>
