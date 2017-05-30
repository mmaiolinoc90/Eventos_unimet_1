$.getScript('http://arshaw.com/js/fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js',function(){

 $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        editable: true,
        events: [
		
			$.ajax({
					type: "POST",
					url: eventos_query.php;
					data: {id_evento: evento};
					dataType: "html";
					success: funtion(eventod){	
							title: eventod.titulo_status;
                			start: eventod.inicio_fecha;
               				end: eventod.titulo_status
											}
		
 				});
		]
    });

})