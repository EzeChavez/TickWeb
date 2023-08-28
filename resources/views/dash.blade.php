@extends('adminlte::page')



@section('title', 'Inicio')

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
   
@stop

@section('content')
<div class="form-group row">
    <div >Ver reservas con los siguientes estados</div>
  
      <div class="form-check">
        <input class="form-check-input ml-1" type="checkbox" id="gridCheck1">
        <label class="form-check-label ml-3" for="gridCheck1">
          Anuladas
        </label>
    
    </div>
  </div>


<div class="container">

        <div class="agenda" id="agenda">
    
        </div>
      
</div>


<!-- Reveer -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevaReserva">
  Nueva reserva
</button>

                <form name="form" id="form" action="{{ route('reservas.edit') }}" method="POST">
                    @csrf
                    <div class="modal fade" id="reserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Reserva n° &nbsp;</h4>
                                    <h4 class="modal-title" name="id2" id="id2"></h4>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" name="id" id="id" hidden>

                                    <div>
                                        <label for="title">Cliente</label>
                                        <input type="text" class="form-control" name="tbCliente" id="tbCliente" readonly >  
                                    </div>


                                    <div class="d-flex">
                                        <div class="mr-2">
                                            <label for="start">Check-in</label>
                                            <input type="text" class="form-control datepicker" name="DTPdesde" id="DTPdesde" style="flex: 1;">
                                        </div>
                                        <div class="ml-2">
                                            <label for="end">Check-out</label>
                                            <input type="text" class="form-control datepicker" name="DTPhasta" id="DTPhasta" style="flex: 1;">
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="mr-2">
                                            <label>Apart</label>
                                            <select class="form-control" name="lbNombreApart" id="lbNombreApart">
                                                <option>1 - Initi</option>
                                                <option>2 - Quiya</option>
                                                <option>3 - Wasi</option>
                                                <option>4 - Lawen</option>
                                                <option>5 - Conalara</option>
                                                <option>6 - Naguan</option>
                                                <option>7 - Cabaña</option>
                                            </select>
                                        </div>

                                        <div class="mr-2">
                                            <label for="lbEstadoReserva">Cambiar estado</label>
                                            <select class="form-control" name="lbEstadoReserva" id="lbEstadoReserva">
                                                <option>Aprobada</option>
                                                <option>Reservada</option>
                                                <option>Anulada</option>
                                                <option>Utilizada</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="mr-2">
                                            <label for="title">Total a pagar:</label>
                                            <input type="text" class="form-control" name="tbTotal" id="tbTotal">
                                        </div>

                                        <div class="mr-2">
                                            <label for="title">Pagado:</label>
                                            <input type="text" class="form-control" name="tbPagado" id="tbPagado">
                                        </div>

                                        <div>
                                            <label for="title">Saldo pendiente:</label>
                                            <input type="text" class="form-control" name="tbDebe" id="tbDebe">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="descripcion">Comentarios</label>
                                        <textarea class="form-control" name="tbComentario" id="tbComentario" rows="3"></textarea>
                                    </div>

                                    <br>
                                    <div>
                                        <button type="button" class="btn btn-success" name="btnGuardar" id="btnGuardar">Guardar</button>
                                        <button type="button" class="btn btn-danger" name="btnAnular" id="btnAnular">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal fade" id="nuevaReserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="formularioBusqueda" method="POST" action="{{ route('buscar.clientes') }}">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Nueva Reserva</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                              <div id="buscarClienteWrapper">
                        <label for="buscarCliente">Buscar cliente</label>
                        <input type="text" class="form-control" name="buscarCliente" id="buscarCliente">
                        <select class="form-control" name="lbClientes" id="lbClientes">
                            <!-- Opciones se llenarán dinámicamente aquí -->
                        </select>
                                <input type="hidden" name="clienteId" id="clienteId"> <!-- Para almacenar el ID del cliente seleccionado -->
                    </div>
                        <div id="resultadosBusqueda"></div> <!-- Agrega este elemento para mostrar los resultados -->
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="buscarClienteBtn">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop



@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>

    <script type="module" src="../resources/js/agenda.js"></script>

@stop
