@extends('adminlte::page')

@section('title', 'TickWeb')

@section('content_header')
    <h1>Listado de Clientes</h1>
  
    <a href="clientes/create"  class="btn btn-primary mb-3" >Ingresar un nuevo cliente</a>
@stop

@section('content')


<table id="clientes" class="table-active table-bordered table table-striped">
    <thead>
        <tr class="table-primary">
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Dni</th>
            <th scope="col">Telefono</th>
            <th scope="col">Domicilio</th>
            <th scope="col">Patente</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($Clientes as $Cliente)
        <tr>
            <td>{{$Cliente->id}}</td>
            <td>{{$Cliente->nombre}}</td>
            <td>{{$Cliente->apellido}}</td>
            <td>{{$Cliente->dni}}</td>
            <td>{{$Cliente->telefono}}</td>
            <td>{{$Cliente->domicilio}}</td>
            <td>{{$Cliente->patente}}</td>
            <td>
                <form action="{{ route('clientes.destroy',$Cliente->id)}}" method="POST">
                @method('DELETE')    
                @csrf 
                    
                    <a href="../public/clientes/{{$Cliente->id}}/edit" class="btn btn-info">Editar</a>
                    <button type="submit" class="btn btn-danger" style="margin-top: 3px;">Borrar</button>
                </form>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>

@stop

@section('css')
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<style> </style>

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#clientes').DataTable({
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
@stop