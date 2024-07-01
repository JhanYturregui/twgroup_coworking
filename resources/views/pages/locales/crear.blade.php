@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-xs-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">{{ __('Registrar') }}</h3>
        </div>

        <!-- Formulario -->
          <div class="card-body">
            <!-- Datos -->
            <div class="row">
              <div class="input-group col-lg-6 col-sm-12 mt-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                </div>
                <input type="text" class="form-control" id="nombre" placeholder="{{ __('Nombre local') }}">
              </div>
              <div class="input-group col-lg-6 col-sm-12 mt-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <select class="form-control" id="codDpto" onchange="cargarProvincias(this.value, true)">
                  <option value="00">{{ __('Seleccione departamento') }}</option>
                  @foreach($dptos as $dpto)
                    <option value="{{ $dpto->coddpto }}">{{ $dpto->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="input-group col-lg-6 col-sm-12 mt-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <select class="form-control" id="codProv" onchange="cargarDistritos(this.value, true)">
                  <option value="00">{{ __('Seleccione provincia') }}</option>
                </select>
              </div>
              <div class="input-group col-lg-6 col-sm-12 mt-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <select class="form-control" id="codDist">
                  <option value="00">{{ __('Seleccione distrito') }}</option>
                </select>
              </div>
              <div class="input-group col-12 mt-2">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map"></i></span>
                </div>
                <input type="text" class="form-control" id="direccion" placeholder="{{ __('Dirección') }}">
              </div>
            </div>
            
            {{-- <div class="input-group mt-3">
              <label class="custom-toggle">
                <input type="checkbox" checked disabled>
                <span class="custom-toggle-slider rounded-circle"></span>
              </label>
            </div> --}}
          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-primary botones-expand" onclick="registrar()">{{ __('Registrar') }}</button>
          </div>
        
      </div>
    </div>
  </div>

  @section('js')
    <script src="{{ asset('js/local.js') }}"></script>
  @endsection
@endsection