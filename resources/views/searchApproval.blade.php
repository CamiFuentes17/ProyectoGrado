@extends('layouts.simple')

@section('content')
<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="hero">
    <div class="hero-inner text-center">
      <div class="bg-body-extra-light">
        <div class="content content-full">
          <div class="py-4">
            <!-- Error Header -->
            <h1 class="display-1 fw-bolder text-default">
              Consultar
            </h1>
            <h2 class="h4 fw-normal text-muted mb-5">
             Ingrese aquí el código de aprobación para conocer el estado
            </h2>
            <!-- END Error Header -->

            <!-- Search Form -->
            <form action="/searchRequisition" method="POST">
              <div class="row justify-content-center mb-4">
                <div class="col-sm-6 col-xl-3">
                  <div class="input-group input-group-lg">
                    <span class="input-group-text">QA-</span>
                    <input type="text" class="form-control" id="example-group1-input1" name="id" placeholder="12345678">
                    <button type="submit" class="btn btn-dark">
                      <i class="fa fa-search opacity-75"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
            <!-- END Search Form -->
          </div>
        </div>
      </div>
      <div class="content content-full text-muted fs-sm fw-medium">
        <!-- Error Footer -->
        <!-- <p class="mb-1">
          Would you like to let us know about it?
        </p> -->
          Regresar al <a class="link-fx" href="/"> <i class="fa fa-home"> </i> login</a>
        <!-- END Error Footer -->
      </div>
    </div>
  </div>
  <!-- END Page Content -->

</main>
<!-- END Main Container -->
@endsection
