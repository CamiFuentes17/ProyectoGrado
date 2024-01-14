@extends('layouts.simple')

@section('content')
<div id="page-container">
  <!-- Main Container -->
  <main id="main-container">
    <!-- Page Content -->
    <div class="hero-static d-flex align-items-center">
      <div class="w-100">
        <!-- Sign In Section -->
        <div class="bg-body-extra-light">
          <div class="content content-full">
            <div class="row g-0 justify-content-center">
              <div class="col-md-8 col-lg-6 col-xl-4 py-4 px-4 px-lg-5">
                <!-- Header -->
                <div class="text-center">
                  <p class="mb-2">
                    <i class="fa fa-2x fa-circle-notch text-primary"></i>
                  </p>
                  <h1 class="h4 mb-1">
                    APP
                  </h1>
                  <p class="fw-medium text-muted mb-3">
                  Bienvenido, por favor ingrese o <a href="/singUpForm">Regístrese</a> para crear cuenta.
                  </p>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                  @csrf  
                  <div class="py-3">
                  <div class="mb-4">
                    <input type="email" class="form-control form-control-alt form-control-lg" id="email" name="email" placeholder="email">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control form-control-alt form-control-lg" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="mb-4">
                      <div class="d-md-flex align-items-md-center justify-content-md-between">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="login-remember" name="login-remember">
                          <label class="form-check-label" for="login-remember">Recuerdame</label>
                        </div>
                        <div class="py-2">
                          <a class="fs-sm fw-medium" href="/recoveryPasswordForm">Recuperar Contraseña</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-6 col-xxl-5 mt-3">
                      <button type="submit" class="btn w-100 btn-alt-success">
                        <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Ingresar
                      </button>
                    </div>
                    <div class="col-lg-6 col-xxl-5 mt-3">
                      <a href="/searchRequisition" class="btn w-100 btn-alt-info">
                        <i class="fa fa-fw fa-search me-1 opacity-50"></i> Consultar
                      </a>
                    </div>
                  </div>

                </form>
                <!-- END Sign In Form -->
              </div>
            </div>
          </div>
        </div>
        <!-- END Sign In Section -->

        <!-- Footer -->
        <div class="fs-sm text-center text-muted py-3">
          <strong>APP</strong> &copy; <span data-toggle="year-copy"></span>
        </div>
        <!-- END Footer -->
      </div>
    </div>
    <!-- END Page Content -->

  </main>
  <!-- END Main Container -->
</div>
@endsection
