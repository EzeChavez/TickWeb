@extends('adminlte::page')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'TickWeb')

@section('content_header')
    <h1>Agenda de reservas "Aparts"</h1>
  

    @stop

@section('content')

<div class="container">

        <div id="agenda"></div>

</div>






@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css"> 
    
@stop



@section('js')

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>
<script type="module" src="../resources/js/agenda.js"></script>

@stop