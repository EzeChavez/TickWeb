@extends('adminlte::page')
@section('title', 'Inicio')

@section('content_header')

   
@stop

@section('content')
<div class="container">
    <h1>Personalizar y Enviar Correo Electrónico</h1>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('email.send') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="subject" class="form-label">Asunto</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Mensaje</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Correo Electrónico</button>
    </form>
</div>

@stop



@section('js')

@stop
