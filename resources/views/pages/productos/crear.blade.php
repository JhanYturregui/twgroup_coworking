@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-xs-12 col-lg-12">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">{{ __('Registrar') }}</h3>
        </div>

        <!-- Formulario -->
          <div class="card-body pt-0">
            <!-- Datos -->
            {{-- <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
              </div>
              <input 
                  id="nombre"
                  type="text"
                  class="form-control"
                  placeholder="{{ __('Nombre') }}">
            </div>
            <div class="input-group form-group mt-3">
              <label class="custom-toggle">
                <input type="checkbox" checked disabled>
                <span class="custom-toggle-slider rounded-circle"></span>
              </label>
            </div> --}}
            <div class="nav-wrapper">
              <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-sm-3 mb-md-0 active" id="generales" data-toggle="tab" href="#tabs-generales" role="tab" aria-controls="tabs-generales" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>{{ __('Datos generales') }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-sm-3 mb-md-0" id="precios" data-toggle="tab" href="#tabs-precios" role="tab" aria-controls="tabs-precios" aria-selected="false">{{-- <i class="ni ni-bell-55 mr-2"></i> --}}{{ __('Detalles y Precios') }}</a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link mb-sm-3 mb-md-0" id="detalles" data-toggle="tab" href="#tabs-detalles" role="tab" aria-controls="tabs-detalles" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>{{ __('Detalles') }}</a>
                </li> --}}
              </ul>
          </div>
          <div class="card shadow">
            <div class="card-body">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tabs-generales" role="tabpanel" aria-labelledby="generales">
                  <div class="row">
                    <div class="col-lg-8 row">
                      <div class="col-lg-12">
                        <div class="input-group form-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                          </div>
                          <input 
                              id="articulo"
                              type="text"
                              class="form-control"
                              placeholder="{{ __('Artículo') }} (*)">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="input-group form-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                          </div>
                          <input 
                              id="codigo"
                              type="text"
                              class="form-control"
                              placeholder="{{ __('Código') }} (*)">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="input-group form-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                          </div>
                          <input 
                              id="precioVenta"
                              type="number"
                              class="form-control"
                              placeholder="{{ __('Precio venta') }} (*)">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="input-group form-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                          </div>
                          <select 
                            id="clase"
                            class="form-control">
                            <option value="0">{{ __('Seleccione clase') }}</option>
                            @foreach($clases as $clase)
                              <option value="{{ $clase->id}}">{{ $clase->nombre }}</option>
                            @endforeach
                          </select>
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="input-group form-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                          </div>
                          <select 
                            id="marca"
                            class="form-control">
                            <option value="0">{{ __('Seleccione marca') }}</option>
                            @foreach($marcas as $marca)
                              <option value="{{ $marca->id}}">{{ $marca->nombre }}</option>
                            @endforeach
                          </select>
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="input-group form-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                          </div>
                          <select 
                            id="modelo"
                            class="form-control">
                            <option value="0">{{ __('Seleccione modelo') }}</option>
                            @foreach($modelos as $modelo)
                              <option value="{{ $modelo->id}}">{{ $modelo->nombre }}</option>
                            @endforeach
                          </select>
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="input-group form-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                          </div>
                          <select 
                            id="unidad"
                            class="form-control">
                            <option value="0">{{ __('Seleccione unidad') }}</option>
                            @foreach($unidades as $unidad)
                              <option value="{{ $unidad->id}}">{{ $unidad->nombre }}</option>
                            @endforeach
                          </select>
                          <div class="input-group-append">
                            <button class="btn btn-outline-primary">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 mb-4">
                        <div class="custom-control custom-control-alternative custom-checkbox">
                          <input class="custom-control-input" id="esServicio" type="checkbox">
                          <label class="custom-control-label" for="esServicio">{{ __('Es servicio') }}</label>
                        </div>
                      </div>
                      <div class="col-lg-3 mb-4">
                        <div class="custom-control custom-control-alternative custom-checkbox">
                          <input class="custom-control-input" id="contieneIgv" type="checkbox">
                          <label class="custom-control-label" for="contieneIgv">{{ __('Contiene IGV') }}</label>
                        </div>
                      </div>
                      <div class="col-lg-3 mb-4">
                        <div class="custom-control custom-control-alternative custom-checkbox">
                          <input class="custom-control-input" id="usaLotes" type="checkbox" checked>
                          <label class="custom-control-label" for="usaLotes">{{ __('Usa lotes') }}</label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="input-group form-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                          </div>
                          <input 
                              id="proveedor"
                              type="text"
                              disabled
                              class="form-control"
                              placeholder="{{ __('Proveedor') }}">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" id="imgProducto"
                          name="imgProducto"  onchange="obtenerImagen(this)">
                        <label class="custom-file-label" for="imgProducto">Seleccione imagen</label>
                      </div>
                      {{-- <figure class="mt-4">
                        <img src="{{asset('img/sin_imagen.jpg')}}" alt="Imagen" id="imagenPrevia" style="width: 130px; height: 130px">
                      </figure> --}}
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="tabs-precios" role="tabpanel" aria-labelledby="precios">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                        </div>
                        <input 
                            id="precioCosto"
                            type="number"
                            class="form-control"
                            placeholder="{{ __('Precio costo') }} (*)">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                        </div>
                        <input 
                            id="precioMay1"
                            type="number"
                            class="form-control"
                            placeholder="{{ __('Precio mayorista') }} 1">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                        </div>
                        <input 
                            id="precioMay2"
                            type="number"
                            class="form-control"
                            placeholder="{{ __('Precio mayorista') }} 2">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                        </div>
                        <input 
                            id="precioMay3"
                            type="number"
                            class="form-control"
                            placeholder="{{ __('Precio mayorista') }} 3">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                        </div>
                        <input 
                            id="codigoBarra"
                            type="text"
                            class="form-control"
                            placeholder="{{ __('Código barra') }}">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                        </div>
                        <input 
                            id="codigoFabrica"
                            type="text"
                            class="form-control"
                            placeholder="{{ __('Código fábrica') }}">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                        </div>
                        <input 
                            id="serie"
                            type="text"
                            class="form-control"
                            placeholder="{{ __('Serie') }}">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                        </div>
                        <input 
                            id="serie"
                            type="number"
                            class="form-control"
                            placeholder="{{ __('Stock') }}">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                        </div>
                        <select id="moneda">
                          <option value="0">{{ __('Seleccione moneda') }}</option>
                          <option value="PEN">{{ __('Soles') }}</option>
                          <option value="USD">{{ __('Dólares') }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                        </div>
                        <input 
                            id="peso"
                            type="number"
                            class="form-control"
                            placeholder="{{ __('Peso') }}">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" id="afectoIgv" type="checkbox" checked>
                        <label class="custom-control-label" for="afectoIgv">{{ __('Afecto IGV') }}</label>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="input-group form-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                        </div>
                        <input 
                            id="utilidad"
                            type="number"
                            class="form-control"
                            placeholder="{{ __('Utilidad') }}">
                      </div>
                    </div>
                  </div>
                </div>
                {{-- <div class="tab-pane fade" id="tabs-detalles" role="tabpanel" aria-labelledby="detalles">
                    Detalles
                </div> --}}
              </div>
            </div>
          </div>
          </div>
          <div class="card-footer text-right">
            <button type="button" class="btn btn-primary botones-expand" onclick="registrar()">{{ __('Registrar') }}</button>
          </div>
        
      </div>
    </div>
  </div>

  @section('js')
    <script src="{{ asset('js/modelo.js') }}"></script>
  @endsection
@endsection