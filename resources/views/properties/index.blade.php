@extends('layouts.app')
@section('title', 'Activo Fijo | Bienes')
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
                                <h4 class="card-title">Bienes registrados</h4>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="container">
                                            <table id="page-length-option" class="display">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de bien</th>
                                                        <th>COG</th>
                                                        <th>Marca</th>
                                                        <th>Modelo</th>
                                                        <th>Precio</th>
                                                        <th>Color</th>
                                                        <th>Proveedor</th>
                                                        <th>Donado</th>
                                                        <th>Descripción general</th>
                                                        <th>Descripción completa</th>
                                                        <th>Descripción de vehículo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($properties as $property)
                                                        <tr>
                                                            <td>{{ $property->property_type->type }}</td>
                                                            <td>{{ $property->object_expense->description }}</td>
                                                            <td>{{ $property->brand }}</td>
                                                            <td>{{ $property->model }}</td>
                                                            <td>{{ $property->price}}</td>
                                                            <td>{{ $property->color }}</td>
                                                            <td>{{ $property->supplier }}</td>
                                                            <td>
                                                                @if ($property->property_types_id != 2)
                                                                    No aplica
                                                                @else
                                                                    @if ($property->given == 0)
                                                                        No
                                                                    @else
                                                                        Si
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td>{{ $property->general_description }}</td>
                                                            <td>{{ $property->full_description }}</td>
                                                            <td>{{ empty($property->vehicle_description) ? 'No aplica' : $property->vehicle_description }}</td>
                                                            <td>
                                                                <a class="edit mb-6 btn-floating waves-effect waves-light blue lightrn-1 modal-trigger" href="#modalUpdate" data-id="{{ $property->id }}">
                                                                    <i class="material-icons">create</i>
                                                                </a>
                                                                <a class="delete mb-6 btn-floating waves-effect waves-light red lightrn-1 modal-trigger" href="#modalDelete" data-id="{{ $property->id }}">
                                                                    <i class="material-icons">delete</i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de bien</th>
                                                        <th>COG</th>
                                                        <th>Marca</th>
                                                        <th>Modelo</th>
                                                        <th>Precio</th>
                                                        <th>Color</th>
                                                        <th>Proveedor</th>
                                                        <th>Donado</th>
                                                        <th>Descripción general</th>
                                                        <th>Descripción completa</th>
                                                        <th>Descripción de vehículo</th>
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
        <form class="col s12" action="{{ url('properties') }}" method="POST">
            <div class="modal-content">
                <h4>Registrar bien</h4>
                <p>Ingresa los datos correspondientes para registrar un bien.</p>
                @csrf
                <div class="row">
                    <div class="col s6">
                        <label>Tipo de bien</label>
                        <select id="selectType" name="property_types_id" class="browser-default" required>
                            <option value="" disabled selected>Selecciona un tipo de bien</option>
                            @foreach ($property_types as $property)
                                <option value="{{ $property->id }}">{{ $property->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col s6">
                        <label>Tipo de bien</label>
                        <select name="object_expenses_id" class="browser-default" required>
                            <option value="" disabled selected>Selecciona un COG</option>
                            @foreach ($object_expenses as $object)
                                <option value="{{ $object->id }}">{{ $object->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <input name="brand" type="text" class="validate" required>
                        <label>Marca</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="model" type="text" class="validate" required>
                        <label>Modelo</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="price" type="text" class="validate" required>
                        <label>Precio</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="color" type="text" class="validate" required>
                        <label>Color</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="supplier" type="text" class="validate" required>
                        <label>Proveedor</label>
                    </div>
                    <div class="compute col s6" hidden>
                        <label>Donado</label>
                        <select name="given" class="browser-default">
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="general_description" class="materialize-textarea" rows="8"></textarea>
                        <label>Descripción general</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="full_description" class="materialize-textarea" rows="8"></textarea>
                        <label>Descripción completa</label>
                    </div>
                    <div class="vehicle input-field col s12" hidden>
                        <textarea name="vehicle_description" class="materialize-textarea" rows="8"></textarea>
                        <label>Descripción de vehículo</label>
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
                        <label>Tipo de bien</label>
                        <select id="property_types_id" name="property_types_id" class="browser-default" required>
                            @foreach ($property_types as $property)
                                <option value="{{ $property->id }}">{{ $property->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col s6">
                        <label>Tipo de bien</label>
                        <select id="object_expenses_id" name="object_expenses_id" class="browser-default" required>
                            @foreach ($object_expenses as $object)
                                <option value="{{ $object->id }}">{{ $object->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s6">
                        <input id="brand" name="brand" type="text" class="validate" required>
                        <label>Marca</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="model" name="model" type="text" class="validate" required>
                        <label>Modelo</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="price" name="price" type="text" class="validate" required>
                        <label>Precio</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="color" name="color" type="text" class="validate" required>
                        <label>Color</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="supplier" name="supplier" type="text" class="validate" required>
                        <label>Proveedor</label>
                    </div>
                    <div class="computeUpdate col s6" hidden>
                        <label>Donado</label>
                        <select id="given" name="given" class="browser-default">
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="general_description" name="general_description" class="materialize-textarea" rows="8"></textarea>
                        <label>Descripción general</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="full_description" name="full_description" class="materialize-textarea" rows="8"></textarea>
                        <label>Descripción completa</label>
                    </div>
                    <div class="vehicleUpdate input-field col s12" hidden>
                        <textarea id="vehicle_description" name="vehicle_description" class="materialize-textarea" rows="8"></textarea>
                        <label>Descripción de vehículo</label>
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
            $('#selectType').change(function(){
                let val = $(this).val();

                if(val == 1){
                    $('.compute').hide('slow');
                    $('.vehicle').show('slow');
                }else{
                    if(val == 2){
                        $('.compute').show('slow');
                        $('.vehicle').hide('slow');
                    }else{
                        $('.compute').hide('slow');
                        $('.vehicle').hide('slow');
                    }
                }
            });

            $('#property_types_id').change(function(){
                let val = $(this).val();

                if(val == 1){
                    $('.computeUpdate').hide('slow');
                    $('.vehicleUpdate').show('slow');
                }else{
                    if(val == 2){
                        $('.computeUpdate').show('slow');
                        $('.vehicleUpdate').hide('slow');
                    }else{
                        $('.computeUpdate').hide('slow');
                        $('.vehicleUpdate').hide('slow');
                    }
                }
            });

            $(document).on('click', '.edit', function(){
                var id = $(this).attr('data-id');
                $('#brand').val('Cargando...').focus();
                $('#model').val('Cargando...').focus();
                $('#price').val('Cargando...').focus();
                $('#color').val('Cargando...').focus();
                $('#supplier').val('Cargando...').focus();
                $('#general_description').val('Cargando...').focus();
                $('#full_description').val('Cargando...').focus();
                $('#vehicle_description').val('Cargando...').focus();
                $.get('{{ url('properties') }}/' + id, function(property){
                    $('#brand').val(property.brand);
                    $('#model').val(property.model);
                    $('#price').val(property.price);
                    $('#color').val(property.color);
                    $('#supplier').val(property.supplier);
                    $('#general_description').val(property.general_description);
                    $('#full_description').val(property.full_description);
                    $('#vehicle_description').val(property.vehicle_description);
                    $('#property_types_id').val(property.property_types_id);
                    if(property.property_types_id == 1){
                        $('.computeUpdate').hide('slow');
                        $('.vehicleUpdate').show('slow');
                        $('#vehicle_description').focus();
                    }else{
                        if(property.property_types_id == 2){
                            $('.computeUpdate').show('slow');
                            $('.vehicleUpdate').hide('slow');
                        }else{
                            $('.computeUpdate').hide('slow');
                            $('.vehicleUpdate').hide('slow');
                        }
                    }
                    $('#object_expenses_id').val(property.object_expenses_id);
                    $('#formUpdate').attr('action', '{{ url('properties') }}/' + id);
                });
            });

            $(document).on('click', '.delete', function(){
                var id = $(this).attr('data-id');
                $('#formDelete').attr('action', '{{ url('properties') }}/' + id);
            });
        });
    </script>
@endsection
