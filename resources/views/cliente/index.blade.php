@extends('adminlte::page')

@section('title', 'TickWeb')

@section('content_header')
    <h1>Listado de Clientes</h1>
  
    <a href="clientes/create"  class="btn btn-primary mb-3" >Ingresar un nuevo cliente</a>
@stop

@section('content')


<table id="clientes" class="table table-dark table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Dni</th>
            <th scope="col">Telefono</th>
            <th scope="col">Domicilio</th>
            <th scope="col">Patente</th>
            <th scope="col">Actualizado</th>
            <th scope="col">Creado</th>
            <th scope="col">Acciones</th>
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
            <td>{{$Cliente->updated_at}}</td>
            <td>{{$Cliente->created_at}}</td>
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
$(document).ready(function () {
    $('#clientes').DataTable();
});
</script>
@stop