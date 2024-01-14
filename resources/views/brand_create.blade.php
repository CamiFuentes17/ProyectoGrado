@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
      <div class="block block-rounded block-themed">
        <div class="block-header bg-primary-light">
          <h3 class="block-title">Nueva <strong>Marca</strong></h3>
        </div>
        <div class="block-content block-content-full">
          <form action="/brands" method="POST" >
            @csrf
            <div class="row">
                <input type="hidden" name="user_id" value="{{$userSession->id}}">
                <div class="col-md-3 my-3">
                  <label class="form-label" for="example-text-input-alt">Nombre </label>
                  <input type="text" class="form-control form-control-alt"  name="name"  placeholder="Aguila..." required>
                </div>

                <div class="col-md-3 my-3">
                  <label class="form-label" for="country">País Asociado</label>
                  <select class="form-control form-control-alt" id="countrySelect" name="country_id" required>
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-3 my-3">
                  <label class="form-label" for="example-text-input-alt">Url Img Logo </label>
                  <input type="text" class="form-control form-control-alt"  name="url_img"   >
                </div>   

                <div class="col-md-3 my-3">
                  <label class="form-label" for="example-text-input-alt">Descripción </label>
                  <input type="text" class="form-control form-control-alt"  name="description" >
                </div>  

                <div class="col-md-12 my-3 float-right">
                  <input type="submit" class="btn btn-success" name="crear" >
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