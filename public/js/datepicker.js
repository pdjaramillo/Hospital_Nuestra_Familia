$.datetimepicker.setLocale('es');
$('#fecha').datetimepicker({
    inline: false,
    allowTimes: [
        '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00',
        '16:00', '16:30', '17:00', '17:30', '18:00'
    ],
    minDate:new Date()
});

