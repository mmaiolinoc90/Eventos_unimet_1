<?php
//tomamos los datos del archivo conexion.php  
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

    <title>Eventos Unimet</title>

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

	<!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" style="background:white">
        <div class="container"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll"> <a href="#page-top"> <img src="img/Logo_trans1.png" width="250" height="104"/></a>
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
                        <a class="page-scroll" style="background:orange;" href="#instalaciones">Instalaciones</a>
                    </li>
                    <li>
                        <a class="page-scroll" style="background:orange;" href="#contact">Solicita Presupuesto</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">¿Deseas realizar un evento en "Nuestra Institución"?</div>
                <div class="intro-heading"></div>
                <a href="#eventos" class="page-scroll btn btn-xl" style="background:orange;">Haz click aquí </a>
            </div>
        </div>
    </header>

    <!-- Sección de Evento -->
    <section id="eventos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Gestiona tu Evento</h2>
                    <h3 class="section-subheading text-muted">Elige una opción</h3>
                </div>
            </div>
            <div class="row text-center">
               <!-- Bloque Sección Evento Interno -->
                <a href="login_evento_interno.php"> <div class="col-md-6">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                  <h4 class="service-heading">Evento Interno</h4>
                    <p class="text-muted">Los eventos internos pueden ser académicos, institucionales, culturales, deportivos y estudiantiles.</p>
				</div> </a> <!-- Fin Bloque Evento Interno -->
               
               
               <a href="login_evento_externo.php"> <div class="col-md-6">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Evento Externo</h4>
                    <p class="text-muted">Los eventos externos pueden ser alianzas o convenios, cooperación institucionales, corporativos, presentaciones culturales y espectáculos públicos.</p>
				   </div> </a> <!-- Fin Bloque Evento Externo -->
            </div>
        </div>
    </section>

    <!-- Instalaciones -->
    <section id="instalaciones" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Instalaciones</h2>
                    <h3 class="section-subheading text-muted">Te ofrecemos diferentes localidades para tus eventos</h3>
                </div>
            </div>
            
            <div class="row"><!-- Bloque que contiene todas las fotos de localidades -->
               
               	<!-- Consulta a tabla localidades -->
               	<?php
               		$localidades = mysql_query('SELECT * FROM localidad');
					while ($row_localidad = mysql_fetch_row($localidades))
					{
				?>
						<!-- Fin consulta a tabla localidades -->

						  <div class="col-md-4 col-sm-6 portfolio-item"> <!-- Bloque que contiene una foto de localidades -->
							<a href="#<?php echo $row_localidad[0]; ?>" class="portfolio-link" data-toggle="modal">
								<div class="portfolio-hover">
									<div class="portfolio-hover-content">
										<i class="fa fa-plus fa-3x"></i>
									</div>
								</div>
								<img src="img/instalaciones/<?php echo $row_localidad[4];?>" class="img-responsive" />
							</a>
							<div class="portfolio-caption">
								<h4><?php echo $row_localidad[1]; ?></h4>
								<p class="text-muted">Capacidad: <?php echo $row_localidad[3]; ?></p>
							</div>
						</div> <!-- FIn Bloque que contiene una foto de localidades -->
                
                <?php
					}
				?>
                
                  
            </div><!-- FIn Bloque que contiene todas las fotos de localidades -->
        </div>
    </section>
	<!-- FIN Instalaciones -->



    <!-- Sección de Solicitar Presupuesto -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Solicite su presupuesto aquí</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Enviar solicitud</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
	<!-- FIn Solicitar Presupuesto -->
   
  	<?php
		include("footer.php");
	?>

    <!-- bloque donde se amplia la foto -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->
	
   	<!-- Consulta a tabla localidades -->
    <?php
             $localidades = mysql_query('SELECT * FROM localidad');
			 while ($row_localidad = mysql_fetch_row($localidades))
			{
	?>
					<!-- Fin consulta a tabla localidades -->
					<!-- Portfolio Modal 1 -->
					<div class="portfolio-modal modal fade" id="<?php echo $row_localidad[0]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="close-modal" data-dismiss="modal">
									<div class="lr">
										<div class="rl">
										</div>
									</div>
								</div>
								<div class="container">
									<div class="row">
										<div class="col-lg-8 col-lg-offset-2">
											<div class="modal-body">
												<!-- Project Details Go Here -->
												<h2><?php echo $row_localidad[1]; ?></h2>
												<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
												<img class="img-responsive img-centered" src="img/instalaciones/<?php echo $row_localidad[4]; ?>" alt="">
												<p><?php echo $row_localidad[2]; ?></p>
									
												<ul class="list-inline">
													<li>Capacidad: <?php echo $row_localidad[3]; ?></li>
													<li></li>
													<li>costo: <?php echo $row_localidad[5]; ?> Bsf</li>
												</ul>
												<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Volver </button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		<?php
			}
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
