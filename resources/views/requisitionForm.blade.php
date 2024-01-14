@@ -1,189 +0,0 @@
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
          <h3 class="block-title">Nueva Solicitud de <strong>{{$userSession->name}}</strong></h3>
        </div>
        <div class="block-content block-content-full">
          <form action="{{ route('requisitionStore') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input type="hidden" name="user_id" value="{{$userSession->id}}">
                <input type="hidden" name="status" value="Pendiente">
                
                <div class="col-md-2 my-3">
                  <label class="form-label" for="url_documentation">Nombre requerimiento</label>
                  <input type="text" class="form-control form-control"  name="name" placeholder=""  required>
                </div>   

                <div class="col-md-2 my-3">
                  <label class="form-label" for="tech_lead_id">Tipo Solicitud</label>
                    <select class="form-control form-control" id="requisition_type" name="requisition_type" required>
                        <option value="" disabled selected>Seleccione una opción:</option>
                        <option value="Crear Base Datos">Crear Base Datos</option>
                        <option value="Eliminar usurio">Eliminar usurio</option>
                        <option value="Entregar reporte">Entregar reporte</option>
                        <option value="Gestionar proceso automatico">Gestionar proceso automatico</option>
                        <option value="Listado datos">Listado datos</option>
                    </select>
                </div>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="tech_lead_id">Tipo Entregable</label>
                    <select class="form-control form-control" id="deliverable_type" name="deliverable_type" required>
                        <option value="" disabled selected>Seleccione una opción:</option>
                        <option value="csv">csv</option>
                        <option value="json">json</option>
                        <option value="txt">txt</option>
                        <option value="print">print</option>
                        <option value="job">job</option>
                        <option value="zip">zip</option>
                        <option value="link">link</option>
                    </select>
                </div>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="tech_lead_id">Area</label>
                    <select class="form-control form-control" id="area" name="area" required>
                        <option value="" disabled selected>Seleccione una opción:</option>
                        <option value="Administrativo">Administrativo</option>
                        <option value="Tecnología">Tecnología</option>
                        <option value="Operaciones">Operaciones</option>
                        <option value="Comercial">Comercial</option>
                    </select>
                </div>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="sprint">Fecha Entregable</label>
                  <input type="date" class="form-control form-control" id="deliverable_date" name="deliverable_date" required>
                </div>

                <div class="col-md-2 my-3" id="periodicity">
                <label class="form-label" for="sprint">Periodicidad</label>
                  <input type="number" class="form-control form-control" name="periodicity" placeholder="#" >
                </div>                

                <div class="col-md-3 my-3">
                    <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" value="1" id="aprobacion" name="stwitch1">
                          <label class="form-check-label" for="example-switch-default1">Aprobación Seguridad</label>
                    </div>
                </div>

                <div class="col-md-4 my-3" id="file_input">
                  <input type="file" name="file" >
                </div>

                <hr>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="url_documentation">Base de datos</label>
                  <input type="text" class="form-control form-control"  name="database" placeholder=""  required>
                </div>    

                <div class="col-md-2 my-3">
                  <label class="form-label" for="url_documentation">Campos del reporte</label>
                  <input type="text" class="form-control form-control"  name="report_fields" placeholder=""  required>
                </div>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="tech_lead_id">Tipo de Base</label>
                    <select class="form-control form-control" id="base_type" name="base_type" required>
                      <option value="" disabled selected>Seleccione una opción:</option>
                      <option value="Clientes">Clientes</option>
                      <option value="Transacciones">Transacciones</option>
                      <option value="Cuentas">Cuentas</option>
                      <option value="Empleados">Empleados</option>
                      <option value="Sucursales">Sucursales</option>
                      <option value="Cajeros">Cajeros</option>
                      <option value="Seguridad">Seguridad</option>
                      <option value="Notificaciones">Notificaciones</option>
                    </select>
                </div>                    

                <div class="col-md-2 my-3">
                  <label class="form-label" for="sprint">Rango Fecha inicial</label>
                  <input type="date" class="form-control form-control" name="start_date" required>
                </div>

                <div class="col-md-2 my-3">
                  <label class="form-label" for="sprint">Rango Fecha Final</label>
                  <input type="date" class="form-control form-control" name="end_date" required>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-6 col-xxl-5 mt-3">
                    <button type="submit" class="btn w-100 btn-success">
                      <i class="fa fa-fw fa-save me-1 opacity-50"></i> Guardar
                    </button>
                  </div>
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

    <script>
      // Obtenemos el elemento switch
      const switchElement = document.querySelector('#aprobacion');

      // Obtenemos el elemento input de tipo file

      const fileInputElement = document.getElementById('file_input');
      // Creamos una función para mostrar u ocultar el input de tipo file
      function showHideFileInput() {
        if (switchElement.checked) {
          fileInputElement.style.display = 'block';

        } else {
          fileInputElement.style.display = 'none';
        }
      }

      // Agregamos un evento change al switch para ejecutar la función showHideFileInput() cuando el switch cambie de estado
      switchElement.addEventListener('change', showHideFileInput);

      // Ejecutamos la función showHideFileInput() para mostrar u ocultar el input de tipo file según el estado actual del switch
      showHideFileInput();

    </script>
@endsection