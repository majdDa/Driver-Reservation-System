document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
	width: 50,
	height: 450,
    plugins: [ 'dayGrid', 'timeGrid', 'list','bootstrap' ],
    header: {
      left: 'dayGridMonth,timeGridWeek,timeGridDay custom1',
      center: 'title',
      right: 'today prevYear,prev,next,nextYear'
    },
    weekNumbers: true,
    eventLimit: true, // allow "more" link when too many events
    events: 'fullcalendar/load.php',
	    selectable:true,
    selectHelper:true,
  });

  calendar.render();
});
  