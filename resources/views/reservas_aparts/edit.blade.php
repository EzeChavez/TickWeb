@extends('adminlte::page')

@section('title', 'Editar Reserva')

@section('content_header')
    <h1>Editar Reserva</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_apart">ID Reserva</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $reserva->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="id_apart">ID Apart</label>
            <input type="text" class="form-control" id="id_apart" name="id_apart" value="{{ $reserva->nombre }}">
        </div>

        <div class="form-group">
            <label for="id_cliente">ID Cliente</label>
            <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="{{ $reserva->id_cliente }}">
        </div>

        <div class="form-group">
            <label for="fecha_desde">Fecha Desde</label>
            <input type="text" class="form-control" id="fecha_desde" name="fecha_desde" value="{{ $reserva->fecha_desde }}">
        </div>

        <div class="form-group">
            <label for="fecha_hasta">Fecha Hasta</label>
            <input type="text" class="form-control" id="fecha_hasta" name="fecha_hasta" value="{{ $reserva->fecha_hasta }}">
        </div>

        <div class="form-group">
            <label for="costo_total">Costo Total</label>
            <input type="text" class="form-control" id="costo_total" name="costo_total" value="{{ $reserva->costo_total }}">
        </div>

        <div class="form-group">
            <label for="pago">Pago</label>
            <input type="text" class="form-control" id="pago" name="pago" value="{{ $reserva->pago }}">
        </div>

        <div class="form-group">
            <label for="debe">Debe</label>
            <input type="text" class="form-control" id="debe" name="debe" value="{{ $reserva->debe }}">
        </div>

        <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea class="form-control" id="comentario" name="comentario">{{ $reserva->comentario }}</textarea>
        </div>

        <div class="form-group">
            <label for="id_estado_apart">ID Estado Apart</label>
            <input type="text" class="form-control" id="id_estado_apart" name="id_estado_apart" value="{{ $reserva->id_estado_apart }}">
        </div>

        <div class="form-group">
            <label for="id_estado_reserva_apart">ID Estado Reserva Apart</label>
            <input type="text" class="form-control" id="id_estado_reserva_apart" name="id_estado_reserva_apart" value="{{ $reserva->id_estado_reserva_apart }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@stop





