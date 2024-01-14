@extends('layouts.simple')

@section('content')
<div id="page-container">

<!-- Main Container -->
<main id="main-container">
  <!-- Page Content -->
  <div class="hero-static d-flex align-items-center">
    <div class="w-100">
      <!-- Status Section -->
      <div class="bg-body-extra-light">
        <div class="content content-full">
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
              <!-- Header -->
                @if(isset($error))
                  <div class="text-center mb-3">
                    {{$error}}
                  </div>
                @endif
              @if(isset($requisition))
              <div class="text-center mb-3">
                <p class="mb-2">
                  <i class="fa fa-2x fa-circle-notch text-primary"></i>
                </p>
                <h1 class="h4 mb-1">
                  Aprobación encontrada para:  QA-{{ $requisition->id }}
                </h1>
                <h2 class="h6 fw-normal text-muted mb-1">
                @if($requisition->type == 'B')
                  <span>Back</span>  
                @endif
                @if($requisition->type == 'F')
                  <span>Front</span>
                @endif
                @if($requisition->type == 'BF')
                  <span>Back y Front</span>
                @endif
                @if($requisition->pending_flag == 1)
                  <span class="text-danger"> Ajustes Pendientes</span>
                @endif   
              </div>

              <ul class="list-group push">
                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                  QA Lead:
                  <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">{{ $requisition->userRequisition->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                  Tech Lead:
                  <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">{{ $requisition->userTechLead->name }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                  Sprint:
                  <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">{{ $requisition->sprint }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                Proyecto:
                  <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">{{ $requisition->proyect }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                  País:
                  <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">{{ $requisition->country->name }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                  Marca:
                  <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">{{ $requisition->brand->name }}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                  Zona:
                  <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">{{ $requisition->zone }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                  Tipo de ejecución:
                  <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">{{$requisition->executionType->name}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                  Estado:
                    @if( $requisition->status_id == 1 )
                    <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info"><i class="fa fa-info-circle"></i> {{ $requisition->status->name }} </span>
                    @endif
                    @if( $requisition->status_id == 2 )
                    <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success"><i class="fa fa-exclamation-circle"></i>  {{ $requisition->status->name }} </span>
                    @endif
                    @if( $requisition->status_id == 3 )
                    <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success"><i class="fa fa-check"></i> {{ $requisition->status->name }} </span> 
                    @endif
                    @if( $requisition->status_id == 4 )
                    <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger"><i class="fa fa-times-circle"></i> {{ $requisition->status->name }} </span> 
                    @endif
                    @if( $requisition->status_id == 5 )
                    <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning"><i class="fa fa-times-circle"></i> {{ $requisition->status->name }} </span> 
                    @endif                    
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                  Creado:
                  <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">{{ $requisition->created_at }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                  Actualizado:
                  <span class="fs-sm fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning"> {{ $requisition->updated_at }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                  Descripción:
                  <span class="text-muted"> {{ $requisition->description }}  {{ $requisition->description_restriction }} </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center fw-medium">
                Persona que solicitó autorización:
                <span class="text-muted">{{ $requisition->user_restriction }} </span>
                </li>
              </ul>
              <!-- END Services -->
              @endif
            </div>

            <!-- Search Form -->
            <form action="/searchRequisition" method="POST">
              <div class="row justify-content-center ">
                <div class="col-sm-6 col-xl-3">
                  <div class="input-group input-group-lg">
                    <span class="input-group-text">QA-</span>
                    <input type="text" class="form-control" id="example-group1-input1" name="id" placeholder="12345678" autocomplete="off">
                    <button type="submit" class="btn btn-dark">
                      <i class="fa fa-search opacity-75"></i>
                    </button>
                  </div>
                </div>
                
              </div>
            </form>
            <!-- END Search Form -->
            <div class="row justify-content-center text-center my-3">
            <a href="javascript:history.back()"> <i class="fa fa-home"> </i> Regresar</a>
            </div>
          </div>
        </div>
      </div>
      <!-- END Status Section -->

      <!-- Footer -->
      <div class="fs-sm text-center text-muted py-3">
        <strong>QRequisition</strong> &copy; <span data-toggle="year-copy"></span>
      </div>
      <!-- END Footer -->
    </div>
  </div>
  <!-- END Page Content -->

</main>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
@endsection
