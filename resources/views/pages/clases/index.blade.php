@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <div class="row">
            <h3 class="mb-0 col-8">{{ __('Mantenimiento de Clases') }}</h3>
            <div class="col-4 text-right">
              <a href="{{ route('modelos_crear') }}" class="btn btn-primary botones-expand">
                <i class="fas fa-plus mr-2"></i>{{ 'Registrar' }}</a>
            </div>
          </div>
        </div>

        <div class="table-responsive p-4">
          <table id="tablaPrincipal" class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">{{ __('ID') }}</th>
                <th scope="col" class="sort" data-sort="name">{{ __('Nombre') }}</th>
                <th scope="col" class="sort" data-sort="name">{{ __('Estado') }}</th>
                <th scope="col" class="sort" data-sort="name">{{ __('Fecha creación') }}</th>
                <th scope="col" class="sort" data-sort="name">{{ __('Fecha actualización') }}</th>
                <th scope="col"><i class="fas fa-wrench"></i></th>
              </tr>
            </thead>
            <tbody class="list">
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Eliminar -->
  <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modalEliminarLabel">{{ __('Eliminar') }}</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idDatoEliminar" value="">
          <p>{{ __('¿Deseas eliminar este registro?') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancelar') }}</button>
          <button type="button" class="btn btn-primary" onclick="eliminar()">{{ __('Confirmar') }}</button>
        </div>
      </div>
    </div>
  </div>

  @section('js')
    <script src="{{ asset('js/clase.js') }}"></script>
  @endsection

@endsection