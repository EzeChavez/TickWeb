@extends('adminlte::page')



@section('title', 'Inicio')

@section('content_header')

   
@stop

@section('content')
<button id="crearCarpa" class="btn btn-info">Crear Nueva Carpa</button>
    <div id="contenedorCarpas">
        <!-- Aquí se agregarán las carpas dinámicamente -->
    </div>

@stop

@section('css')
<style>
        /* Estilos para la carpa */
        .carpa {
            width: 0;
            height: 0;
            border-left: 100px solid transparent;
            border-right: 100px solid transparent;
            border-bottom: 100px solid; /* Color de fondo de la carpa */
            position: absolute;
        }
    </style>

@stop



@section('js')
<script>
        const contenedorCarpas = document.getElementById("contenedorCarpas");
        let colorIndex = 0;
        const colores = ["#F6B461", "#348285", "#E8E2BA", "#79FCFF", "#DCF2F4"]; // Colores alternos

        function crearCarpa() {
            const carpa = document.createElement("div");
            carpa.classList.add("carpa");

            // Cambiar el color de fondo de la carpa
            carpa.style.borderBottomColor = colores[colorIndex % colores.length];

            const offsetX = Math.floor(Math.random() * (window.innerWidth - 200));
            const offsetY = Math.floor(Math.random() * (window.innerHeight - 200)); // Altura de la carpa

            carpa.style.left = offsetX + "px";
            carpa.style.top = offsetY + "px";

            let isDragging = false;
            let initialX, initialY;

            carpa.addEventListener("mousedown", (e) => {
                isDragging = true;
                initialX = e.clientX - carpa.getBoundingClientRect().left;
                initialY = e.clientY - carpa.getBoundingClientRect().top;
                carpa.style.cursor = "grabbing";
            });

            document.addEventListener("mousemove", (e) => {
                if (!isDragging) return;

                const x = e.clientX - initialX;
                const y = e.clientY - initialY;

                carpa.style.left = x + "px";
                carpa.style.top = y + "px";
            });

            document.addEventListener("mouseup", () => {
                isDragging = false;
                carpa.style.cursor = "grab";
            });

            contenedorCarpas.appendChild(carpa);
            colorIndex++;
        }

        document.getElementById("crearCarpa").addEventListener("click", crearCarpa);
    </script>

@stop
