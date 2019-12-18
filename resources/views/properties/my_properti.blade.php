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
                                
                                <h4 class="card-title">Mis Bienes registrados</h4>
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($my_pro as $item)
                                                        <tr>
                                                            <td>{{ $item->property_type->type }}</td>
                                                            <td>{{ $item->object_expense->description }}</td>
                                                            <td>{{ $item->brand }}</td>
                                                            <td>{{ $item->model }}</td>
                                                            <td>{{ $item->price}}</td>
                                                            <td>{{ $item->color }}</td>
                                                            <td>{{ $item->supplier }}</td>
                                                            <td>
                                                                @if ($item->property_types_id != 2)
                                                                    No aplica
                                                                @else
                                                                    @if ($item->given == 0)
                                                                        No
                                                                    @else
                                                                        Si
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->general_description }}</td>
                                                            <td>{{ $item->full_description }}</td>
                                                            <td>{{ empty($item->vehicle_description) ? 'No aplica' : $property->vehicle_description }}</td>
                                                            
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
@endsection
