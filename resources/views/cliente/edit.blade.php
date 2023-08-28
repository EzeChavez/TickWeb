@extends('adminlte::page')

@section('title', 'TickWeb')

@section('content_header')
    <h1>Cliente</h1>
@stop

@section('content')
<h2>Modificar</h2>
<form action="../{{$cliente->id}}" class="needs-validation" method="POST" novalidate>
@method('PUT')
@csrf  
<div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cliente->nombre}}" placeholder="Nombre" required>
    </div>
    <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="validationCustom02" value="{{$cliente->apellido}}" name="apellido" placeholder="Apellido" required>
    </div>
    <div class="col-md-4 mb-3">
      <input type="number" class="form-control" id="validationCustom02"value="{{$cliente->dni}}" name="dni" placeholder="Dni" required>
    </div>
    <div class="col-md-4 mb-3">
      <input type="number" class="form-control" id="validationCustom02" value="{{$cliente->telefono}}"name="telefono" placeholder="Telefono" required>
    </div>
    <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="validationCustom02" value="{{$cliente->domicilio}}"name="domicilio" placeholder="Domicilio" required>
    </div>
    <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="validationCustom02" value="{{$cliente->patente}}" name="patente" placeholder="Patente" required>
    </div>
  <a class="btn btn-secondary" style="margin-right:3px;" href="../">Cancelar</a>
  <button class="btn btn-primary" type="submit">Guardar</button>
</form>
@endsection
@section('js')


@stop
