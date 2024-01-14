@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
      <!-- Dynamic Table Full -->
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">Editar Usuario<small>:</small></h3>
        </div>
        <div class="block-content block-content-full">
          <form class="js-validation-signup" action="/userUpdate" method="POST">
              @csrf
              <div class="py-3">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                  <div class="mb-4">
                      <input type="text" class="form-control form-control-lg form-control-alt" id="name" name="name" value="{{ $user->name }}"  placeholder="Nombre" required>
                  </div>
                  <div class="mb-4">
                      <input type="text" class="form-control form-control-lg form-control-alt" id="position" name="position" value="{{ $user->position }}"  placeholder="Cargo" required>
                  </div>
                  <div class="mb-4">
                      <input type="email" class="form-control form-control-lg form-control-alt" id="email" name="email" value="{{ $user->email }}"  placeholder="Email" required>
                  </div>
                  <div class="mb-4">
                      <input type="password" class="form-control form-control-lg form-control-alt" id="password" name="password" placeholder="Password" >
                  </div>
                  <div class="mb-4">
                      <input type="password" class="form-control form-control-lg form-control-alt" id="password_confirm" name="password_confirm"  placeholder="Confirmar Password">
                  </div>
                  <div class="mb-4">
                      <input type="text" class="form-control form-control-lg form-control-alt" id="authorized_ip" name="authorized_ip"  value="{{ $user->authorized_ip }}" placeholder="IP autorizada">
                  </div>
                  <div class="mb-4">
                      <select class="form-control form-control-alt" id="example-select" name="role_id" required>
                      <option value="{{$user->role_id}}" selected>Seleccione una opción:</option>
                      @foreach ($roles as $role)
                      <option value="{{$role->id}}">{{$role->name}}</option>
                      @endforeach
                      </select>
                  </div>
                  <div class="mb-4">
                  @if (isset($error))
                      <div class="alert alert-warning">
                          <p>{{ $error }}</p>
                      </div>
                  @endif
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="col-lg-6 col-xxl-5">
                    <button type="submit" class="btn w-100 btn-alt-success">
                        <i class="fa fa-fw fa-save me-1 opacity-50"></i> Guardar
                    </button> 
                  </div>
              </div>
          </form>
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
@endsection