<?php
session_start();
include("conexion.php");

//Aqui trae el valor de los campos que pertenecen a la tabla evento_interno
$_POST['usu'];
$_POST['titulo'];
$_POST['descripcion'];
$_POST['cantidad'];
$_POST['institucion_aliada'];
$_POST['nro_bloque'];
$depen = $_POST['dependencia'];
$_POST['extencion'];

if (isset($_POST['institucion_aliada']) && !empty($_POST['institucion_aliada'])) //se verifica si la variable institucion tiene valor o no.
{
		$institucion = $_POST['institucion_aliada'];
}
else
{
	$institucion = "No cuenta con una institución aliada";
}

if (isset($_POST['financiamiento']) && !empty($_POST['financiamiento'])) //se verifica si la variable Financiamiento tiene valor o no.
{
		$presupuesto = "SI";
}
else
{
	$presupuesto = "NO";
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

	
//se asigna valor a status
$status = "NO APROBADO";

//Se configura la hora
date_default_timezone_set('America/La_Paz');
$fechaactual = getdate();

// se asigna el valor de la fecha y hora a la variable $fecha_sistema
$fecha_sistema = "$fechaactual[mday]/$fechaactual[mon]/$fechaactual[year] $fechaactual[hours]:$fechaactual[minutes].$fechaactual[seconds]";


//se hace la conexion a la BD, y se le envia el query para insertar el registro.
$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla evento");	 
mysql_query("INSERT INTO evento_interno (titulo_evento,des_evento,cant_per,inst_aliada, financiamiento, fecha_solicitud, status, evento_img, usuario_interno_id_usuario_interno) VALUES ('$_POST[titulo]','$_POST[descripcion]','$_POST[cantidad]','".$institucion."','".$presupuesto."','".$fecha_sistema."','".$status."','".$nombre_archivo."', '$_POST[usu]')",$conexion);

//se hace la consulta para saber si la extención y dependencia de la perosna ya fue agregada anteriormente
 $query = @mysql_query('SELECT usuario_interno_id_usuario_interno FROM datos_complementarios WHERE usuario_interno_id_usuario_interno="'.mysql_real_escape_string($_POST[usu]).'"');

//se le asigna el resultado obtenido en la consulta anterior a la variable existe
$existe = @mysql_fetch_object($query);

	//Si la variable $existe es igual a vacio, entonces se insertan los valores de Nro. Extención y Dependencia en la tabla de datos complementarios.
	if ($existe == "")
	{
		mysql_query("INSERT INTO datos_complementarios (numero_extension, dependencia_id_dependencia, usuario_interno_id_usuario_interno) 
		VALUES ('$_POST[extencion]','".$depen."','$_POST[usu]')");
		
		//se le indica a que pagina debe ir, y se le manda la variable $fecha_sistema
		echo '<script>window.location="../gestion_evento_interno_bloques.php?query='.$fecha_sistema.'&bloques='.$_POST['nro_bloque'].'"</script>'; 
	}
	//si la variable existe es distinto a vacio, entonces solo pasa a la pagina siguiente.
	else
	{
		//se le indica a que pagina debe ir, y se le manda la variable $fecha_sistema 
		echo '<script>window.location="../gestion_evento_interno_bloques.php?query='.$fecha_sistema.'&bloques='.$_POST['nro_bloque'].'"</script>';  
	} 
		
?>