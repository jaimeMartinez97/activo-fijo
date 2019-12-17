@extends('layouts.app')
@section('title', 'Activo Fijo | Inicio')
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
                                 <h4 class="card-title">Coordinaciones de zoonas registradas</h4>
                                 <div class="row">
                                     <div class="col s12">
                                         <div class="container">
                                             <table id="page-length-option" class="display">
                                                 <thead>
                                                     <tr>
                                                         <th>Nombre</th>
                                                         <th>Direccion</th>
                                                         <th>Colonia</th>
                                                         <th>Codigo postal</th>
                                                         <th>Telefono</th>
                                                         <th>Acciones</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     @foreach ($zones as $item)
                                                         <tr>
                                                             <td>{{ $item->name }}</td>
                                                             <td>{{ $item->address }}</td>
                                                             <td>{{ $item->colony }}</td>
                                                             <td>{{ $item->zip_code }}</td>
                                                             <td>{{ $item->phone }}</td>
                                                             <td>
                                                                 <a class="edit mb-6 btn-floating waves-effect waves-light blue lightrn-1 modal-trigger modificar" href="#modalUpdate" data-id="{{ $item->id }}">
                                                                     <i class="material-icons">create</i>
                                                                     
                                                                 </a>
                                                                 <a class="delete mb-6 btn-floating waves-effect waves-light red lightrn-1 " href="#modalDelete" data-id="{{ $item->id }}">
                                                                     <i class="material-icons">delete</i>
                                                                 </a>
                                                             </td>
                                                         </tr>
                                                     @endforeach
                                                 </tbody>
                                                 <tfoot>
                                                     <tr>
                                                        <th>Nombre</th>
                                                        <th>Direccion</th>
                                                        <th>Colonia</th>
                                                        <th>Codigo postal</th>
                                                        <th>Telefono</th>
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
        <form class="col s12" action="{{ url('zone_coordinator') }}" method="POST">
            <div class="modal-content">
                <h4>Registrar bien</h4>
                <p>Ingresa los datos correspondientes para registrar un bien.</p>
                @csrf
                <div class="row">
                    <div class="col s6">
                        <label>Nombre:</label>
                        <input type="text" name="name">                        
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>Direccion:</label>
                        <input type="text" name="address">                        
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>Colonia:</label>
                        <input type="text" name="colony">                        
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>Codigo postal:</label>
                        <input type="text" name="zip_code" >                        
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>Telefono:</label>
                        <input type="text" name="phone">                        
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
                <p>Ingresa los datos en los campos deseados para actualizar.</p>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col s6">
                        <label>Nombre:</label>
                        <input type="text" name="name" id="name">                        
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>Direccion:</label>
                        <input type="text" name="address" id="address">                        
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>Colonia:</label>
                        <input type="text" name="colony" id="colony">                        
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>Codigo postal:</label>
                        <input type="text" name="zip_code" id="zip_code">                        
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s6">
                        <label>Telefono:</label>
                        <input type="text" name="phone" id="phone">                        
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
    <script>        
        $('.modificar').click(function(){
                let id=$(this).attr("data-id")
                $('#formUpdate').attr("action",'{{url("zone_coordinator")}}/'+id)
                $('#tipo').val("cargando...")
                $.get('{{url("zone_coordinator")}}/'+id,function(zonecor){
                    $('#name').val(zonecor.name)        
                    $('#address').val(zonecor.address)     
                    $('#colony').val(zonecor.colony)   
                    $('#zip_code').val(zonecor.zip_code)   
                    $('#phone').val(zonecor.phone)                  
                })
            })
        $(document).on('click', '.delete', function(){
            var id = $(this).attr('data-id');
            // $('#formDelete').attr('action', '{{ url("property_type") }}/' + id);
            var toastHTML = '<span>¿está seguro de borrar esta coordinacion?</span><button id="siD" class="btn-flat toast-action">si</button><button onclick="M.Toast.dismissAll()" class="btn-flat toast-action">cancelar</button>';
            M.toast({html: toastHTML});
            $('#siD').click(function(){
                console.log('se elimino')
                $.ajax({
                        url: "{{url('zone_coordinator')}}/"+id,
                        type: "post",
                        data:{ 
                            _token:'{{ csrf_token() }}',_method:"delete"
                        },
                        dataType: 'json',
                        success: function(dataResult){
                            location.reload();
                        }
                    });
            })
        });
    </script>
@endsection