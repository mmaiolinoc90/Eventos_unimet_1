<?php
$id_evento = $_GET['evento'];



//Se Realiza la conexion a la BD
include("conexion.php");
$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");

//consulta para traer datos del evento 
							//ANTERIOR 
							
						
							$resultado_evento = @mysql_query('SELECT * FROM evento_interno WHERE id_evento_interno="'.mysql_real_escape_string($id_evento).'"');
							
							//se muestran los datos del usuario
							while ($row_evento = mysql_fetch_row($resultado_evento)){
								$nombre_evento=$row_evento[1];
								//$descripcion_evento=$row_evento[2];
								$status=$row_evento[7];
								}  	
//consulta para traer datos del evento
							$datos_bloque = mysql_query('SELECT * FROM agenda_interna WHERE id_evento="'.mysql_real_escape_string($id_evento).'"');
							
							//se muestran los datos del evento
							while ($row_bloques = mysql_fetch_row($datos_bloque)){
								$fecha_inicio = $row_bloques[3];
								$fecha_fin = $row_bloques[4];
							//	$hora_inicio = $row_bloques[5];
							//	$hora_fin=$row_bloques[6];
							}
									
//FIN de CONSULTAS DE INFORMACION REQUERIDA

//$nombre_evento = 'prueba';
//$status = 'EN ESPERA';
//$fecha_inicio = '2017-05-18';
//$fecha_fin = '2017-05-19';


$datos_evento = array();
$titulo = ' Titulo evento: '.$nombre_evento." ".'Se encuentra'." ".$status;

	$datos_evento['titulo_status'] = $titulo;
	$datos_evento['inicio_fecha'] = $fecha_inicio;
	$datos_evento['fin_fecha'] = $fecha_fin;	
//echo $datos_evento['titulo_status'];
//echo $datos_evento['inicio_fecha'];
//echo $datos_evento['fin_fecha'];

return json_encode($datos_evento);

?>


