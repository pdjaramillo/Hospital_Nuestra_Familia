
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('agenda');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        slotLabelInterval: "00:30",
        slotMinTime: '09:00:00',
        slotMaxTime: '18:30:00',
        initialView: 'dayGridMonth',
        allDaySlot: false,
        locale:"es",
        slotLabelFormat:{
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
            },//se visualizara de esta manera 01:00 AM en la columna de horas
            eventTimeFormat: {
                           hour: '2-digit',
                           minute: '2-digit',
                           hour12: false
                          },//y este código se visualizara de la misma manera pero en el titulo del evento creado en fullcalendar
            headerToolbar:{
            center: 'title',
            left: 'today',
            right: 'dayGridMonth,timeGridWeek,listWeek'
            },
            eventSources: [
              {
                // url: '"http://127.0.0.1:8000/medicos/citasmedico"',
                // cache: true
            },
          ],

            
        dateClick: function(info) {
            $("#calendarModal").modal("show");
        },
          hiddenDays: [ 0, 6 ],
          businessHours: [ // specify an array instead
            {
              daysOfWeek: [ 1, 2, 3, 4, 5 ], // Monday, Tuesday, Wednesday
              startTime: '09:00', // 8am
              endTime: '12:30' // 6pm
            },
            {
              daysOfWeek: [ 1, 2, 3, 4, 5 ], // Thursday, Friday
              startTime: '14:00', // 10am
              endTime: '18:30' // 4pm
            }
          ]    
      });
      calendar.render();
    });

