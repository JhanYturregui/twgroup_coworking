@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-xs-12 col-lg-4 offset-lg-4">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">{{ __('Modificar') }}</h3>
        </div>

        <!-- Formulario -->
          <div class="card-body">
            <!-- Datos -->
            <input type="hidden" id="idDato" value="{{ $dato["id"]}}">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
              </div>
              <input type="text" class="form-control" id="nombre" placeholder="Nombre" value="{{ $dato['nombre'] }}">
            </div>
            <div class="input-group form-group mt-3">
              <label class="custom-toggle">
                <input id="estado" type="checkbox" {{ ($dato->estado === 1) ? 'checked' : '' }}>
                <span class="custom-toggle-slider rounded-circle"></span>
              </label>
            </div>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-primary botones-expand" onclick="actualizar()">{{ __('Actualizar') }}</button>
          </div>
        
      </div>
    </div>
  </div>

  @section('js')
    <script src="{{ asset('js/marca.js') }}"></script>
  @endsection
@endsection