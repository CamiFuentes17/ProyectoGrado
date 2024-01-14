@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
      <div class="content">
            <!-- Search Form -->
            <!-- <form action="/searchRequisition" method="POST">
              <div class="row justify-content-left mb-4">
                <div class="col-sm-6 col-xl-3">
                  <div class="input-group input-group-lg">
                    <span class="input-group-text">#</span>
                    <input type="text" class="form-control" id="example-group1-input1" name="id" placeholder="Buscar..">
                    <button type="submit" class="btn btn-dark">
                      <i class="fa fa-search opacity-75"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form> -->
            <!-- END Search Form -->      
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">Solicitudes <small>Listado</small></h3>
          </div>
          <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-sm table-vcenter" id="table">
              <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Area</th>
                      <th>Tipo Solicitud</th>
                      <th>Tipo Entregable</th>
                      <th>Estado</th>                  
                      <th>Gestionar</th>                  
                  </tr>
              </thead>
              <tbody>
              @foreach ($requisitions as $requisition)
                    <tr>
                        <td class="text-center" ><a href="/requisitionDetail?id={{$requisition->id}}">{{ $requisition->id }}</a></td>
                        <td><a href="/requisitionDetail?id={{$requisition->id}}">{{ $requisition->name }}</a></td>
                        <td>{{ $requisition->userRequisition->name }}</td>
                        <td>{{ $requisition->area }}</td>
                        <td>{{ $requisition->requisition_type }}</td>
                        <td>{{ $requisition->deliverable_type }}</td>
                        <td>
                          @if($requisition->status == "Pendiente") 
                            <span class="badge bg-info">{{$requisition->status}}</span>
                          @endif
                          @if($requisition->status == "En Proceso") 
                            <span class="badge bg-warning">{{$requisition->status}}</span>
                          @endif
                          @if($requisition->status == "Cerrado") 
                            <span class="badge bg-success">{{$requisition->status}}</span>
                          @endif
                          @if($requisition->status == "Devuelto") 
                            <span class="badge bg-danger">{{$requisition->status}}</span>
                          @endif
                        </td>
                        @if($requisition->status == "Pendiente" || $requisition->status == "En Proceso")
                        <td class="text-center"><a href="/requisitionDetail?id={{$requisition->id}}" class="btn btn-info">Gestionar</a></td>
                        @else
                        <td></td>
                        @endif

                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- END Page Content -->
      @if( isset($showCode) && $showCode==1 )
      <!-- Fade In Block Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="block block-rounded block-transparent mb-0">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Nuevo código de solicitud</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                      <i class="fa fa-fw fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="block-content fs-sm">
                  <p>El nuevo código de solicitud es:</p>
                  <h2> <span id="newCode">{{$newCode}}</span> <button type="button" onclick="copyCode()" class="btn btn-success btn-sm"><i class="far fa-1x fa-copy"></i></button> </h2>  
                </div>
                <div class="block-content block-content-full text-end bg-body">
                  <a href="/requisitions" class="btn btn-sm btn-primary">Cerrar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- END Fade In Block Modal -->
      @endif

@endsection

@section('js_after')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#modal').modal('show');
        });
    </script>
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>

    <script>
      function copyCode() {
        var copyText =  document.getElementById("newCode").innerHTML;
        navigator.clipboard.writeText(copyText);
      }
    </script>

    <script>
      $(document).ready( function () {
          $('#table').dataTable( {
          "order": [0, 'desc' ],

          "searching": true,
          "language": {
            "lengthMenu": "Mostrar _MENU_ resultados por página",
            "zeroRecords": "Sin resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros",
            "infoFiltered": "(filtrados de _MAX_ total registros)"
          },

          lengthMenu: [
            [20, 100, 200, -1],
            [20, 100, 200, 'Todos']
          ],

        });
      });

    </script>
@endsection