<?php
// Este es el id del usuario
$id_usuario_interno = $_GET['query'];
//tomamos los datos del archivo conexion.php  
include("clases/conexion.php");
$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla usuario");
?>
<!DOCTYPE html>
<html lang="en">

<!-- JS que permite hacer el efecto en el radio button de institución aleada -->
<script type="text/javascript">
    var checkActive = false;
    $(document).ready(function() {
        $('#checkbox').change(function() {
            if(checkActive == false) {
                $('#institucion').css('display', 'block');
                checkActive = true;
            } else {
                $('#institucion').css('display', 'none');
                checkActive = false;
            }
        });
    }); 

	function mostrar_institucion()
	{
		document.getElementById('institucion').style.display='block';
	}
</script> 

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestión Evento Interno</title>

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
								$nombre = mysql_query('SELECT * FROM usuario_interno WHERE correo="'.mysql_real_escape_string($id_usuario_interno).'"');
								while ($row = mysql_fetch_row($nombre)){
						?>
                       		 <a class="page-scroll" style="background:orange; margin-left: 5%;"><?php echo $row[1].' '.$row[2] ?></a>
						<?php
								}
						?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav><!-- Fin Header de la pagina -->



    <!-- Sección Formulario de Evento Interno -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Formulario Evento Interno</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
               <!-- formulario de datos personales -->
                <div class="col-lg-12"> 
                    <form name="formulario_registro" action="clases/resgistro.php" method="post" enctype="multipart/form-data" novalidate>
                        <div class="row">    
                            <div class="col-md-6">
                              <h3 style="margin-left: 20%; color: white; font-size: 30px; font-weight: bold;">Datos Personales</h3>
                               <!-- modulo PHP que trae los datos del usuario -->
                               <?php //inicio PHP	
                    			//se envia la consulta  
								$nombre = mysql_query('SELECT * FROM usuario_interno WHERE correo="'.mysql_real_escape_string($id_usuario_interno).'"');
                    			//se envia la consulta para traer las dependencias
								$id_dependencia = mysql_query('SELECT id_dependencia FROM dependencia');
								
								//se inicia el ciclo que nos permite pbtener los valores del ususario.
                               	while ($row = mysql_fetch_row($nombre)){
								
                                echo '<div class="form-group">'; 
                                    echo '<input type="text" value="'.$row[1].'" class="form-control" disabled id="name" name="nombre">';
                                   echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
                                echo '<div class="form-group">';
                                    echo '<input type="text" value="'.$row[2].'" class="form-control" disabled name="apellido" id="apellido">';
                                   echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
									echo '<div class="form-group">';
                                    echo '<input type="text" value="'.$row[3].'" class="form-control" disabled name="cedula" id="cedula">';
                                   echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
                                echo '<div class="form-group">';
                                   echo '<input type="email" value="'.$row[4].'" disabled class="form-control" id="email" name="email">';
                                    echo '<p class="help-block text-danger"></p>';
                                echo '</div>';
									
								echo '<div class="form-group">';
									
									
                                    echo '<select name="dependencia" class="form-control" style="width:100%; height:60px; margin-bottom:20px;  ">';
									
									while ( $row9 =mysql_fetch_array($id_dependencia) )   
										{
									?>
											<option  value=" <?php echo $row9['id_dependencia'] ?> " >
												<?php  $row9['id_dependencia']; 
														$dependencia = mysql_query('SELECT dependencia FROM dependencia WHERE id_dependencia="'.mysql_real_escape_string($row9['id_dependencia']).'"');
														 while ( $row10 =mysql_fetch_array($dependencia))
													   {
														   echo $row10['dependencia'];
														   }
											?>
														
												</option>
											
									<?php		
										}
									echo '</select>';
                                    echo '<p class="help-block text-danger"></p>';
                               echo '</div>';
									
									
                                echo '<div class="form-group">';
                                    echo '<input type="tel" class="form-control" name="extencion" placeholder="Escriba su numero de extención" id="phone" required data-validation-required-message="Por favor ingrese su nro. de extención">';
                                    echo '<p class="help-block text-danger"></p>';
                                echo '</div>';
									echo '<input style="visibility:hidden" type="text" value="'.$row[0].'"  id="id_usuario" name="usu">';
								}
								?>
                           
                            </div>
                            <!-- Final del formulario de datos personales -->
                            
                            <!-- formulario de datos del evento -->
                            <div class="col-md-6">
                               <h3 style="margin-left: 20%; color: white; font-size: 30px; font-weight: bold;">Datos del Evento</h3>
                               <div class="form-group">
                                    <input type="text"  class="form-control" id="name" name="titulo" placeholder="Escriba el nombre del evento" required data-validation-required-message="Debe escribir el nombre de su evento" required/>
                                   <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text"  class="form-control" id="name" name="cantidad" placeholder="Escriba la cantidad de personas que asistirá a su evento" required data-validation-required-message="Debe escribir la cantidad de personas">  
                                   <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text"  class="form-control" id="name" name="nro_bloque" placeholder="Escriba la cantidad de bloques que tendrá su evento" required data-validation-required-message="Debe escribir la cantidad de bloques de su evento">  
                                   <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <textarea style="height: 147px;" class="form-control" placeholder="Escriba la descripción de su evento" id="descripcion" required data-validation-required-message="Debe escribir una descripcion del evento" name="descripcion"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                   	<h5 style="color: white;">Adjunte el poster de su evento</h5>
                                    <input name="foto" type="file"  class="form-control">  
                                   <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                  	<h5 style="color: white; float: left;">¿Cuenta con Presupuesto? </h5>
                                   	<input style="float: left; width: 30px; height: 30px;" name="financiamiento" id="financiamiento"  type="checkbox" value="SI" />
                                   	
                                   	<h5 style="color: white; float: left;">	¿Cuenta con Institución aliada? </h5>
                                   	<input style="float: left; width: 30px; height: 30px;" name="checkbox" id="checkbox"  type="checkbox" onclick="mostrar_institucion();" value="" />
                                   <p class="help-block text-danger"></p>
                                   
                                   <input class="form-control" name="institucion_aliada" id="institucion"  placeholder="Escriba el nombre de la Institución" type="text" style=" display:none;">
                                </div>  
                                 
                            </div >
                            <!-- Final del formulario de datos del evento -->
                            
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button style="margin-top: 5%;" type="submit" class="btn btn-xl">Siguiente</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
	<!-- FIn gestion evento interno -->
   
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

