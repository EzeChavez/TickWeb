@extends('adminlte::page')



@section('title', 'Inicio')

@section('content_header')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
@stop

@section('content')
<div style="width: 80%; margin: 0 auto;">
        <!-- Agrega un lienzo (canvas) para el gráfico -->
        <canvas id="graficoBarras"></canvas>
</div>
@stop

@section('css')

    @stop



@section('js')

<script>
        // Datos para el gráfico (ejemplo)
        var datos = {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
            datasets: [{
                label: 'Alquileres Mensuales',
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de fondo
                borderColor: 'rgba(75, 192, 192, 1)', // Color del borde
                borderWidth: 1, // Ancho del borde
                data: [65, 59, 80, 81, 56] // Datos de las barras
            }]
        };

        // Configuración del gráfico
        var configuracion = {
            type: 'bar', // Tipo de gráfico (barras en este caso)
            data: datos,
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Iniciar en el eje Y desde cero
                    }
                }
            }
        };

        // Crear el gráfico en el lienzo
        var ctx = document.getElementById('graficoBarras').getContext('2d');
        var myChart = new Chart(ctx, configuracion);
    </script>

@stop