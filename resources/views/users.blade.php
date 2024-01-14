@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->

        <!-- Page Content -->
        <div class="content">
          <!-- Dynamic Table Full -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Usuarios<small>:</small></h3>
              <div class="block-options">
                <div class="block-options-item">
                 <a href="/singUpForm" type="button" class="btn btn-primary">Crear usuario</a>
                </div>
              </div>
            </div>
            <div class="block-content block-content-full">
              <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
              <table class="table table-bordered  table-striped  table-sm table-vcenter js-dataTable-full">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Cargo</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Creado</th>
                        <th>Editar</th>
                        <th>Estado</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ isset($user->userRole->name) ? $user->userRole->name : ''}}</td>
                        <td>{{ $user->position }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          @if($user->active ==1)
                          <i class="si si-check text-success"></i> Activo
                          @endif
                          @if($user->active == 0)
                          <i class="si si-close text-warning"></i> Inactivo
                          @endif
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td><a href="user/{{$user->id}}">Editar</a></td>
                        <td>                          
                        @if($user->active == 0)
                        <a href="/statusUpdateUser?id={{$user->id}}&active=1" class="text-success">Activar</a>
                        @endif
                        @if($user->active == 1)
                        <a href="/statusUpdateUser?id={{$user->id}}&active=0" class="text-danger">Inactivar</a>
                        @endif
                        <td>
                          <a href="/deleteUser?id={{$user->id}}" class="btn confirmation"><i class="si si-trash text-danger"></i></a>
                        </td>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

    <!-- END Page Content -->
@endsection


@section('js_after')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>

    <!-- <script src="{{ asset('js/oneui.app.min.js') }}"></script> -->
    <script src="{{ asset('js/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/pages/be_pages_dashboard.min.js') }}"></script>
 
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('js/plugins/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/pages/be_comp_charts.min.js') }}"></script>

    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
    <script>One.helpersOnLoad(['jq-easy-pie-chart', 'jq-sparkline']);</script>

    <script>
        $(".confirmation").click(function(){
          return confirm('¿Está seguro de eliminar este usuario?');
        });
    </script>
@endsection