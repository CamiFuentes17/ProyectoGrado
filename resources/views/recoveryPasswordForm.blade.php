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
                    Recuperar Contraseña
                </h1>
           
                <!-- <p class="text-muted mb-3">
                  Get your access today in one easy step
                </p> -->
              </div>
              <!-- END Header -->

              <!-- Sign Up Form -->
              <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
              <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signup" action="/recoveryPassword" method="POST">
                    @csrf
                    <div class="py-3">
                        <div class="mb-4">
                            <input type="text" class="form-control form-control-lg form-control-alt" id="name" name="name" placeholder="Email" required>
                        </div>

                        <div class="mb-4">
                            <input type="number" class="form-control form-control-lg form-control-alt" id="otp" name="otp" placeholder="Codigo OTP" required>
                        </div>

 
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-xxl-5">
                          <button type="submit" class="btn w-100 btn-alt-success">
                              <i class="fa fa-fw fa-check me-1 opacity-50"></i> Recuperar
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


@section('js_after')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
@endsection