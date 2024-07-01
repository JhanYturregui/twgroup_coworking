@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <div class="row">
            <h3 class="mb-0 col-8">{{ __('Mantenimiento de Ubigeos') }}</h3>
            <div class="col-4 text-right">
              <a href="javascript:modalImportar()" class="btn btn-default botones-expand">
                <i class="fas fa-upload mr-2"></i>{{ 'Importar' }}</a>
            </div>
          </div>
        </div>

        <div class="table-responsive p-4">
          <table id="tablaPrincipal" class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">{{ __('ID') }}</th>
                <th scope="col" class="sort" data-sort="name">{{ __('Nombre') }}</th>
                <th scope="col" class="sort" data-sort="name">{{ __('Cod Departamento') }}</th>
                <th scope="col" class="sort" data-sort="name">{{ __('Cod Provincia') }}</th>
                <th scope="col" class="sort" data-sort="name">{{ __('Cod Distrito') }}</th>
              </tr>
            </thead>
            <tbody class="list">
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Importar -->
  <div class="modal fade" id="modalImportarUbigeo" tabindex="-1" role="dialog" aria-labelledby="modalImportarUbigeoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modalImportarUbigeoLabel">{{ __('Importar Ubigeo') }}</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('ubigeo_importar') }}" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
              {{ csrf_field() }}
              <input type="file" name="excelImportar">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancelar') }}</button>
            <button type="button" class="btn btn-primary" onclick="modalCargando()">{{ __('Importar') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @section('js')
    <script src="{{ asset('js/ubigeo.js') }}"></script>
  @endsection

@endsection