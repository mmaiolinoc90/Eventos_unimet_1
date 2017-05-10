<?php
$id_evento = $_POST['evento'];


//Se Realiza la conexion a la BD
include("clases/conexion.php");
$conexion = mysql_connect($host,$user,$ps)or die("problema al conectar el host");
mysql_select_db($bd,$conexion)or die ("problemas al conectar la bd tabla relacional");

//consulta para traer datos del evento 
							$resultado_evento = mysql_query('SELECT * FROM evento_interno WHERE id_evento_interno="'.mysql_real_escape_string($id_evento).'"');
							
							//se muestran los datos del usuario
							while ($row_evento = mysql_fetch_row($resultado_evento)){
								$nombre_evento=$row_evento[1];
								$descripcion_evento=$row_evento[2];
								$status=$row_evento[7];
							
								}  	
//consulta para traer datos del evento
							$datos_bloque = mysql_query('SELECT * FROM agenda_interna WHERE id_evento="'.mysql_real_escape_string($id_evento).'"');
							
							//se muestran los datos del evento
							while ($row_bloques = mysql_fetch_row($datos_bloque)){
								$fecha_inicio = $row_bloques[3];
								$fecha_fin = $row_bloques[4];
								$hora_inicio = $row_bloques[5];
								$hora_fin=$row_bloques[6];
								
								}
							//echo $fecha_inicio.'T04:00:00-'.$hora_inicio.'</br>';
							//echo $fecha_fin.'T04:00:00-'.$hora_fin;
							
							
							
								
//FIN de CONSULTAS DE INFORMACION REQUERIDA
//COdigo para agregar API Google Calendar
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Calendario</title>
    <meta charset="utf-8">
    <meta name="view-port" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.js"></script>
    		<!--JQUERY-->
		<script src="https://code.jquery.com/jquery-latest.min.js"></script>
		<!--AJAX-->
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  		<!--Bootstrap-->
  		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

  </head>
  <body>  
 <!-- java script-->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<scipt src="js/bootstrap.js"></scipt>
    
    <nav class="topheader">
    	<div class="customcontainer">
    		<a href="#">Ken</a>
    		<a href="#">Search</a>
   			<a href="#">Images</a>
   			<a href="#">Mail</a>
   			<a href="#">Calendar</a>
   			<a href="#">Sites</a>
    		<a href="#">Groups</a>
    		<a href="#">Contacts</a>
    		<a href="#" class="dropdown-toggle" id="menu2">More</a>
    			<ul class="dropdown-menu dropdown-menu-right" role="menu2" aria-labelledby="dropdownMenu1">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
					</ul>
    	</div>
    </nav>
	<nav class="navbar navbar-default">
	   	<div class="row">
		    	<div class="col-lg-2">
					<img src="https://www.google.com/a/scarletmail.rutgers.edu/images/logo.gif?alpha=1&service=google_default" class="rutgerslogo"></img>
				</div>
				<div class="col-lg-6">
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search Calendar">
							<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"</span></button>
						</div>
					</form>
				</div>

				<div class="col-lg-4">
					<p class="navbar-text navbar-left">Signed in as Beeve</p>
					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-bell"</span></button>
					<button type="button" class="btn btn-default">Share</button>
				</div>
				

			</div><!--row--> 
	</nav>

	<nav clas="navbar navbar-default"><!--Calendar navbar-->
		<div class="row">
			<div class="col-lg-2">
				<span class="calendarword">Calendar</span>
			</div>
			<div class="col-lg-2">
				<button class="btn btn-default">Today</button>
					<div class="btn-group" role="group" aria-label="...">
					  <button type="button" class="btn btn-default"><</button>
					  <button type="button" class="btn btn-default">></button>
					</div>
			</div>
			<div class="col-lg-2">
					<p class="navbar-text navbar-left">Sep 1 - 8, 2015</p>
			</div>
			<div class="col-lg-6">
				<div class="btn-group" role="group" aria-label="...">
  					<button type="button" class="btn btn-default">Day</button>
  					<button type="button" class="btn btn-default">Week</button>
  					<button type="button" class="btn btn-default">Month</button>
  					<button type="button" class="btn btn-default">4 Weeks</button>
  					<button type="button" class="btn btn-default">Agenda</button>
				</div>
	  				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
	  				More
	   				<span class="caret"></span>
	  				</button>
	  				<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
					</ul>
	  				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-cog"</span></button>
			</div>
		</div><!--Calendar bar-->		
	</nav>

	<div class="content">
		<div class="left-content">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="btn-group">
					  <button class="btn btn-danger">Create</button>
					  <button class="btn btn-danger btn dropdown-toggle" id="menu1" data-toggle="dropdown">
					    <span class="caret"></span>
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="menu1">
					    <li><a href="#">One</a></li>
					    <li><a href="#">Two</a></li>
					    <li><a href="#">Three</a></li>
					  </ul>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div><!--End Row-->
		<div class="row">
			<div class="col-sm-10">
				<h5>September 2013</h5>
			</div>
		</div>
<!--MINI CALENDAR-->
		<div class="row"> <!--Calender-->
			<div class="col-md-1 table-bordered">
				<div class="row">
					<div class="col-md-1 table-bordered">S</div>	
					<div class="col-md-1 table-bordered grey">25</div>
					<div class="col-md-1 table-bordered">1</div>
					<div class="col-md-1 table-bordered">8</div>
					<div class="col-md-1 table-bordered">15</div>
					<div class="col-md-1 table-bordered">22</div>
					<div class="col-md-1 table-bordered">29</div>
				</div>
			</div>
			<div class="col-md-1 table-bordered">
				<div class="row">
					<div class="col-md-1 table-bordered">M</div>
					<div class="col-md-1 table-bordered grey">26</div>
					<div class="col-md-1 table-bordered">2</div>
					<div class="col-md-1 table-bordered">9</div>
					<div class="col-md-1 table-bordered">16</div>
					<div class="col-md-1 table-bordered">23</div>
					<div class="col-md-1 table-bordered">30</div>
				</div>
			</div>
			<div class="col-md-1 table-bordered">
				<div class="row">
					<div class="col-md-1 table-bordered">T</div>
					<div class="col-md-1 table-bordered grey">27</div>
					<div class="col-md-1 table-bordered">3</div>
					<div class="col-md-1 table-bordered">10</div>
					<div class="col-md-1 table-bordered">17</div>
					<div class="col-md-1 table-bordered">24</div>
					<div class="col-md-1 table-bordered grey">1</div>
				</div>
			</div>
			<div class="col-md-1 table-bordered">
				<div class="row">
					<div class="col-md-1 table-bordered">W</div>
					<div class="col-md-1 table-bordered grey">28</div>
					<div class="col-md-1 table-bordered">4</div>
					<div class="col-md-1 table-bordered">11</div>
					<div class="col-md-1 table-bordered">18</div>
					<div class="col-md-1 table-bordered">25</div>
					<div class="col-md-1 table-bordered grey">2</div>
				</div>
			</div>
			<div class="col-md-1 table-bordered">
				<div class="row">
					<div class="col-md-1 table-bordered">TH</div>
					<div class="col-md-1 table-bordered grey">29</div>
					<div class="col-md-1 table-bordered">5</div>
					<div class="col-md-1 table-bordered">12</div>
					<div class="col-md-1 table-bordered">19</div>
					<div class="col-md-1 table-bordered">26</div>
					<div class="col-md-1 table-bordered grey">3</div>
				</div>
			</div>
			<div class="col-md-1 table-bordered">
				<div class="row">
					<div class="col-md-1 table-bordered">F</div>
					<div class="col-md-1 table-bordered grey">30</div>
					<div class="col-md-1 table-bordered">6</div>
					<div class="col-md-1 table-bordered">13</div>
					<div class="col-md-1 table-bordered">20</div>
					<div class="col-md-1 table-bordered">27</div>
					<div class="col-md-1 table-bordered grey">4</div>
				</div>
			</div>
			<div class="col-md-1 table-bordered">
				<div class="row">
					<div class="col-md-1 table-bordered">S</div>
					<div class="col-md-1 table-bordered grey">31</div>
					<div class="col-md-1 table-bordered">7</div>
					<div class="col-md-1 table-bordered">14</div>
					<div class="col-md-1 table-bordered">21</div>
					<div class="col-md-1 table-bordered">28</div>
					<div class="col-md-1 table-bordered grey">5</div>
				</div>
			</div>
		</div> 

<!--END MINI CALNDER-->

		<div class="row">
			<div class="col-sm-10">
				<h5>My Calendar</h5>
				<h6 class="h6pad"><a href="#">Ken</a></h6>
				<h6 class="h6pad"><a href="#">Jon</a></h6>
				<h6 class="h6pad"><a href="#">Dan</a></h6>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10">
				<h5>Other Calendars</h5>
					<form class="navbar-form navbar-left" role="search">
  					<div class="form-group input-group-sm">
    					<input type="text" class="form-control" placeholder="Add Coworker's Calendar">
    					<h6 class="h6pad">US Holidays</h6>
  					</div>
			</div>
		</div>

	</div><!--End left-content-->


		<div class="right-content">
			<div class="row">
				<div class="col-xs-1 table-bordered"><h6>GMT-05</h6></div>
				<div class="col-xs-2 table-bordered">Sun 9/8</div>
				<div class="col-xs-2 table-bordered">Mon 9/10</div>
				<div class="col-xs-2 table-bordered">Tues 9/11</div>
				<div class="col-xs-2 table-bordered">Wed 9/12</div>
				<div class="col-xs-1 table-bordered">TH 9/13</div>
				<div class="col-xs-1 table-bordered">Fri 9/14</div>
				<div class="col-xs-1 table-bordered">Sat 9/15</div>
			</div>
			<div class="row">
				<div class="col-lg-1 table-bordered">12am-8am</div>
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>
				<div class="col-lg-1 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>		
					
			</div><!--End Row-->
			<div class="row">
				<div class="col-lg-1 table-bordered">9am<br><br></div>
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>
				<div class="col-lg-1 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>		
			</div><!--End Row-->
			<div class="row">
				<div class="col-lg-1 table-bordered">10am<br><br></div>
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>
				<div class="col-lg-1 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>				
			</div><!--End Row-->
			<div class="row">
				<div class="col-lg-1 table-bordered">11am<br><br></div>
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>
				<div class="col-lg-1 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>				
			</div><!--End Row-->
			<div class="row">
				<div class="col-lg-1 table-bordered">12pm<br><br></div>
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>
				<div class="col-lg-1 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>				
			</div><!--End Row-->
			<div class="row">
				<div class="col-lg-1 table-bordered">1pm<br><br></div>
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>
				<div class="col-lg-1 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>					
			</div><!--End Row-->
			<div class="row">
				<div class="col-lg-1 table-bordered">2pm<br><br></div>
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>
				<div class="col-lg-1 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>					
			</div><!--End Row-->
			<div class="row">
				<div class="col-lg-1 table-bordered">3pm<br><br></div>
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>
				<div class="col-lg-1 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>				
			</div><!--End Row-->
			<div class="row">
				<div class="col-lg-1 table-bordered">4pm<br><br></div>
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>
				<div class="col-lg-1 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>					
			</div><!--End Row-->
			<div class="row">
				<div class="col-lg-1 table-bordered">5pm-12am</div>
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-2 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>
				<div class="col-lg-1 table-bordered"><br><br></div>	
				<div class="col-lg-1 table-bordered"><br><br></div>				
			</div><!--End Row-->
		</div><!--end right-content-->
	</div><!--End Content-->
  </body>
</html>