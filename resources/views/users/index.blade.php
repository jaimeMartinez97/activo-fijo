@extends('layouts.app')
@section('title', 'Activo Fijo | Empleados')
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
                                <h4 class="card-title">Empleados registrados</h4>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="container">
                                            <table id="page-length-option" class="display">
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Código de puesto</th>
                                                        <th>Plaza</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido paterno</th>
                                                        <th>Apellido materno</th>
                                                        <th>Motivo</th>
                                                        <th>Carácter</th>
                                                        <th>Unidad</th>
                                                        <th>Adscripción</th>
                                                        <th>Coordinador de zona</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)
                                                        <tr>
                                                            <td>
                                                                @if ($user->state == 1)
                                                                    VERDADERO
                                                                @else
                                                                    FALSO
                                                                @endif
                                                            </td>
                                                            <td>{{ $user->position }}</td>
                                                            <td>{{ $user->job }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->father_lastname }}</td>
                                                            <td>{{ $user->mother_lastname }}</td>
                                                            <td>{{ $user->reason }}</td>
                                                            <td>{{ $user->character }}</td>
                                                            <td>{{ $user->unity }}</td>
                                                            <td>{{ empty($user->assignment) ? 'Sin adscripcion por el momento' : $user->assignment->description }}</td>
                                                            <td>
                                                                {{ !empty($user->zone_coordinator) ? $user->zone_coordinator->name : 'No es coordinador' }}
                                                            </td>
                                                            <td>
                                                                <a class="edit mb-6 btn-floating waves-effect waves-light blue lightrn-1 modal-trigger" href="#modalUpdate" data-id="{{ $user->id }}">
                                                                    <i class="material-icons">create</i>
                                                                </a>
                                                                <a class="delete mb-6 btn-floating waves-effect waves-light red lightrn-1 modal-trigger" href="#modalDelete" data-id="{{ $user->id }}">
                                                                    <i class="material-icons">delete</i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Código de puesto</th>
                                                        <th>Plaza</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido paterno</th>
                                                        <th>Apellido materno</th>
                                                        <th>Motivo</th>
                                                        <th>Carácter</th>
                                                        <th>Unidad</th>
                                                        <th>Adscripción</th>
                                                        <th>Coordinador de zona</th>
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
    </div>
    <div id="modalRegister" class="modal">
        <form class="col s12" action="{{ url('users') }}" method="POST">
            <div class="modal-content">
                <h4>Registrar empleado</h4>
                <p>Ingresa los datos correspondientes para registrar un usuario.</p>
                @csrf
                <div class="row">
                    <div class="col s6">
                        <label>Status</label>
                        <select name="state" class="browser-default" required>
                            <option value="" disabled selected>Selecciona un status</option>
                            <option value="1">VERDADERO</option>
                            <option value="0">FALSO</option>
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <input name="position" type="text" class="validate" required>
                        <label>Código de puesto</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="job" type="text" class="validate" required>
                        <label>Plaza</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="name" type="text" class="validate" required>
                        <label>Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="father_lastname" type="text" class="validate" required>
                        <label>Apellido Paterno</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="mother_lastname" type="text" class="validate" required>
                        <label>Apellido Materno</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="reason" type="text" class="validate" required>
                        <label>Motivo</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="character" type="text" class="validate" required>
                        <label>Carácter</label>
                    </div>

                    <div class="col s6">
                        <label>Adscripción</label>
                        <select name="assignment_id" class="browser-default" required>
                            <option value="" disabled selected>Selecciona una adscripción</option>
                            @foreach ($assignments as $assignment)
                                <option value="{{ $assignment->id }}">{{ $assignment->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <input name="unity" type="text" class="validate" required>
                        <label>Unidad</label>
                    </div>
                    <div class="col s6">
                        <label>Coordinador de zona</label>
                        <select name="zone_coordinators_id" class="browser-default">
                            <option value="" disabled selected>Selecciona una coordinación</option>
                            @foreach ($zone_coordinators as $zone_coordinator)
                                <option value="{{ $zone_coordinator->id }}">{{ $zone_coordinator->name }}</option>
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
                    <div class="col s6">
                        <label>Status</label>
                        <select id="state" name="state" class="browser-default" required>
                            <option value="1">VERDADERO</option>
                            <option value="0">FALSO</option>
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <input id="position" name="position" type="text" class="validate" required>
                        <label>Código de puesto</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="job" name="job" type="text" class="validate" required>
                        <label>Plaza</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="name" name="name" type="text" class="validate" required>
                        <label>Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="father_lastname" name="father_lastname" type="text" class="validate" required>
                        <label>Apellido Paterno</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="mother_lastname" name="mother_lastname" type="text" class="validate" required>
                        <label>Apellido Materno</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="reason" name="reason" type="text" class="validate" required>
                        <label>Motivo</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="character" name="character" type="text" class="validate" required>
                        <label>Carácter</label>
                    </div>
                    <div class="col s6">
                        <label>Adscripción</label>
                        <select id="assignment_id" name="assignment_id" class="browser-default" required>
                            <option value="" disabled selected>Selecciona una adscripción</option>
                            @foreach ($assignments as $assignment)
                                <option value="{{ $assignment->id }}">{{ $assignment->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <input id="unity" name="unity" type="text" class="validate" required>
                        <label>Unidad</label>
                    </div>
                    <div class="col s6">
                        <label>Coordinador de zona</label>
                        <select id="zone_coordinators_id" name="zone_coordinators_id" class="browser-default">
                            <option value="" disabled selected>Selecciona una coordinación</option>
                            @foreach ($zone_coordinators as $zone_coordinator)
                                <option value="{{ $zone_coordinator->id }}">{{ $zone_coordinator->name }}</option>
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
                $('#position').val('Cargando...').focus();
                $('#job').val('Cargando...').focus();
                $('#name').val('Cargando...').focus();
                $('#father_lastname').val('Cargando...').focus();
                $('#mother_lastname').val('Cargando...').focus();
                $('#reason').val('Cargando...').focus();
                $('#character').val('Cargando...').focus();
                $('#unity').val('Cargando...').focus();
                $('#assignment_id').val('Cargando...');
                $('#zoone_coordinators_id').val('Cargando...');
                $.get('{{ url('users') }}/' + id, function(user){
                    $('#state').val(user.state === 'VERDADERO' ? 0 : 1);
                    $('#position').val(user.position).focus();
                    $('#job').val(user.job).focus();
                    $('#name').val(user.name).focus();
                    $('#father_lastname').val(user.father_lastname).focus();
                    $('#mother_lastname').val(user.mother_lastname).focus();
                    $('#reason').val(user.reason).focus();
                    $('#character').val(user.character).focus();
                    $('#unity').val(user.unity).focus();
                    $('#assignment_id').val(user.assignment_id);
                    $('#zone_coordinators_id').val(user.zone_coordinators_id);
                    $('#formUpdate').attr('action', '{{ url('users') }}/' + id);
                });
            });

            $(document).on('click', '.delete', function(){
                var id = $(this).attr('data-id');
                $('#formDelete').attr('action', '{{ url('users') }}/' + id);
            });
        });
    </script>
@endsection
