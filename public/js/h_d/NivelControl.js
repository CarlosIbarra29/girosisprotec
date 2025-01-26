"use strict";
var Tabla = function() {

    $.fn.dataTable.Api.register('column().title()', function() {
        return $(this.header()).text().trim();
    });

    var initTable1 = function() {
        // begin first table
        var table = $('#kdatatable_nivel_control').DataTable({
            responsive: true,
            // Pagination settings
            dom: `<'row'<'col-sm-12'tr>>
                    <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            // read more: https://datatables.net/examples/basic_init/dom.html

            lengthMenu: [5, 10, 25, 50],

            pageLength: 10,

            language: {
                'lengthMenu': 'Display _MENU_',
                "url": $('#datatable_i18n').val()
            },

            processing: true,
            serverSide: true,
            ajax: {
                url:$('#nivelcontroldatatable').val(),
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    columnsDef: [
                    'id', 'nivelcontrol', 'exposicion', 'detalle', 'nc_calculo', 'acciones'],
                },

            },
            columns: [
                { data: 'id', orderable: true },
                { data: 'nivelcontrol', orderable: true },
                { data: 'exposicion', orderable: true },
                { data: 'detalle', orderable: true },
                { data: 'nc_calculo', orderable: true },
                {data: 'acciones', responsivePriority: 2},
            ],

            columnDefs: [
                {

                    width: '90px',
                    targets: -1,
                    title: 'Opciones',
                    orderable: false,
                    render: function(data, type, full, meta) {

                            return '\
                                <button class="btn btn-sm btn-clean btn-hover-icon-success btn-icon" onClick="editarnivelcontrol(\'' + full.nivelcontrol + '\', '+full.id+', \''+full.exposicion+'\', '+full.nc_calculo+', \''+full.detalle+'\')" data-toggle="modal" data-target="#model_edit_nivelcontrol" data-toggle="tooltip" data-theme="dark" title="Editar Nivel de control">\
                                    <i class="flaticon-edit"></i></button>\
                                <button class="btn btn-sm btn-clean btn-hover-icon-success btn-icon" onClick="deletenivelcontrol(\'' + full.nivelcontrol + '\', '+full.id+')" data-toggle="tooltip" data-theme="dark" title="Desactivar Nivel control">\
                                    <i class="flaticon-delete "></i>\
                                </button>\
                            ';
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


$("#add_nivelcontrol_submit").click(function(){
    var nivelcontrol_add = document.getElementById("nivelcontrol_add").value;
    var exposicion_add = document.getElementById("exposicion_add").value;
    var nc_calculo_add = document.getElementById("nc_calculo_add").value;
    var detalle_add = document.getElementById("detalle_add").value;

    if(nivelcontrol_add == "" || exposicion_add == "" || nc_calculo_add == "" || detalle_add ==""){
        Swal.fire("Para continuar debes agregar los datos requeridos");
    }else{
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Espere un momento, la información esta siendo procesada",
            showConfirmButton: false
        });
        document.getElementById("submit_nivel_control").submit();
    }

});

function editarnivelcontrol(nombre, id, exposicion, nc_calculo, detalle) {
    document.getElementById("nivelcontrol_edit").value = nombre;
    document.getElementById("id_nielcontrol").value = id;
    document.getElementById("exposicion_edit").value = exposicion;
    document.getElementById("nc_calculo_edit").value = nc_calculo;
    document.getElementById("detalle_edit").value = detalle;
}


$("#edit_nivelcontrol_submit").click(function(){
    var nivelcontrol_edit = document.getElementById("nivelcontrol_edit").value;
    var exposicion_edit = document.getElementById("exposicion_edit").value;
    var nc_calculo_edit = document.getElementById("nc_calculo_edit").value;
    var detalle_edit = document.getElementById("detalle_edit").value;

    if(nivelcontrol_edit == "" || exposicion_edit =="" || nc_calculo_edit=="" || detalle_edit==""){
        Swal.fire("Para continuar debes agregar los datos requeridos");
    }else{
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Espere un momento, la información esta siendo procesada",
            showConfirmButton: false
        });
        document.getElementById("submit_nivelcontrol_edit").submit();
    }
});

function deletenivelcontrol(nombre, id) {
    Swal.fire({
      title: "Estas seguro de desactivar el registro "+nombre,
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Si, Desactivarlo!",
      cancelButtonText: "No, Cancelar!",
      reverseButtons: true
    }).then(function(result) {
      if (result.value) {
        document.getElementById("id_delete_nivelcontrol").value = id;
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Espere un momento, la información esta siendo procesada",
          showConfirmButton: false
        });
        document.getElementById("nivelcontrol_delete_form").submit();
      } else if (result.dismiss === "cancel") {
        Swal.fire(
          "Cancelada",
          "La acción fue cancelada",
          "error"
        )
      }
    });
}

$("#kdatatable_nivelcontrol_inactivos").DataTable({
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



$(".activar_nivelcontrol").click(function(){
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
        document.getElementById("id_act_nivelcontrol").value = id;
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Espere un momento, la información esta siendo procesada",
          showConfirmButton: false
        });
        document.getElementById("nivelcontrol_act_form").submit();
      } else if (result.dismiss === "cancel") {
        Swal.fire(
          "Cancelada",
          "La acción fue cancelada",
          "error"
        )
      }
    });
});