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
          <h3 class="block-title">Detalle Solicitud # {{$requisition->id}}</h3>
          <div class="block-options">
            <div class="block-options-item">
            <strong>Estado: {{$requisition->status}}</strong>
            </div>
          </div>
        </div>
        <div class="block-content block-content-full">
          <form action="{{ route('requisitionEdit') }}" id ="requisition_form" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <input type="hidden" name="user_id" value="{{$userSession->id}}">
                <input type="hidden" name="id" value="{{$requisition->id}}">

                <div class="col-md-2 my-3">
                  <label class="form-label" for="tech_lead_id">Tipo Solicitud</label>
                    <select class="form-control form-control-alt" id="requisition_type" name="requisition_type" required disabled>
                        <option value="{{$requisition->requisition_type}}" selected>{{$requisition->requisition_type}}</option>
                    </select>
                </div>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="tech_lead_id">Tipo Entregable</label>
                    <select class="form-control form-control-alt" id="deliverable_type" name="deliverable_type" required disabled>
                    <option value="{{$requisition->deliverable_type}}" selected>{{$requisition->deliverable_type}}</option>
                </div>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="tech_lead_id">Area</label>
                    <select class="form-control form-control-alt" id="Area" name="Area" required disabled>
                        <option value="{{$requisition->area}}" selected>{{$requisition->area}}</option>
                    </select>
                </div>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="sprint">Fecha Entregable</label>
                  <input type="date" class="form-control form-control-alt" id="deliverable_date" name="deliverable_date" value="{{$requisition->deliverable_date}}" disabled>
                </div>

                <div class="col-md-2 my-3" id="periodicity">
                <label class="form-label" for="sprint">Periodicidad</label>
                  <input type="text" class="form-control form-control-alt" name="periodicity" placeholder="#" value="{{$requisition->periodicity}}"  disabled>
                </div>                

                
                <div class="col-md-4 my-3">
                    <label class="form-check-label" for="example-switch-default1">Archivo de aprobación Seguridad:</label>
                    <p>
                      <a href="{{ asset('storage/' . $requisition->safety_approval_file) }}" target="_blank"> <img src="{{ asset('media/various/file.png') }}" alt="file" width="50"></a>
                    </p>
                </div>

                <hr>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="url_documentation">Base de datos</label>
                  <input type="text" class="form-control form-control-alt"  name="database" placeholder=""  value="{{$requisition->database}}" disabled>
                </div>    


                <div class="col-md-2 my-3">
                  <label class="form-label" for="url_documentation">Campos del reporte</label>
                  <input type="text" class="form-control form-control-alt"  name="report_fields" placeholder="" value="{{$requisition->report_fields}}"  disabled>
                </div>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="tech_lead_id">Tipo de Base</label>
                    <select class="form-control form-control-alt" id="Area" name="base_type" disabled>
                        <option value="{{$requisition->report_fields}}" >{{$requisition->report_fields}}</option>
                    </select>
                </div>                    

                <div class="col-md-2 my-3">
                  <label class="form-label" for="sprint">Rango Fecha inicial</label>
                  <input type="date" class="form-control form-control-alt" name="start_date" disabled>
                </div>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="sprint">Rango Fecha Final</label>
                  <input type="date" class="form-control form-control-alt" name="end_date" disabled>
                </div>

                <div class="col-md-12 my-3">
                  <label class="form-label" for="example-textarea-input">Descripción / Observaciones</label>
                  <textarea class="form-control" id="example-textarea-input-alt" name="description" >{{$requisition->description}}</textarea>
                </div>
              @if( !isset ($requisition->safety_approval_file_detail) )
                <div class="col-md-4 my-3" id="file_input">
                  <label class="form-label" for="example-textarea-input">Adjuntar Entrega:</label>
                  <input type="file" name="file" class="form-control">
                </div>
              @else
              <div class="col-md-4 my-3">
                    <label class="form-check-label" for="example-switch-default1">Archivo de entrega:</label>
                    <p>
                      <a href="{{ asset('storage/' . $requisition->safety_approval_file_detail) }}" target="_blank" class="btn btn-success"> Descargar <i class="fa fa-fw fa-download me-1 opacity-50"></i> </a>
                    </p>
                </div>
              @endif
              @if($userSession->role_id==1 || $userSession->role_id==2)
                <div class="row justify-content-center">
                  <div class="col-lg-6 col-xxl-5 mt-3">
                    <button type="submit" class="btn w-100 btn-alt-success">
                      <i class="fa fa-fw fa-download me-1 opacity-50"></i> Guardar y cerrar
                    </button>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-6 col-xxl-5 mt-3">
                    <button type="submit" class="btn w-100 btn-alt-warning" name="devolver" value="devolver">
                      <i class="fa fa-fw fa-save me-1 opacity-50"></i> Devolver
                    </button>
                  </div>
                </div>
              @endif
            </div>             

          </form>   
        </div>

      </div>
    </div>

    <!-- END Page Content -->

    <!-- Fade In Block Modal -->
    <div class="modal fade" id="modal-block-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-block-fadein" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="block block-rounded block-transparent mb-0">
            <div class="block-header block-header-default">
              <h3 class="block-title">Cambiar estado de solicitud</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                  <i class="fa fa-fw fa-times"></i>
                </button>
              </div>
            </div>
            <div class="block-content fs-sm">
              <p>¿Esta seguro de realizar el cambio de estado?, esta acción no se puede reversar</p>
            </div>
            <div class="block-content block-content-full text-end bg-body">
              <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal" id="submit_btn">Cambiar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- END Fade In Block Modal -->


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
    // Obtener el formulario y los botones
    const form = document.getElementById('requisition_form');
    const submitBtn = document.getElementById('submit_btn');
    submitBtn.addEventListener('click', function(e) {
        e.preventDefault();
        //form.action = '/proccesForm'; 
        form.submit();
    });
    </script>
    
    <script>
      // Obtener la referencia a los elementos <select> en HTML y lleenar las marcas según el país
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