<?php
session_start();
include("conexion.php");

//Aqui trae el valor de los campos que pertenecen a la tabla evento_interno
$_POST['usu'];
$_POST['titulo'];
$_POST['descripcion'];
$_POST['cantidad'];
$_POST['nro_bloque'];
 
//se declaran los formatos permitidos del archivo adjunto
$formato_foto = array('.jpg', '.png', '.JPG', '.PNG');
//traigo el archivo que se adjunto
$nombre_archivo = $_FILES['foto']['name'];
$nombre_tmp_archivo = $_FILES['foto']['tmp_name'];
$extencion = substr($nombre_archivo, strrpos($nombre_archivo,'.'));
//Se mueve el archivo adjunto a la carpeta upload
move_uploaded_file($nombre_tmp_archivo,"../upload/$nombre_archivo");
	
//se asigna valor a status
$status = "NO APROBADO";

if (isset($_POST['entradas']) && !empty($_POST['entradas'])) //se verifica si la variable Financiamiento tiene valor o no.
{
		$entradas = "SI";
}
else
{
	$entradas = "NO";
}

if (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])) //se verifica si la variable Financiamiento tiene valor o no.
{
			//se declaran los formatos permitidos del archivo adjunto
	$formato_foto = array('.jpg', '.png', '.JPG', '.PNG');
	//traigo el archivo que se adjunto
	$nombre_archivo = $_FILES['foto']['name'];
	$nombre_tmp_archivo = $_FILES['foto']['tmp_name'];
	$extencion = substr($nombre_archivo, strrpos($nombre_archivo,'.'));
	//Se mueve el archivo adjunto a la carpeta upload
	move_uploaded_file($nombre_tmp_archivo,"../upload/$nombre_archivo");
}
else
{
	$nombre_archivo = "No cuenta con poster";
}

//Se configura la hora
date_default_timezone_set('America/La_Paz');
$fechaactual = getdate();

// se asigna el valor de la fecha y hora a la variable $fecha_sistema
$fecha_sistema = "$fechaactual[mday]/$fechaactual[mon]/$fechaactual[year] $fechaactual[hours]:$fechaactual[minutes].$fechaactual[seconds]";

//se hace la conexion a la BD, y se le envia el query para insertar el registro.
$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla evento");	 
mysql_query("INSERT INTO evento_externo (titulo_evento,des_evento,cant_per, fecha_solicitud, status, evento_img, requiere_entradas, usuario_externo_id_usuario_externo) VALUES ('$_POST[titulo]','$_POST[descripcion]','$_POST[cantidad]','".$fecha_sistema."','".$status."','".$nombre_archivo."','".$entradas."', '$_POST[usu]')",$conexion);

//se le indica a que pagina debe ir, y se le manda la variable $fecha_sistema
echo '<script>window.location="../gestion_evento_externo_bloques.php?query='.$fecha_sistema.'&bloques='.$_POST['nro_bloque'].'"</script>';
		
?>