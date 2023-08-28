document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('agenda');
    
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    var FechaInicio;
    var FechaFin;

// Cargar el calendario con los eventos traidos de la bd
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        eventClick: function(info) {
            var evento = info.event;
            FechaInicio = moment(evento.start).format('DD/MM/YYYY');
            FechaFin = moment(evento.end).format('DD/MM/YYYY');
            var realId = evento.id;
            
            // Rellenar el formulario del modal con los detalles del evento
            document.getElementById('id').value = realId;
            document.getElementById('id2').innerText =realId;
            console.log(evento.id);
            document.getElementById('tbCliente').value = evento.extendedProps.idCliente;
            console.log(evento.extendedProps.idCliente);
            document.getElementById('lbEstadoReserva').value = evento.extendedProps.bdEstado; // Utiliza extendedProps para acceder a las propiedades personalizadas
            console.log(evento.extendedProps.bdEstado);

            document.getElementById('tbCliente').value = evento.extendedProps.idCliente;
            console.log(evento.extendedProps.idCliente);

            document.getElementById("lbNombreApart").value = evento.extendedProps.bdDataApart;
            console.log(evento.extendedProps.bdDataApart);

            document.getElementById('tbComentario').value = evento.extendedProps.bdComentario;
            console.log(evento.extendedProps.bdComentario);
            document.getElementById('tbTotal').value = evento.extendedProps.bdTotal;
            console.log(evento.extendedProps.bdTotal);
            document.getElementById('tbPagado').value = evento.extendedProps.bdPago;
            console.log(evento.extendedProps.bdPago);
            document.getElementById('tbDebe').value = evento.extendedProps.bdDebe;
            console.log(evento.extendedProps.bdDebe);
            document.getElementById('DTPdesde').value = evento.extendedProps.FechaInicio;
            console.log(FechaInicio);
            document.getElementById('DTPhasta').value = evento.extendedProps.FechaFin;
            console.log(FechaFin);
            // Rellenar otros campos aquí
           //$('#tbCliente').show();
            //$('#buscarCliente').hide();
            // Abrir el modal
            $("#reserva").modal("show");
          
           
        },


        firstDay: 1, //configura el primer dia de la semana como lunes
        events: function (fetchInfo, successCallback, failureCallback) {


            // Realizar una petición AJAX para obtener los eventos desde el backend
            fetch('/tick-app/public/reservas', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, // Usar el token CSRF obtenido del elemento HTML
                }
            })
            .then(response => response.json())
            .then(data => {
                // Crear un objeto para realizar un seguimiento de los eventos por día
                var eventosPorDia = {};

                // Contar los eventos por día
                data.forEach(evento => {
                    var fecha = evento.start;
                    if (!eventosPorDia[fecha]) {
                        eventosPorDia[fecha] = 0;
                    }
                    eventosPorDia[fecha]++;
                });

             

                // Pasar los datos obtenidos al callback de FullCalendar para mostrar los eventos
                successCallback(data);
            });
        }
    });

    calendar.render();
      // Cambiar el contenido del botón "today" a "hoy" revisar
      document.querySelector('.fc-today-button.fc-button.fc-button-primary').textContent = 'hoy';

   // Inicializar campos de Flatpickr cuando el modal se muestre
   $("#reserva").on("shown.bs.modal", function () {
    flatpickr("#DTPdesde", {
        dateFormat: "d/m/Y",
        defaultDate: FechaInicio, // Establecer la fecha de inicio
    });
    flatpickr("#DTPhasta", {
        dateFormat: "d/m/Y",
        defaultDate: FechaFin, // Establecer la fecha de fin
    });



    $(document).ready(function () {
        $('#btnGuardar').click(function () {
            const $ = require('jquery');
            $.ajax({
                url: $('#form').attr('action'),
                type: 'POST',
                data: $('#form').serialize(),
                success: function (response) {



                    
                    // Maneja la respuesta del servidor, por ejemplo, muestra un mensaje de éxito
                    console.log('Reserva guardada con éxito');
                    // Cierra la ventana modal si es necesario
                    $('#reserva').modal('hide');
                    window.location.reload();
                },
                error: function (error) {
                    // Maneja los errores, por ejemplo, muestra un mensaje de error
                    console.error('Error al guardar la reserva');
                }
            });
        });
    });
    

 
});

$(document).ready(function () {
    $('#btnAnular').click(function () {
        // Oculta el formulario cuando se hace clic en el botón "Cancelar"
        window.location.reload();
    });
});




//A partid de acá





});
