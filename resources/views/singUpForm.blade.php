@extends('layouts.simple')


@section('content')
<div id="page-container">

<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="hero-static d-flex align-items-center">
    <div class="w-100">
      <!-- Sign Up Section -->
      <div class="bg-body-extra-light">
        <div class="content content-full">
          <div class="row g-0 justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4 py-4 px-4 px-lg-5">
              <!-- Header -->
              <div class="text-center">
                <p class="mb-2">
                  <i class="fa fa-2x fa-circle-notch text-primary"></i>
                </p>
                <h1 class="h4  mb-1">
                    Crear Cuenta
                </h1>
                @if (isset($success))
                <div class="alert alert-success alert-dismissible" role="alert">
                  <h3 class="alert-heading h4 my-2">¡Listo!</h3>
                  <p class="mb-0">
                    Usuario creado exitosamente, una vez el Administrador lo active podrá  <a class="alert-link" href="/">Ingresar</a>!
                  </p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif              
                <!-- <p class="text-muted mb-3">
                  Get your access today in one easy step
                </p> -->
              </div>
              <!-- END Header -->

              <!-- Sign Up Form -->
              <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
              <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signup" action="/singUp" method="POST">
                    @csrf
                    <div class="py-3">
                        <div class="mb-4">
                            <input type="text" class="form-control form-control-lg form-control-alt" id="name" name="name" placeholder="Nombre" required>
                        </div>
                        <div class="mb-4">
                            <input type="text" class="form-control form-control-lg form-control-alt" id="position" name="position" placeholder="Cargo" required>
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control form-control-lg form-control-alt" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control form-control-lg form-control-alt" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control form-control-lg form-control-alt" id="password_confirm" name="password_confirm" placeholder="Confirmar Password" required>
                        </div>
                        <div class="mb-4">
                            <select class="form-control form-control-alt" id="example-select" name="role_id" required>
                            <option value="" disabled selected>Seleccione una opción:</option>
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
                              <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Registro
                          </button> 
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-lg-6 col-xxl-5 text-center">
                          <a class="link-fx" href="/"> <i class="fa fa-home"> </i> Login </a>
                        </div>
                    </div>
                </form>
              <!-- END Sign Up Form -->
            </div>
          </div>
        </div>
      </div>
      <!-- END Sign Up Section -->

        <!-- Footer -->
        <div class="fs-sm text-center text-muted py-3">
        <strong>QA APPROVAL</strong> &copy; <span data-toggle="year-copy"></span>
        </div>
        <!-- END Footer -->
    </div>

  </div>
  <!-- END Page Content -->

</main>
<!-- END Main Container -->
</div>
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