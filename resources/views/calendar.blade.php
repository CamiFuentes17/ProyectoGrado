@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
      <!-- Page JS Plugins CSS -->
      <link rel="stylesheet" href="{{ asset('js/plugins/fullcalendar/main.min.css') }}">
@endsection

@section('content')
      <!-- Main Container -->
      <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
          <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
              <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-2">
                  Calendario de Solicitudes
                </h1>
                <!-- <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                  A solid foundation to build your calendar based web application. Powered by Full Calendar.
                </h2> -->
              </div>
              <!-- <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                  <li class="breadcrumb-item">
                    <a class="link-fx" href="javascript:void(0)">Components</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    Calendar
                  </li>
                </ol>
              </nav> -->
            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
          <!-- Calendar -->
          <div class="block block-rounded">
            <div class="block-content">
              <div class="row items-push">
                <div class="col-md-8 col-lg-7 col-xl-9">
                  <!-- Calendar Container -->
                  <div id="js-calendar"></div>
                </div>
                <div class="col-md-4 col-lg-5 col-xl-3">
                  <!-- Add Event Form -->
                  <form class="js-form-add-event push" >
                    <div class="input-group">
                      <input type="text" class="js-add-event form-control" value="Próximas solicitudes:" disabled>
                      <span class="input-group-text">
                        <!-- <i class="fa fa-fw fa-plus-circle"></i> -->
                      </span>
                    </div>
                  </form>
                  <!-- END Add Event Form -->

                  <!-- Event List -->
                  <ul id="js-events" class="list list-events">
                  
                  @foreach ($requisitions as $requisition)
                    <li>
                      <div class="js-event p-2 fs-sm fw-medium rounded bg-info-light text-info">{{$requisition->name}} {{$requisition->deliverable_date}}</div>
                    </li>
                  @endforeach

                  </ul>
                  <div class="text-center" style="display: none;">
                    <p class="fs-sm text-muted">
                      <i class="fa fa-arrows-alt"></i> Drag and drop events on the calendar
                    </p>
                  </div>
                  <!-- END Event List -->
                </div>
              </div>
            </div>
          </div>
          <!-- END Calendar -->
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
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

    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/fullcalendar/main.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/be_comp_calendar.js') }}"></script>

@endsection