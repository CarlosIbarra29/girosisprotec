"use strict";
var Tabla = function() {

    $.fn.dataTable.Api.register('column().title()', function() {
        return $(this.header()).text().trim();
    });

    var initTable1 = function() {
        // begin first table
        var table = $('#kdatatable_usuarios').DataTable({
            responsive: true,
            // Pagination settings
            dom: `<'row'<'col-sm-12'tr>>
                    <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            // read more: https://datatables.net/examples/basic_init/dom.html

            lengthMenu: [5, 10, 25, 50],

            pageLength: 10,

            order: [[ 0, "desc" ]], //ordenamiento default
            language: {
                'lengthMenu': 'Display _MENU_',
                "url": $('#datatable_i18n').val()
            },

            processing: true,
            serverSide: true,
            ajax: {
                url:$('#usuariosdatatable').val(),
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    columnsDef: [
                        'id', 'nombre', 'rfc', 'telefono','email', 'role', 'permisos' ,'acciones'],
                },

            },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'rfc' },
                { data: 'telefono' },
                { data: 'email' },
                { data: 'role' },
                {data: 'acciones', responsivePriority: -1},
            ],

            columnDefs: [
                {
                    // const array = [full.permisos];
                    width: '110px',
                    targets: -1,
                    title: 'Acciones',
                    orderable: false,
                    render: function(data, type, full, meta) {

                        if (full.permisos.includes(7) && full.permisos.includes(8)  && full.permisos.includes(5)){
                           return `
                                <a href="/usuario/ver-usuario/`+full.id+`" class="btn btn-sm btn-outline-success btn-icon mr-2" title="Ver usuario" data-theme="dark" data-toggle="tooltip" data-placement="top">
                                    <span class="svg-icon svg-icon-md">
                                        <i class="flaticon-eye"></i>
                                    </span>
                                </a>
                                <a href="/usuario/editar-usuario/`+full.id+`" class="btn btn-sm btn-outline-success btn-icon mr-2" title="Editar usuario" data-theme="dark" data-toggle="tooltip" data-placement="top">
                                    <span class="svg-icon svg-icon-md">
                                        <i class="flaticon-edit"></i>
                                    </span>
                                </a>
                                <button class="btn btn-clean btn-sm btn-icon btn-outline-success mt-1" onClick="deleteuser(`+ full.nombre +`,`+full.id+`)" data-toggle="modal" data-target="#model_delete_user" data-toggle="tooltip" data-theme="dark" title="Desactivar usuario">
                                    <span class="svg-icon svg-icon-md">
                                        <i class="flaticon-delete"></i>
                                    </span>
                                 </button>
                            `;
                        }

                        if (full.permisos.includes(7)  && full.permisos.includes(5)){
                           return `
                                <a href="/usuario/ver-usuario/`+full.id+`" class="btn btn-sm btn-outline-success btn-icon mr-2" title="Ver usuario" data-theme="dark" data-toggle="tooltip" data-placement="top">
                                    <span class="svg-icon svg-icon-md">
                                        <i class="flaticon-eye"></i>
                                    </span>
                                </a>
                                <a href="/usuario/editar-usuario/`+full.id+`" class="btn btn-sm btn-outline-success btn-icon mr-2" title="Editar usuario" data-theme="dark" data-toggle="tooltip" data-placement="top">
                                    <span class="svg-icon svg-icon-md">
                                        <i class="flaticon-edit"></i>
                                    </span>
                                </a>
                            `;
                        }
                        if (full.permisos.includes(8)  && full.permisos.includes(5)){
                           return `
                                <a href="/usuario/ver-usuario/`+full.id+`" class="btn btn-sm btn-outline-success btn-icon mr-2" title="Ver usuario" data-theme="dark" data-toggle="tooltip" data-placement="top">
                                    <span class="svg-icon svg-icon-md">
                                        <i class="flaticon-eye"></i>
                                    </span>
                                </a>
                                <button class="btn btn-clean btn-sm btn-icon btn-outline-success mt-1" onClick="deleteuser(`+ full.nombre +`,`+full.id+`)" data-toggle="modal" data-target="#model_delete_user" data-toggle="tooltip" data-theme="dark" title="Desactivar usuario">
                                    <span class="svg-icon svg-icon-md">
                                        <i class="flaticon-delete"></i>
                                    </span>
                                 </button>
                            `;
                        }
                        if (full.permisos.includes(8)  && full.permisos.includes(5)){
                           return `
                                <a href="/usuario/ver-usuario/`+full.id+`" class="btn btn-sm btn-outline-success btn-icon mr-2" title="Ver usuario" data-theme="dark" data-toggle="tooltip" data-placement="top">
                                    <span class="svg-icon svg-icon-md">
                                        <i class="flaticon-eye"></i>
                                    </span>
                                </a>
                            `;
                        }

                    },
                }

            ],

            buttons: [
                {extend: "excel", className: "invisible"},
                {extend: "pdf", className: "invisible"},
                {extend: "csv", className: "invisible"},
                {extend: "print", className: "invisible"},

            ],

            "drawCallback": function(settings, json) {
                KTApp.initTooltips();
            }


        }).on( 'init.dt', function () {
        });

        $('#export-excel').on('click', function () {
            table.button(0).trigger();
        });
        $('#export-pdf').on('click', function () {
            table.button(1).trigger();
        });
        $('#export-csv').on('click', function () {
            table.button(2).trigger();
        });
        $('#export-print').on('click', function () {
            table.button(3).trigger();
        });

        var filter = function() {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());
            table.column($(this).data('col-index')).search(val ? val : '', false, false).draw();
        };

        $('#kt_search').on('click', function(e) {
            e.preventDefault();
            var params = {};
            $('.datatable-input').each(function() {
                var i = $(this).data('col-index');
                if (params[i]) {
                    params[i] += '|' + $(this).val();
                }
                else {
                    params[i] = $(this).val();
                }
            });
            $.each(params, function(i, val) {
                table.column(i).search(val ? val : '', false, false);
            });
            table.table().draw();
        });

        $('#kt_reset').on('click', function(e) {
            e.preventDefault();
            $('.datatable-input').each(function() {
                $(this).val('');
                table.column($(this).data('col-index')).search('', false, false);
            });
            table.table().draw();
        });

    };

    return {

        //main function to initiate the module
        init: function() {
            initTable1();
        },

    };

}();

jQuery(document).ready(function() {
    Tabla.init();
});


function deleteuser(nombre, id) {
    
    document.getElementById("id_user_desc").value = id;
    document.getElementById("name_user").value = nombre;
}

$("#send_desactivar").click(function(){
    var desactivar_add = document.getElementById("desactivar_add").value;
    if(desactivar_add == ""){
        Swal.fire("Para continuar debes agregar el motivo por el cual desactivas al usuario");
    }else{
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Espere un momento, la información esta siendo procesada",
            showConfirmButton: false
        });
        document.getElementById("submit_desactivar").submit();
    }
});


  $("#kdatatable_user_inactivo").DataTable({
      language: {
          'lengthMenu': 'Display _MENU_',
          "url": $('#datatable_i18n').val()
      },

      "dom":
      "<'row'" +
      "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
      "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
      ">" +

      "<'table-responsive'tr>" +

      "<'row'" +
      "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
      "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
      ">"
  });

  $(".activar-user").click(function() {
    var id = $(this).data('id');
    var nombre = $(this).data('nombre');

    Swal.fire({
      title: "Estas seguro de activar el registro "+nombre,
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Si, Activarlo!",
      cancelButtonText: "No, Cancelar!",
      reverseButtons: true
    }).then(function(result) {
      if (result.value) {
        document.getElementById("id_user_act").value = id;
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Espere un momento, la información esta siendo procesada",
          showConfirmButton: false
        });
        document.getElementById("user_act_form").submit();
      } else if (result.dismiss === "cancel") {
          Swal.fire(
            "Cancelada",
            "La acción fue cancelada",
            "error"
          )
      }
    });
  });