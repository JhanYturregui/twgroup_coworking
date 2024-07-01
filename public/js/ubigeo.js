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
      "url": "ubigeo/obtener",
      "type": "get"
    },
    "columns": [
        { data: 'id', searchable: false },
        { data: 'nombre' },
        { data: 'coddpto', searchable: false },
        { data: 'codprov', searchable: false },
        { data: 'coddist', searchable: false },
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

function modalImportar() {
  $('#modalImportarUbigeo').modal();
}
