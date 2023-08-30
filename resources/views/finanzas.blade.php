@extends('adminlte::page')
@section('title', 'Inicio')

@section('content_header')
<link rel="stylesheet" href="datetimepicker.css">
    <script src="datetimepicker.js"></script>
   
@stop

@section('content')
<div class="container mt-5">
        <h1 class="mb-4">Carga de Costos</h1>
        
        <div class="row">
            <div class="col-md-6">
                <form action="/guardar_costo" method="POST">
                    @csrf <!-- Agrega esto si estás trabajando en un entorno Laravel para proteger el formulario contra ataques CSRF -->
                    
                    <!-- Motivo del costo -->
                    <div class="mb-3">
                        <label for="motivo" class="form-label">Motivo del Costo:</label>
                        <input type="text" class="form-control" id="motivo" name="motivo" required>
                    </div>
                    
                    <!-- Date-time picker para seleccionar una fecha -->
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha del Costo:</label>
                        <input type="text" class="form-control datepicker" id="fecha" name="fecha" required>
                    </div>
                    
                    <!-- Monto -->
                    <div class="mb-3">
                        <label for="monto" class="form-label">Monto:</label>
                        <input type="number" class="form-control" id="monto" name="monto" step="0.01" required>
                    </div>
                    
                    <!-- Espacio para un comentario en dos filas -->
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentario:</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="2"></textarea>
                    </div>
                    
                    <!-- Botón para enviar -->
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
                      <!-- Columna para mostrar el resumen de costos -->
                      <div class="col-md-6">
                <h2>Resumen de Costos</h2>
                <!-- Puedes mostrar aquí el resumen de costos en función de los costos ingresados en el formulario -->
                <!-- Por ejemplo: -->
                <p>Total de Costos Ingresados: $XXXX.XX</p>
                <p>Cantidad de Costos Ingresados: X</p>
                <!-- Puedes calcular y mostrar otros resúmenes según tus necesidades -->
            </div>
        </div>
    </div>

</body>


@stop



@section('js')
<script>
        // Inicializa el datepicker
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd', // Formato de fecha deseado
                autoclose: true
            });
        });
    </script>
    
@stop
