let origin = '';
let scrollX = false;

window.onload = function() {
  origin = window.location.origin;
  scrollX = window.screen.width <= 1240 ? true : false;
  inicializarDatatable('tablaPrincipal');
}

window.onresize = function () {
  scrollX = window.screen.width <= 1240 ? true : false;
  inicializarDatatable('tablaPrincipal');
}

function inicializarDatatable (idTabla) {
  const tabla = $('#' + idTabla).DataTable();
  tabla.destroy();

  $('#' + idTabla).DataTable({
    "serverSide": true,
    "processing": true,
    "responsive": true,
    "scrollX": scrollX,
    "ajax": {
      "url": "locales/obtener",
      "type": "get"
    },
    "columns": [
        { data: 'id', searchable: false },
        { data: 'nombre' },
        { data: 'direccion' },
        { data: 'col-estado', searchable: false, orderable: false },
        { data: 'col-acciones', searchable: false, orderable: false },
    ],
    "language": {
        "info": "_TOTAL_ registros",
        "search": "Buscar por:",
        "searchPlaceholder": "Nombre",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "lengthMenu": 'Mostrar <select>'+
                        '<option value="10">10</option>'+
                        '<option value="25">25</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">Todos</option>'+
                        '</select> registros',
        "loadingRecords": "Cargando...",
        "processing": '<div class="progress" style="width: 40vw; margin-left: -10vw !important"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div> ',
        "emptyTable": "No se encontraron datos",
        "zeroRecords": "No se encontraron coincidencias",
        "infoEmpty": "",
        "infoFiltered": "",
        "paginate": {
          "previous": '<i class="fas fa-angle-left"></i>',
          "next": '<i class="fas fa-angle-right"></i>'
        }
    }
  });
  $('label').addClass('form-inline');
  $('select, input[type="search"]').addClass('form-control');
}

function llenarOpcionesProvincias(provincias) {
  let opciones = '';
  $('#codProv').html('')
  for (let i = 0; i <provincias.length; i++) {
    opciones += `<option value="${ provincias[i].codprov }">${ provincias[i].nombre }</option>`;
  }
  $('#codProv').html(opciones);
}

function llenarOpcionesDistritos(distritos) {
  let opciones = '';
  $('#codDist').html('')
  for (let i = 0; i <distritos.length; i++) {
    opciones += `<option value="${ distritos[i].coddist }">${ distritos[i].nombre }</option>`;
  }
  $('#codDist').html(opciones);
}

function cargarProvincias(codDpto) {
  const data = {
    codDpto,
    _token: $('input[name=_token]').val(),
  };
  $.ajax({
    type: 'post',
    url: '../../ubigeo/cargar_provincias',
    dataType: 'json',
    data,
    success: function(a){
      if (a.estado) {
        llenarOpcionesProvincias(a.provincias);
        llenarOpcionesDistritos(a.distritos);

      } else {
        Swal.fire('Error!', a.mensaje, 'error');
      }
    },
    error: function(e) {
      Swal.fire('Error!', e.mensaje, 'error');
    }
  })
}

function cargarDistritos(codProv) {
  const codDpto = $('#codDpto').val();
  const data = {
    codDpto,
    codProv,
    _token: $('input[name=_token]').val(),
  };
  $.ajax({
    type: 'post',
    url: '../../ubigeo/cargar_distritos',
    dataType: 'json',
    data,
    success: function(a){
      if (a.estado) {
        llenarOpcionesDistritos(a.distritos);
      }else {
        Swal.fire('Error!', a.mensaje, 'error');
      }
    },
    error: function(e) {
      console.log(e)
    }
  })
}

function registrar() {
  const nombre = $('#nombre').val();
  const data = {
    nombre,
    _token: $('input[name=_token]').val(),
  };

  $.ajax({
    type: 'post',
    url: 'registrar',
    dataType: 'json',
    data,
    success: function(a){
      if (a.estado) {
        location.replace(origin + '/modelos');

      } else {
        Swal.fire('Error!', a.mensaje, 'error');
      }
    },
    error: function(e) {
      Swal.fire('Error!', e.mensaje, 'error');
    },
  });
}

function actualizar() {
  const id = $('#idDato').val();
  const nombre = $('#nombre').val();
  const estado = $('#estado').prop('checked') ? 1 : 0;
  const data = {
    id,
    nombre,
    estado,
    _token: $('input[name=_token]').val()
  };

  $.ajax({
    type: 'post',
    url: '../actualizar',
    dataType: 'json',
    data,
    success: function(a){
      if (a.estado) {
        location.replace(origin + '/modelos');

      }else {
        Swal.fire('Error!', a.mensaje, 'error');
      }
    },
    error: function(e) {
      Swal.fire('Error!', e.mensaje, 'error');
    }
  });
}

function modEliminar(id) {
  $('#idDatoEliminar').val(id);
  $('#modalEliminar').modal();
}

function eliminar() {
  const id = $('#idDatoEliminar').val();
  const data = {
    id,
    _token: $('input[name=_token]').val(),
  }
  $.ajax({
    type: 'post',
    url: 'modelos/eliminar',
    dataType: 'json',
    data,
    success: function(a){
      if (a.estado) {
        location.replace(origin+'/modelos');
      }
    },
    error: function(e) {
      Swal.fire('Error!', e.mensaje, 'error');
    }
  })
}
