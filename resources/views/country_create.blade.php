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
          <h3 class="block-title">Nuevo <strong>País</strong></h3>
        </div>
        <div class="block-content block-content-full">
          <form action="/countries" method="POST" >
            @csrf
            <div class="row">
                <input type="hidden" name="user_id" value="{{$userSession->id}}">

                <div class="col-md-3 my-3">
                  <label class="form-label" for="example-text-input-alt">Nombre </label>
                  <input type="text" class="form-control form-control-alt"  name="name"  placeholder="Argentna, Colombia..." required>
                </div>
                <div class="col-md-3 my-3">
                  <label class="form-label" for="example-text-input-alt">ISO </label>
                  <input type="text" class="form-control form-control-alt"  name="ISO"  placeholder="CO,BO,BR..." required>
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

    <script>
      // Obtener la referencia a los elementos <select> en HTML
      var countrySelect = document.getElementById("countrySelect");
      var brandSelect = document.getElementById("brandSelect");
      // Agregar un event listener al cambio de valor del primer <select>
      countrySelect.addEventListener("change", function() {
        // Obtener el valor seleccionado
        var selectedCountryId = countrySelect.value;
        // Construir la URL dinámicamente con el parámetro "id"
        var url = "/brandsCountry/" + selectedCountryId;
        // Hacer la solicitud al endpoint y obtener los datos
        fetch(url)
          .then(response => response.json())
          .then(data => {
            // Limpiar el segundo <select> antes de llenarlo con nuevas opciones
            brandSelect.innerHTML = "";
            // Recorrer los datos y crear las opciones del segundo <select>
            data.forEach(brand => {
              // Crear una nueva opción
              var option = document.createElement("option");
              // Establecer el valor y el texto de la opción
              option.value = brand.id;
              option.text = brand.name;
              // Agregar la opción al segundo <select>
              brandSelect.appendChild(option);
            });
          })
          .catch(error => {
            console.error("Error al obtener los datos:", error);
          });
      });
    </script>
@endsection