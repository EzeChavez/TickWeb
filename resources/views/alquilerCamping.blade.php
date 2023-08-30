
@extends('adminlte::page')



@section('title', 'Inicio')

@section('content_header')

<h1>Alquileres Camping</h1>   
@stop

@section('content')
<table id="Alquileres" class="table-info table-bordered table table-striped ">
    <thead>
        <tr class="table-primary">
            <th scope="col">Id</th>
            <th scope="col">Cliente</th>
            <th scope="col">Dni</th>
            <th scope="col">Check-in</th>
            <th scope="col">Check-out</th>
            <th scope="col">Detalle</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Alquileres as $Alquiler)
        <tr class="toggle-row">
            <form action="/actualizar_alquiler/{{$Alquiler->id}}" method="POST">
                @csrf
                <td>{{$Alquiler->id}}</td>
                <td>{{$Alquiler->Cliente}} {{$Alquiler->apellido}} </td>
                <td>{{$Alquiler->dni}}</td>
                <td>{{$Alquiler->fecha_desde}}</td>
                <td>{{$Alquiler->fecha_hasta}}</td>
                <tr class="details-row" style="display: none;">
                    <td>
                    <td>Cliente:<input class="form-control" type="text" name="cliente" value="{{$Alquiler->Cliente}} {{$Alquiler->apellido}}" readonly>
                    Dni:<input class="form-control" type="text" name="cliente" value="{{$Alquiler->dni}}" readonly>
                    Tel:<input class="form-control" type="text" name="cliente" value="{{$Alquiler->telefono}}" readonly><br></td>
                    <td>
                        Check-In:<input class="form-control" type="text" name="checkin" value="{{$Alquiler->fecha_desde}}">
                        Check-out:<input class="form-control" type="text" name="checkout" value="{{$Alquiler->fecha_hasta}}">
                        Cantidad de adultos:<input class="form-control" type="text" name="cantAdultos" >
                        Cantidad de niños:<input class="form-control" type="text" name="cantNiños" >
                        Cantidad de carpas:<input class="form-control" type="text" name="cantNiños" >
                        Cantidad de parcelas:<input class="form-control" type="text" name="cantNiños" >
                        Cantidad de dias:<input class="form-control" type="text" id="cantDias" name="cantDias" readonly>
                    </td>
                    <br>
                    <td>Total:<input class="form-control" type="text" name="total" value="{{$Alquiler->costo_total}}">
                    <br>Pago:<input class="form-control" type="text" name="pago" value="{{$Alquiler->pago}}">
                    <br>Debe:<input  class="form-control"type="text" name="debe" value="{{$Alquiler->debe}}"></td>
                    <td>Comentario:<textarea class="form-control" name="tbComentario" id="tbComentario" rows="8"></textarea></td>
                    <td><br><br>
                        <button type="submit" class="btn btn-success" style="margin-top: 3px;">Guardar</button><br>
                        <button type="submit" class="btn btn-primary" style="margin-top: 3px;">Finalizar</button><br>
                        <button type="submit" class="btn btn-danger" style="margin-top: 3px;">Eliminar</button>
                    </td>
                    </td>
                </tr>
            
            </form>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('css')

<style>
    /* Cambia el cursor a una mano cuando se coloca sobre una fila con la clase toggle-row */
    .toggle-row:hover {
        cursor: pointer;
    }
    .toggle-row:hover {
    cursor: pointer;
}
</style>
@stop



@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function() {
    $('#Alquileres').DataTable({
        // Otras opciones de DataTables...
        "language": {
            "sEmptyTable": "No hay datos disponibles en la tabla",
            "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            "sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
            "sInfoFiltered": "(filtrado de _MAX_ entradas totales)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sLoadingRecords": "Cargando...",
            "sProcessing": "Procesando...",
            "sSearch": "Buscar:",
            "sZeroRecords": "No se encontraron registros coincidentes",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": activar para ordenar la columna ascendente",
                "sSortDescending": ": activar para ordenar la columna descendente"
            }
        }
    });
});
</script>
<script>
        $(document).ready(function () {
            // Agrega el comportamiento de mostrar/ocultar filas al hacer clic en la fila
            $('.toggle-row').click(function () {
                $(this).next('.details-row').toggle();
            });
        });
    </script>
    <script>
    // Función para calcular la diferencia de días entre dos fechas
    function calcularDias() {
        var fechaCheckin = new Date(document.getElementById("checkin").value);
        var fechaCheckout = new Date(document.getElementById("checkout").value);

        var diferenciaTiempo = fechaCheckout - fechaCheckin;
        var diferenciaDias = Math.ceil(diferenciaTiempo / (1000 * 60 * 60 * 24)); // 1000ms * 60s * 60min * 24h = 1 día

        // Actualiza el valor en el elemento span
        document.getElementById("diasEstancia").textContent = diferenciaDias;

        // Coloca el valor en el campo de entrada
        document.getElementById("cantDias").value = diferenciaDias;
    }

    // Escucha el evento change en los campos de fecha
    document.getElementById("checkin").addEventListener("change", calcularDias);
    document.getElementById("checkout").addEventListener("change", calcularDias);

    // Calcula los días al cargar la página
    calcularDias();
</script>

@stop
