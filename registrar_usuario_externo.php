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

	<!-- Barra Navegación -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" style="background:white">
        <div class="container"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll"> <a href="index.php"> <img src="img/Logo_trans1.png" width="250" height="104"/></a>
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
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav><!-- Fin Barra Navegación -->
    <!-- Sección Formulario de Evento Interno -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Formulario registro de usuario</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
               <!-- formulario de datos personales -->
                <div class="col-lg-12"> 
                    <form name="formulario_registro" action="clases/registro_usuario_externo.php" method="post" enctype="multipart/form-data" novalidate>
                        <div class="row">    
                            <div class="col-md-6">
                              
                               <!-- modulo PHP que trae los datos del usuario -->
                               
                                <div class="form-group"> 
                                    <input type="text"  class="form-control"  id="name" name="nombre" placeholder="Escriba su Nombre" required data-validation-required-message="Debe escribir su nombre">
                                   <p class="help-block text-danger"></p>
                               </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="rif" id="rif" placeholder="Escriba su Rif" required data-validation-required-message="Debe escribir su Rif">
                                   <p class="help-block text-danger" required data-validation-required-message="Debe escribir su Rif"></p>
                               </div>
									<div class="form-group">
                                    <input type="text"  class="form-control"  name="telefono" id="telefono" placeholder="Escriba su Nro. de Telefono" required data-validation-required-message="Debe escribir su Nro. de telefono">
                                   <p class="help-block text-danger"></p>
                               </div>
                                <div class="form-group">
                                   <input type="email"  class="form-control" id="cargo" name="cargo" placeholder="Escriba su cargo en la empresa" required data-validation-required-message="Debe escribir su cargo en la empresa">
                                    <p class="help-block text-danger"></p>
                                </div>

                            </div>
                            <!-- Final del formulario de datos personales -->
                            
                            <!-- formulario de datos del evento -->
                            <div class="col-md-6">
                               
                               <div class="form-group">
                                    <input type="text"  class="form-control" id="apellido" name="apellido" placeholder="Escriba su apellido" required data-validation-required-message="Debe escribir su apellido" required/>
                                   <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text"  class="form-control" id="name" name="correo" placeholder="Escriba su correo electronico" required data-validation-required-message="Debe escribir su correo electronico ">  
                                   <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="text"  class="form-control" id="empresa" name="empresa" placeholder="Escriba el nombre de la empresa a la cual pertenece" required data-validation-required-message="Debe escribir el nombre de la Empresa a la cual pertenece">  
                                   <p class="help-block text-danger"></p>
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