"use strict";
var Tabla = function() {

    $.fn.dataTable.Api.register('column().title()', function() {
        return $(this.header()).text().trim();
    });

    var initTable1 = function() {
        // begin first table
        var table = $('#kdatatable_documentoscustodio').DataTable({
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
                url:$('#documentocustdatatable').val(),
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    columnsDef: [
                        'id', 'nombre', 'acciones'],
                },

            },
            columns: [
                { data: 'id' },
                { data: 'nombre' },
                {data: 'acciones', responsivePriority: -1},
            ],

            columnDefs: [
                {

                    width: '200px',
                    targets: -1,
                    title: 'Acciones',
                    orderable: false,
                    render: function(data, type, full, meta) {

                            return '\
                                <button class="btn btn-clean btn-icon btn-outline-success mt-1" onClick="editardocumento(\'' + full.nombre + '\', '+full.id+')" data-toggle="modal" data-target="#model_edit_tipodocumento" data-toggle="tooltip" data-theme="dark" title="Editar documento">\
                                    <i class="flaticon-edit"></i></button>\
                                <button class="btn btn-clean btn-icon btn-outline-success mt-1" onClick="deletedocumento(\'' + full.nombre + '\', '+full.id+')" data-toggle="tooltip" data-theme="dark" title="Desactivar documento">\
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

    $("#send_documento").click(function(){
        var documento = document.getElementById("documento").value;
        if(documento == ""){
            Swal.fire("Para continuar debes agregar el nombre del documento");
        }else{documento
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Espere un momento, la información esta siendo procesada",
                showConfirmButton: false
            });
            document.getElementById("submit_documento").submit();
        }
    });

    function editardocumento(nombre, id) {
        document.getElementById("id_documento").value = id;
        document.getElementById("tipo_documento").value = nombre;
    }

    $("#edit_tipodocumento_submit").click(function(){
        var tipo_documento = document.getElementById("tipo_documento").value;
        if(tipo_documento == ""){
            Swal.fire("Para continuar debes agregar el nombre del documento");
        }else{
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Espere un momento, la información esta siendo procesada",
                showConfirmButton: false
            });
            document.getElementById("submit_documentoedit_edit").submit();
        }
    });

    function deletedocumento(nombre, id) {
        Swal.fire({
            title: "Estas seguro de desactivar el registro "+nombre,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, Desactivarlo!",
            cancelButtonText: "No, Cancelar!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                document.getElementById("id_documento_delete").value = id;
                Swal.fire({
                    position: "top-center",
                    icon: "success",
                    title: "Espere un momento, la información esta siendo procesada",
                    showConfirmButton: false
                });
                document.getElementById("tipodocumento_delete_form").submit();
            } else if (result.dismiss === "cancel") {
                Swal.fire(
                    "Cancelada",
                    "La acción fue cancelada",
                    "error"
                )
            }
        });

    }


    $("#kdatatable_documentos_inactivos").DataTable({
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


    $(".activar-documento").click(function() {
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
                document.getElementById("id_delete").value = id;
                Swal.fire({
                    position: "top-center",
                    icon: "success",
                    title: "Espere un momento, la información esta siendo procesada",
                    showConfirmButton: false
                });
                document.getElementById("documento_act_form").submit();
            } else if (result.dismiss === "cancel") {
                Swal.fire(
                    "Cancelada",
                    "La acción fue cancelada",
                    "error"
                )
            }
        });
    });