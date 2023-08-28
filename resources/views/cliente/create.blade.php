@extends('adminlte::page')

@section('title', 'TickWeb')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
<h2>Agregar un cliente</h2>
<form action="../clientes" class="needs-validation" method="POST" novalidate>
@csrf  
<div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
    </div>
    <br>
    <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="validationCustom02" name="apellido" placeholder="Apellido" required>
    </div>
    <br>
    <div class="col-md-4 mb-3">
      <input type="number" class="form-control" id="validationCustom02" name="dni" placeholder="Dni" required>
    </div>
    <div class="col-md-4 mb-3">
      <input type="number" class="form-control" id="validationCustom02" name="telefono" placeholder="Telefono" required>
    </div>
    <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="validationCustom02" name="domicilio" placeholder="Domicilio" required>
    </div>
    <div class="col-md-4 mb-3">
      <input type="text" class="form-control" id="validationCustom02" name="patente" placeholder="Patente" required>
    </div>
  <a class="btn btn-secondary" style="margin-right:3px;" href="../clientes">Cancelar</a>
  <button class="btn btn-primary" type="submit">Guardar</button>
</form>
@endsection
@section('js')
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@stop

