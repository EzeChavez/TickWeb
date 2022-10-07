$(document).ready(function(){
  //Se cambia el idioma al español;
  $.fn.datetimepicker.dates['en'] = {
    days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
    daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    meridiem: '',
    today: "Hoy"
  };

  //Se crea la variable para establecer la fecha actual
  var hoy = new Date();
  var dd = hoy.getDate();
  var mm = hoy.getMonth()+1;
  var yyyy = hoy.getFullYear();
  

  if(dd<10) {
      dd='0'+dd;
  } 

  if(mm<10) {
      mm='0'+mm;
  }

  $("#fechainicio").datetimepicker({
  
    language:  'es',
    pickerPosition: "bottom-left",
   
    startDate: hoy,
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    stardate:hoy,
    minView: 2,
    forceParse: 0
 
 
    
  });
 

  $("#fechafin").datetimepicker({
    language:  'es',
  
    autoclose: 1,
    todayBtn: 1,
    todayHighlight: 1,
    pickerPosition: "bottom-rigth",
    forceParse: 0,
    weekStart: 1,
    startView: 2,
    minView: 2,
  });


  $('#fechainicio').datetimepicker().on('changeDate', function(ev) {
    var iniciodate = ev.date;
    $('#fechafin').datetimepicker('setStartDate', iniciodate);
});




});