<?php
	$id_evento = $_GET['evento'];
include("clases/conexion.php");
$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Comprobante</title>

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

</head>

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
								$id_usuario = mysql_query('SELECT * FROM evento_interno WHERE id_evento_interno="'.mysql_real_escape_string($id_evento).'"');
								
								while ($row = mysql_fetch_row($id_usuario)){
									
									$id_usuario = mysql_query('SELECT * FROM usuario_interno WHERE id_usuario_interno="'.mysql_real_escape_string($row[9]).'"');
									
									while ($row2 = mysql_fetch_row($id_usuario)){
						?>
                       		 <a class="page-scroll" style="background:orange; margin-left: 5%;"><?php echo $row2[1].' '.$row2[2] ?></a>
						<?php
								
								}}
							
						?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav><!-- Fin Header de la pagina -->



    <!-- Sección comprobante datos personales y evento -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Comprobante</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
               <!-- datos personales -->
                <div class="col-lg-12"> 
                    <form name="formulario_registro" action="agregar_calendario.php" method="post" novalidate>
                        <div class="row">    
                            <div class="col-md-6">
                              <h3 style="margin-left: 20%; color: white; font-size: 30px; font-weight: bold;">Datos Personales</h3>
                               <!-- modulo PHP que trae los datos del usuario -->
                               <?php //inicio PHP	
                    			//se envia la consulta  
								//se envia la consulta  
								$id_evento_inter = mysql_query('SELECT * FROM evento_interno WHERE id_evento_interno="'.mysql_real_escape_string($id_evento).'"');
								
								while ($row3 = mysql_fetch_row($id_evento_inter)){
									
									$usu = mysql_query('SELECT * FROM usuario_interno WHERE id_usuario_interno="'.mysql_real_escape_string($row3[9]).'"');
									
									while ($row4 = mysql_fetch_row($usu)){
								
                                echo '<div class="form-group">'; 
                                    echo '<input type="text" value="'.$row4[1].'" class="form-control" disabled id="name" name="nombre">';
                                   echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
                                echo '<div class="form-group">';
                                    echo '<input type="text" value="'.$row4[2].'" class="form-control" disabled name="apellido" id="apellido">';
                                   echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
									echo '<div class="form-group">';
                                    echo '<input type="text" value="'.$row4[3].'" class="form-control" disabled name="cedula" id="cedula">';
                                   echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
                                echo '<div class="form-group">';
                                   echo '<input type="email" value="'.$row4[4].'" disabled class="form-control" id="email" name="email">';
                                    echo '<p class="help-block text-danger"></p>';
                                echo '</div>';
										
									
								$datos_complementarios = mysql_query('SELECT * FROM datos_complementarios WHERE usuario_interno_id_usuario_interno="'.mysql_real_escape_string($row3[9]).'"');
								
								while ($row_id_dependencia = mysql_fetch_row($datos_complementarios))
								{		
									
									$dependencia = mysql_query('SELECT * FROM dependencia WHERE id_dependencia="'.mysql_real_escape_string($row_id_dependencia[2]).'"');
									
									while ($row_dependencia = mysql_fetch_row($dependencia))
								{
									echo '<div class="form-group">';
									   echo '<input type="email" value="Dependencia: '.$row_dependencia[1].'" disabled class="form-control" id="dependencia" name="dependencia">';
										echo '<p class="help-block text-danger"></p>';
									echo '</div>';
								}
									echo '<div class="form-group">';
									   echo '<input type="email" value="Nro. Extensión: '.$row_id_dependencia[1].'" disabled class="form-control" id="dependencia" name="dependencia">';
										echo '<p class="help-block text-danger"></p>';
									echo '</div>';
								
									}
									}
								}
								?>
                           
                            </div>
                            <!-- Final del formulario de datos personales -->
                            
                            <!-- formulario de datos del evento -->
                            <div class="col-md-6">
                               <h3 style="margin-left: 20%; color: white; font-size: 30px; font-weight: bold;">Datos del Evento</h3>
                               
                               <?php //inicio PHP	
                    			//se envia la consulta  
								//se envia la consulta  
								$datos_evento = mysql_query('SELECT * FROM evento_interno WHERE id_evento_interno="'.mysql_real_escape_string($id_evento).'"');
								
								while ($row_datos_evento = mysql_fetch_row($datos_evento)){
                               echo '<div class="form-group">';
                                    echo '<input type="text"  class="form-control" id="name" value="Titulo del Evento: '.$row_datos_evento[1].'" name="titulo" disabled  />';
                                   echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
							   echo '<div class="form-group">';
                                   echo '<input style="height: 147px;" class="form-control" value="Descripción del evento: '.$row_datos_evento[2].'"   id="descripcion" name="descripcion" disabled>';
                                   echo '<p class="help-block text-danger"></p>';
                                echo '</div>';
                               echo '<div class="form-group">';
                                    echo '<input type="text"  class="form-control" value="Cantidad de personas del evento: '.$row_datos_evento[3].'" name="cantidad" placeholder="Escriba la cantidad de personas que asistirá a su evento" disabled>';  
                                  echo '<p class="help-block text-danger"></p>';
                               echo  '</div>';
                                echo '<div class="form-group">';
                                    echo '<input type="text"  class="form-control" value="Institución Aliada:  '.$row_datos_evento[4].'" name="institucion" disabled>  ';
                                  echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
							   echo '<div class="form-group">';
                                    echo '<input type="text"  class="form-control" value="  '.$row_datos_evento[5].' cuenta con presupuesto" name="presupuesto" disabled>  ';
                                  echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
							   echo '<div class="form-group">';
                                    echo '<input type="text"  class="form-control" value="Status del evento:   '.$row_datos_evento[7].'" name="no_aprobado" disabled>  ';
									?> <input style="visibility:hidden;"  type="text"  value="'.$row_datos_evento[0].'" name="evento"><?php
                                  echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
                               
								}
                            ?>
                                 
                            </div >
                            <!-- Final del formulario de datos del evento -->
                           
                        </div>
                        
                        <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Inicio</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
	<!-- FIn Sección comprobante datos personales y evento -->
 
				  <!-- Sección datos de la sesion -->
					<section id="contact" style="background-repeat: repeat; background-position:top;">
						<div class="container">
						<?php 
						   //se envia la consulta  
							$sesiones = mysql_query('SELECT * FROM agenda_interna WHERE id_evento="'.mysql_real_escape_string($id_evento).'"');
							$contador_bloques_sesiones = 1;
							while ($row_sesiones = mysql_fetch_row($sesiones))
							{
			
						?> 
				<div class="row">
                	<div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6">
                               <h3 style="margin-left: 17%; color: white; font-size: 30px; font-weight: bold;">Datos de la sesión <?php echo $contador_bloques_sesiones ?></h3>
                                <div class="form-group">
                                    <input name="fecha" value="Fecha de la sesión: <?php echo $row_sesiones[3] ?>"  class="form-control" disabled>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input name="Hora_inicio" value="Hora de inicio de la sesión: <?php echo $row_sesiones[5] ?>" class="form-control" disabled>
                                    <p class="help-block text-danger" ></p>
                                </div>
                                <div class="form-group">
                                    <input name="Hora_final" value="Hora final de la sesión: <?php echo $row_sesiones[6] ?>" class="form-control" disabled>
                                    <p class="help-block text-danger"></p>
                                </div>
                                 <?php
									//se envia la consulta 
								$id_localidad = mysql_query('SELECT * FROM localidad WHERE id_localidad="'.mysql_real_escape_string($row_sesiones[7]).'"');
								// consulta para traer nombre de la localidad
								
								while ($row_localidad = mysql_fetch_row($id_localidad))
								{
								?>
                                <div class="form-group">
                                    <input name="localidad" value="Localidad: <?php echo $row_localidad[1] ?>" class="form-control" disabled>
                                    <p class="help-block text-danger"></p>
                                </div>
                                
                                <?php
								}
                
								?>
                            </div>
                            <div class="col-md-6" style=" height: 430px; overflow: auto;">
                              
                               
                                 <h3 style="margin-left: 12%; color:white;  font-size: 30px; font-weight: bold;">Servicios de la sesión <?php echo $contador_bloques_sesiones ?></h3>

									<div style="width: 100%; background: white; height: auto; margin-bottom: 5%; float: left;">
										
										<div style="background: white; height: auto; margin-bottom: 5%; float:left;">	
											<?php
												// En este PHP se traen los servicios de la BD.
												$cadena = explode(",", $row_sesiones[8]);
												$cont = 0;
												
												//se obtienen los valores del array
												foreach($cadena as $id_servicios)
												{
													$id_servicios = $cadena[$cont];
													
											 		//se hace la consulta para tarer los servicios
											 		$servicio = mysql_query ('SELECT nombre FROM servicios WHERE id_servicios="'.mysql_real_escape_string($id_servicios).'"');	
		
											  		$ser = mysql_fetch_row($servicio);
											 		$prueba = $ser[0];
													
													echo '<div style=" float: left; margin-left:10%; margin-top:10%;  width: 100%; margin-bottom: 5%; height: auto;">';
														
														echo '<div style=" float: left; width: 16%;">';
															echo '<input style="width: 20px; height: 20px; margin-left: 15%; margin-top: 30%;" name="checkbox" type="checkbox" checked disabled />';
													
														echo '</div>';
													
														echo '<div style="color:black;  margin-top:5%; width: 120%;">';
															echo '<h6">'.$prueba.'</h6>';
														echo '</div>';
													
													echo '</div>';
													$cont++;
												}
											?>
										</div>
									</div>
		
                                <div class="form-group">  			  
									<input style="height: 147px;" class="form-control" value="Descripción de la sesión: <?php echo $row_sesiones[10] ?>"   id="descripcion" name="descripcion" disabled>';
                                <p class="help-block text-danger"></p>
                                </div>  					
											
                               
                                </div> <!-- FIN DIV col-md-6-->
                                
                            </div> <!-- FIN DIV ROW-->
                            <div class="clearfix"></div>
                        </div> <!-- FIN DIV col-lg-12 -->
                       </div> <!-- FIN DIV ROW -->
                	
						
                	<?php
					$contador_bloques_sesiones++;								
							
							
							}
						?>

								
						</div>		<!-- FIN DIV CONTAINER-->	
						<div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                                <div id="success"></div>
                               <a href="index.php"><button style="margin-top: 5%;" type="submit" class="btn btn-xl">Finalizar</button></a> 
                        </div>	
					</section>
   					<!-- FIn comprobate datos de la sesion -->
 	<?php
		include("footer.php");
	?>
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