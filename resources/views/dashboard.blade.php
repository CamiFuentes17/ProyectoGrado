@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-2">
                Dashboard 
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                Bienvenido <a class="fw-semibold" href="#">{{$userSession->name}}</a>
            </h2>
            </div>
        </div>

                <!-- Page Content -->
                <div class="content">
          <!-- Quick Overview -->
          <div class="row">
            <div class="col-6 col-lg-3">
              <a class="block block-rounded block-link-shadow text-center" href="be_pages_ecom_orders.html">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-primary">{{$requisitionsCounts['totalRequisitions']}}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-muted mb-0">
                    Solicitudes Pendientes
                  </p>
                </div>
              </a>
            </div>
            <div class="col-6 col-lg-3">
              <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-success">{{$requisitionsCounts['inProgressRequisitions']}}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-muted mb-0">
                    Solicitudes en Progreso
                  </p>
                </div>
              </a>
            </div>
            <div class="col-6 col-lg-3">
              <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-dark">{{$requisitionsCounts['closedRequisitions']}}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-muted mb-0">
                    Solicitudes Cerradas
                  </p>
                </div>
              </a>
            </div>
            <div class="col-6 col-lg-3">
              <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-dark">{{$requisitionsCounts['returnedRequisitions']}}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-muted mb-0">
                    Solicitudes Devueltas
                  </p>
                </div>
              </a>
            </div>
          </div>
          <!-- END Quick Overview -->

          <!-- Orders Overview -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Orders Overview</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                  <i class="si si-refresh"></i>
                </button>
              </div>
            </div>
            <div class="block-content block-content-full">
              <!-- Chart.js is initialized in js/pages/be_pages_ecom_dashboard.min.js which was auto compiled from _js/pages/be_pages_ecom_dashboard.js) -->
              <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
              <div style="height: 400px;"><canvas id="js-chartjs-overview"></canvas></div>
            </div>
          </div>
          <!-- END Orders Overview -->

          <!-- Top Products and Latest Orders -->
          <div class="row row-deck">

            <div class="col-xl-12">
              <!-- Latest Orders -->
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Latest Orders</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                      <i class="si si-refresh"></i>
                    </button>
                  </div>
                </div>
                <div class="block-content">
                  <table class="table table-borderless table-striped table-vcenter">
                  <thead>
                  <tr>
                      <th class="text-center">#</th>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Area</th>
                      <th>Tipo Solicitud</th>
                      <th>Tipo Entregable</th>
                      <th>Estado</th>     
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
                    </tr>
                  @endforeach
              </tbody>
                  </table>
                </div>
              </div>
              <!-- END Latest Orders -->
            </div>
          </div>
          <!-- END Top Products and Latest Orders -->
        </div>
        <!-- END Page Content -->


    <!-- END Page Content -->
@endsection


@section('js_after')
    <script>
      var dataChart = @json($dataChart);
    </script>
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
    <!-- <script src="{{ asset('js/pages/requisitionsCountries.js') }}"></script>
    <script src="{{ asset('js/pages/char_pie.js') }}"></script>
    <script src="{{ asset('js/pages/char_brands.js') }}"></script>
    <script src="{{ asset('js/pages/be_comp_charts.min.js') }}"></script> -->
 
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables-buttons/buttons.colVis.min.js') }}"></script>

    <!-- <script src="{{ asset('js/plugins/easy-pie-chart/jquery.easypiechart.min.js') }}"></script> -->
    <!-- <script src="{{ asset('js/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>  -->
    <!-- <script src="{{ asset('js/pages/be_comp_charts.min.js') }}"></script> -->
    <script src="{{ asset('js/pages/be_pages_ecom_dashboard.js') }}"></script>

    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
    <script>One.helpersOnLoad(['jq-easy-pie-chart', 'jq-sparkline']);</script>


@endsection