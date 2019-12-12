@extends('layouts.app')
@section('title', 'Activo Fijo | Adscripciones')
@section('body')
    <!-- Page Length Options -->
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="col s12">
        <div class="container">
            <div class="section section-data-tables">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <div style="bottom: 50px; right: 19px;" class="fixed-action-btn direction-top">
                                    <a class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow waves-effect waves-light modal-trigger" href="#modalRegister">
                                        <i class="material-icons">add</i>
                                    </a>
                                </div>
                                <h4 class="card-title">Adscripciones registradas</h4>
                                <div class="row">
                                    <div class="col s12">
                                        <table id="page-length-option" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Unidad</th>
                                                    <th>Descripción</th>
                                                    <th>Localidad</th>
                                                    <th>Municipio</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($assignments as $assignment)
                                                    <tr>
                                                        <td>{{ $assignment->unity }}</td>
                                                        <td>{{ $assignment->description }}</td>
                                                        <td>{{ $assignment->locality->name }}</td>
                                                        <td>{{ $assignment->municipality->name}}</td>
                                                        <td>{{ $assignment->state->name }}</td>
                                                        <td>
                                                            <a class="edit mb-6 btn-floating waves-effect waves-light blue lightrn-1 modal-trigger" href="#modalUpdate" data-id="{{ $assignment->id }}">
                                                                <i class="material-icons">create</i>
                                                            </a>
                                                            <a class="delete mb-6 btn-floating waves-effect waves-light red lightrn-1 modal-trigger" href="#modalDelete" data-id="{{ $assignment->id }}">
                                                                <i class="material-icons">delete</i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Unidad</th>
                                                    <th>Descripción</th>
                                                    <th>Localidad</th>
                                                    <th>Municipio</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalRegister" class="modal">
        <form class="col s12" action="{{ url('assignments') }}" method="POST">
            <div class="modal-content">
                <h4>Registrar adscripción</h4>
                <p>Ingresa los datos correspondientes para registrar una adscripción.</p>
                @csrf
                <div class="row">
                    <div class="input-field col s6">
                        <input name="unity" type="text" class="validate" required>
                        <label>Unidad</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="description" type="text" class="validate" required>
                        <label>Descripción</label>
                    </div>
                    <div class="col s6">
                        <label>Localidad</label>
                        <select name="locality_id" class="browser-default" required>
                            <option value="" disabled selected>Selecciona una localidad</option>
                            @foreach ($localities as $locality)
                                <option value="{{ $locality->id }}">{{ $locality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col s6">
                        <label>Municipio</label>
                        <select name="municipality_id" class="browser-default" required>
                            <option value="" disabled selected>Selecciona un municipio</option>
                            @foreach ($municipalities as $municipality)
                                <option value="{{ $municipality->id }}">{{ $municipality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col s6">
                        <label>Estado</label>
                        <select name="state_id" class="browser-default" required>
                            <option value="" disabled selected>Selecciona un estado</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="modal-action mb-6 btn waves-effect waves-light green darken-1">Aceptar</button>
                <a href="#!" class="modal-action mb-6 btn waves-effect waves-light red darken-1 modal-close">Cancelar</a>
            </div>
        </form>
    </div>

    <div id="modalUpdate" class="modal">
        <form id="formUpdate" class="col s12" action="" method="POST">
            <div class="modal-content">
                <h4>Actualizar datos</h4>
                <p>Ingresa datos en los campos deseados para actualizar.</p>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s6">
                        <input id="unity" name="unity" type="text" class="validate" required>
                        <label>Unidad</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="description" name="description" type="text" class="validate" required>
                        <label>Descripción</label>
                    </div>
                    <div class="col s6">
                        <label>Localidad</label>
                        <select id="locality_id" name="locality_id" class="browser-default" required>
                            @foreach ($localities as $locality)
                                <option value="{{ $locality->id }}">{{ $locality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col s6">
                        <label>Municipio</label>
                        <select id="municipality_id" name="municipality_id" class="browser-default" required>
                            @foreach ($municipalities as $municipality)
                                <option value="{{ $municipality->id }}">{{ $municipality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col s6">
                        <label>Estado</label>
                        <select id="state_id" name="state_id" class="browser-default" required>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="modal-action mb-6 btn waves-effect waves-light green darken-1">Aceptar</button>
                <a href="#!" class="modal-action mb-6 btn waves-effect waves-light red darken-1 modal-close">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

@section('level')
    <script type="text/javascript">
        $(document).ready(function(){
            // $(".card-alert").fadeTo(3500, 600).slideUp(400, function () {
            //     $(".card-alert").slideUp(600);
            // });

            $(document).on('click', '.edit', function(){
                var id = $(this).attr('data-id');
                $('#unity').val('Cargando...').focus();
                $('#description').val('Cargando...').focus();
                $.get('{{ url('assignments') }}/' + id, function(assignment){
                    $('#unity').val(assignment.unity).focus();
                    $('#description').val(assignment.description).focus();
                    $('#locality_id').val(assignment.locality_id);
                    $('#municipality_id').val(assignment.municipality_id);
                    $('#state_id').val(assignment.state_id);
                    $('#formUpdate').attr('action', '{{ url('assignments') }}/' + id);
                });
            });

            $(document).on('click', '.delete', function(){
                var id = $(this).attr('data-id');
                $('#formDelete').attr('action', '{{ url('assignments') }}/' + id);
            });
        });
    </script>
@endsection
