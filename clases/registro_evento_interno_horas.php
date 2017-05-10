<?php
session_start();
include("conexion.php");

//Se Realiza la conexion a la BD
$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla relacional");
//traigo los valores de Nro. de bloques, el id del evento y el id del usuario
$bloques = $_POST['nro_bloques'];
$id_evento = $_POST['id_evento'];


//Hacemos un ciclo for para insertar todos los bloques.
for($nro_bloques = 1; $nro_bloques <= $_POST['nro_bloques']; $nro_bloques++)
{
	$servicios = $_POST['checkbox'.$nro_bloques.''];
	$fecha = $_POST['fecha'.$nro_bloques.''];
	$hora_ini = $_POST['Hora_inicio'.$nro_bloques.''];
	$hora_final = $_POST['Hora_final'.$nro_bloques.''];
	$localidad = $_POST['localidad'.$nro_bloques.''];
	//$cantidad = $_POST['Cantidad'.$nro_bloques.''];
	$observaciones = $_POST['observaciones'.$nro_bloques.''];
	
	//se transforma el array de servicios en un varchar para poder guardarlo en base de datos.
	$cadena_servicios = implode(",", $servicios);
	
	//contamos el tamaño del vector de cantidades
	//$tamaño_vector_cantidades = count($cantidad);
	
	//Se reforma el arreglo de cantidad de servicios
	/*$array_cantidad_servicios = array();
	for($i=0; $i<$tamaño_vector_cantidades; $i++)
	{
			if($cantidad[$i] != "")
			{
				$array_cantidad_servicios[$i] = $cantidad[$i];
			}		
	}*/

	//se transforma el array de cantidad de servicios en un varchar para poder guardarlo en base de datos.
	//$cadena_cantidad = implode(",", $array_cantidad_servicios);
	$cadena_cantidad="null";
	//Se hace el query para insertar los registros a la tabla DB_relacional
mysql_query("INSERT INTO agenda_interna (id_usuario_interno, id_evento, fecha_inicio, fecha_fin, hora_inicio, hora_fin, localidad_id_localidad, servicios_id_servicios, Cantidad_servicios, Observaciones) VALUES ('$_POST[id_usuario_interno]', '$_POST[id_evento]', '".$fecha."' , '".$fecha."', '".$hora_ini."', '".$hora_final."', '".$localidad."','".$cadena_servicios."','".$cadena_cantidad."','".$observaciones."' )", $conexion);
}


echo '<script> window.location="../comprobante.php?evento='.$id_evento.'"</script>';  
?>



