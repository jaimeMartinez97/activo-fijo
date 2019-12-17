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
                                 <h4 class="card-title">Tipo de Bienes registrados</h4>
                                 <div class="row">
                                     <div class="col s12">
                                         <div class="container">
                                             <table id="page-length-option" class="display">
                                                 <thead>
                                                     <tr>
                                                         <th>Tipo de bien</th>
                                                         <th>Acciones</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     @foreach ($property_types as $item)
                                                         <tr>
                                                             <td>{{ $item->type }}</td>
                                                             <td>
                                                                 <a class="edit mb-6 btn-floating waves-effect waves-light blue lightrn-1 modal-trigger modificar" href="#modalUpdate" data-id="{{ $item->id }}">
                                                                     <i class="material-icons">create</i>
                                                                     
                                                                 </a>
                                                                 <a class="delete mb-6 btn-floating waves-effect waves-light red lightrn-1 modal-trigger" href="#modalDelete" data-id="{{ $item->id }}">
                                                                     <i class="material-icons">delete</i>
                                                                 </a>
                                                             </td>
                                                         </tr>
                                                     @endforeach
                                                 </tbody>
                                                 <tfoot>
                                                     <tr>
                                                         <th>Tipo de bien</th>
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
        <form class="col s12" action="{{ url('property_type') }}" method="POST">
            <div class="modal-content">
                <h4>Registrar bien</h4>
                <p>Ingresa los datos correspondientes para registrar un bien.</p>
                @csrf
                <div class="row">
                    <div class="col s6">
                        <label>Tipo de bien:</label>
                        <input type="text" name="type">
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
                        <label>Tipo de bien:</label>
                        <input type="text" name="type" id="tipo">                        
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
                console.log(id)
                $('#formUpdate').attr("action",'{{url("property_type")}}/'+id)
                $('#tipo').val("cargando...")
                $.get('{{url("property_type")}}/'+id,function(proptype){
                $('#tipo').val(proptype.type)                         
                })
            })
        $(document).on('click', '.delete', function(){
            var id = $(this).attr('data-id');
            // $('#formDelete').attr('action', '{{ url("property_type") }}/' + id);
            var toastHTML = '<span>esta seguro de borrar este tipo de bien?</span><button class="btn-flat toast-action">si borrar</button><button class="btn-flat toast-action">cancelar</button>';
            M.toast({html: toastHTML});
        });
    </script>
@endsection