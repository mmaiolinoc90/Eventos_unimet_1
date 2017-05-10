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
    <title>Google Calendar API Quickstart</title>
    <meta charset='utf-8' />
  </head>
  <body>
    <p>Google Calendar API Quickstart</p>

   <div class="row">
	<div class="col-md-2 col-sm-2 col-xs-12">
		<button id="authorize-button" style="visibility: hidden" class="btn btn-primary">Authorize</button>
    </div><!-- .col -->
    
    <div class="col-md-10 col-sm-10 col-xs-12">
		<script type="text/javascript">
			// date variables
			var now = new Date();
			today = now.toISOString();
			
			var twoHoursLater = new Date(now.getTime() + (2*1000*60*60));
			twoHoursLater = twoHoursLater.toISOString();
			
			// google api console clientID and apiKey (https://code.google.com/apis/console/#project:568391772772)
			var clientId = '1060745670332-cau0jv1a3bqeb6mdtj46evoh20vb95bd.apps.googleusercontent.com';
			var apiKey = 'AIzaSyA5YT_pXO0W5-EDn6ocFb85KgiKhfggf_g';

			// enter the scope of current project (this API must be turned on in the google console)
			var scopes = 'https://www.googleapis.com/auth/calendar';


			// Oauth2 functions
			function handleClientLoad() {
				gapi.client.setApiKey(apiKey);
				window.setTimeout(checkAuth,1);
			}

			function checkAuth() {
				gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: true}, handleAuthResult);
			}

			// show/hide the 'authorize' button, depending on application state
			function handleAuthResult(authResult) {
				var authorizeButton = document.getElementById('authorize-button');
				var resultPanel		= document.getElementById('result-panel');
				var resultTitle		= document.getElementById('result-title');
				
				if (authResult && !authResult.error) {						
					authorizeButton.style.visibility = 'hidden';			// if authorized, hide button
					resultPanel.className = resultPanel.className.replace( /(?:^|\s)panel-danger(?!\S)/g , '' )	// remove red class
					resultPanel.className += ' panel-success';				// add green class
					resultTitle.innerHTML = 'Application Authorized'		// display 'authorized' text
					makeApiCall();											// call the api if authorization passed
				} else {													// otherwise, show button
					authorizeButton.style.visibility = 'visible';
					resultPanel.className += ' panel-danger';				// make panel red
					authorizeButton.onclick = handleAuthClick;				// setup function to handle button click
				}
			}
			
			// function triggered when user authorizes app
			function handleAuthClick(event) {
				gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthResult);
				return false;
			}
			
			// setup event details
			var resource = {
				"summary": " <?php  echo $nombre_evento.', '.$descripcion_evento.', '.$status ?> ",
				"start": {
					"dateTime": "<?php echo $fecha_inicio.'T04:00:00-'.$hora_inicio ?>"
				},
				"end": {
					"dateTime": "<?php echo $fecha_fin.'T04:00:00-'.$hora_fin ?>"
				},
				"attendees": [{"email": "alfmorapime@gmail.com"},
    			 {"email": "diego.abad.sanchez@gmail.com"}
				 ]
			};
  
			// function load the calendar api and make the api call
			function makeApiCall() {
				gapi.client.load('calendar', 'v3', function() {					// load the calendar api (version 3)
					var request = gapi.client.calendar.events.insert({
						'calendarId':		'mmaiolinoc@gmail.com',	// calendar ID
						"resource":			resource							// pass event details with api call
					});
					
					// handle the response from our api call
					request.execute(function(resp) {
						if(resp.status=='confirmed') {
							document.getElementById('event-response').innerHTML = "Event created successfully";
						} else {
							document.getElementById('event-response').innerHTML = "There was a problem. Reload page and try again.";
						}
						/* for (var i = 0; i < resp.items.length; i++) {		// loop through events and write them out to a list
							var li = document.createElement('li');
							var eventInfo = resp.items[i].summary + ' ' +resp.items[i].start.dateTime;
							li.appendChild(document.createTextNode(eventInfo));
							document.getElementById('events').appendChild(li);
						} */
						console.log(resp);
					});
				});
			}
		</script>
		<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
		
		<div class="panel panel-danger" id="result-panel">
			<div class="panel-heading">
				<h3 class="panel-title" id="result-title">Application Not Authorized</h3>
			</div><!-- .panel-heading -->
			<div class="panel-body">
				<p>Insert Event into Public Calendar&hellip;</p>
				<div id="event-response"></div>
			</div><!-- .panel-body -->
		</div><!-- .panel -->
		
	</div><!-- .col -->
</div><!-- .row -->

<br</br>
<iframe src="https://calendar.google.com/calendar/embed?src=mmaiolinoc%40gmail.com&ctz=America/Caracas" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
  </body>
</html>