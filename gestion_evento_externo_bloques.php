<?php
// Este es el id del usuario
$id_usuario_interno = $_GET['query'];
//tomamos los datos del archivo conexion.php  
include("clases/conexion.php");
$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");

$fecha_sistema = $_GET['query'];
$nro_bloques = $_GET['bloques'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestión Evento Externo Sesiones</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->
    


<body id="page-top" class="index">

    <!-- Header de la pagina -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" style="background:white">
        <div class="container"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll"> <a href="index.php"> <img src="img/Logo_trans1.png" width="168" height="70"/></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">  </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" style="background:orange;" href="index.php">Volver</a>
                    </li>
                    <li>
                       	 <?php //inicio PHP	
                    			//se envia la consulta  
								//se hace consulta para traer ID_evento  
								$nombre = mysql_query('SELECT usuario_externo_id_usuario_externo FROM evento_externo WHERE fecha_solicitud="'.mysql_real_escape_string($fecha_sistema).'"');
						
								
								
								while ($row = mysql_fetch_row($nombre)){
									
									$usu = mysql_query('SELECT * FROM usuario_externo WHERE id_usuario_externo="'.mysql_real_escape_string($row[0]).'"');
									
									while ($row_nombre = mysql_fetch_row($usu))
									{
						?>

                       		 <a class="page-scroll" style="background:orange; margin-left: 5%;"><?php echo $row_nombre[1].' '.$row_nombre[2] ?></a>
						<?php
									}
								}
						?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav><!-- Fin Header de la pagina -->



    <!-- Sección datos de la sesion -->
    <section id="contact" style="background-repeat: repeat; background-position:top;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Formulario Evento Externo</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <form name="sesiones" action="clases/registro_evento_externo_horas.php" enctype="multipart/form-data" method="post"  novalidate>
             <?php 
						$contador_fechas_Jquery = 0;
							//se inicia el ciclo FOR que va a permitir que se puedan mostrar todos los bloques requeridos
						for ($contador_bloques =  1; $contador_bloques <= $nro_bloques; $contador_bloques++)
						{
									$contador_fechas_Jquery++;	
			?>
           
              <div class="row">
                <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                               <h3 style="margin-left: 17%; color: white; font-size: 30px; font-weight: bold;">Datos de la sesión <?php echo $contador_bloques ?></h3>
                                <div class="form-group">
                                    <input name="fecha<?php echo $contador_bloques?>" type="date" id="datepicker" class="form-control">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input name="Hora_inicio<?php echo $contador_bloques?>" type="time" class="form-control">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input name="Hora_final<?php echo $contador_bloques?>" type="time" class="form-control" >
                                    <p class="help-block text-danger"></p>
                                </div>
                                <?php 
                                echo '<div class="form-group">';
		
										$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
										mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");
										//se envia la consulta 
										$id_localidad = mysql_query('SELECT id_localidad FROM localidad');
										// consulta para traer nombre de la localidad
										 	
                                    echo '<select name="localidad'.$contador_bloques.'" class="form-control" style="width:100%; height:60px; margin-bottom:20px;  ">';
									
									while ( $row9 =mysql_fetch_array($id_localidad) )   
										{
									?>
											<option  value=" <?php echo $row9['id_localidad'] ?> " >
												<?php  $row9['id_localidad']; 
														$localidad = mysql_query('SELECT nombre FROM localidad WHERE id_localidad="'.mysql_real_escape_string($row9['id_localidad']).'"');
														 while ( $row10 =mysql_fetch_array($localidad))
													   	   {
														   	echo $row10['nombre'];
														   }
											?>
														
												</option>
											
									<?php		
										}
									echo '</select>';
                                    echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
								echo '<input type="text"  name="nro_bloques" value="'.$nro_bloques.'?>" style="visibility:hidden" />';
								
								//se hace consulta para traer ID_evento  
							$resultado1 = mysql_query('SELECT * FROM evento_externo WHERE fecha_solicitud="'.mysql_real_escape_string($fecha_sistema).'"'); 
							//
							 
							while ($row = mysql_fetch_row($resultado1))
							{
								echo ' <table   style="margin-left:70px;"> ';  //comienza la tabla de los bloques
										echo '<tr>';
										 echo '<td><input value="'.$row[0].'" name="id_evento" type="text" style="visibility:hidden" /></td>';
										 echo '<td><input value="'.$row[8].'" name="id_usuario_externo" type="text" style="visibility:hidden" /></td>';
											echo "</tr>";
										echo "</table>";
							}
								
								?>
                            </div>
                            <div class="col-md-6" style=" height: 430px; overflow: auto;">
                              
                               
                                 <h3 style="margin-left: 12%; color:white;  font-size: 30px; font-weight: bold;">Servicios de la sesión <?php echo $contador_bloques ?></h3>

									<div style=" width: 100%; background: white; height: auto; border-radius: 5px;">
										
										<div style="background: white; height: auto; margin-bottom: 5%; float:left;">	
											<?php   
										   // En este PHP se traen los se rvicios de la BD.

												$contador_servicios = 0;
												//se envia la consulta  para traer los tipos de servicios
												$id_tipo_servicios = mysql_query('SELECT * FROM tipo_servicio');
												// ciclo par amostrar los tipos de servicios

												//Ciclo para mostrar los servicios
												while ( $row_tipo_servicios = mysql_fetch_array($id_tipo_servicios) )
												{
														echo '<div style=" width: 100%; height: auto;">';
															echo '<h5 style="color: black; margin-left:3%; font-weight: bold;">'.$row_tipo_servicios[1].'</h5>';
														echo '</div>';

														//se envia la consulta para traer servicios 
														$id_servicios = mysql_query('SELECT * FROM servicios WHERE id_tipo_servicio = "'.$row_tipo_servicios[0].'"');


															echo '<div style=" float: left; width: 100%; margin-bottom: 5%; height: auto;">';

															while ( $row_servicios =mysql_fetch_array($id_servicios) )
														{
																	echo '<div style=" float: left; margin-left: 6%; width: 5%;">';
																		echo '<input style="width: 20px; height: 20px; margin-left: 15%; margin-top: 30%;" name="checkbox'.$contador_bloques.'[]" type="checkbox" value="'.$row_servicios[0].'"/>';
																	echo '</div>';

																	echo '<div style="color:black; float: left; width: 35%;">';
																			echo '<h6>'.$row_servicios[1].'</h6>';
																	echo '</div>';

														}
															echo '</div>';
													}
												?>
											</div>
									</div>
		
                                    <textarea style="height: 147px; " class="form-control" name="observaciones<?php echo $contador_bloques ?>" placeholder="Datos complementarios del evento" id="observaciones" required data-validation-required-message="Datos Complementarios del evento"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                	</div>
                	<?php
							
							}//cierra el FOR
					?> 
               		<div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Siguiente</button>
                    </div>
                </form>
                 
                
            </div>
        </div>
    </section>
	<!-- FIn datos de la sesion -->
   
   	<!-- Sección Pie de pagina -->
    <?php
		include("footer.php");
	?>
	<!-- FIN Sección Pie de pagina -->
   
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

</body>

</html>
