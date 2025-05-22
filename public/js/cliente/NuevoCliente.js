"use strict";
var Modulo = function() {

    var lista = ''; //lista de elementos
    var contadorDocumentos=0; //indice contador de elementos
    var validador; //validador del formulario
    var contadorDoc=0; //indice contador de elementos

    var validacion = function () {
    const form = document.getElementById('submit_cliente');
    const selectCliente = document.getElementById('cliente_select');

    const validador = FormValidation.formValidation(
        form,
        {
            locale: 'es_ES',
            localization: FormValidation.locales.es_ES,
            fields: {
                // Puedes agregar campos si quieres validaciones adicionales
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                declarative: new FormValidation.plugins.Declarative({
                    html5Input: true,
                }),
                bootstrap: new FormValidation.plugins.Bootstrap(),
            }
        }
    )
    .on('core.form.valid', function () {
        toastr.success("Guardando, Por favor Espere...");
    })
    .on('core.form.invalid', function () {
        toastr.warning("Por favor, Ingrese la información marcada en rojo.");
        KTUtil.scrollTop();
    });

    $("#btnGuardar").click(function (e) {
        e.preventDefault();

        const selectedValue = selectCliente.value;

        if (selectedValue === "0") {
            // Validar y enviar el formulario de nuevo cliente
            validador.validate().then(function (status) {
                if (status === 'Valid') {
                    const btnGuardar = document.getElementById('btnGuardar');
                    KTUtil.btnWait(btnGuardar, 'spinner spinner-right spinner-white pr-15', 'Espere...', true);
                    form.submit();
                }
            });
        } else {
            
            KTUtil.btnWait(btnGuardar, 'spinner spinner-right spinner-white pr-15', 'Espere...', true);
            window.location.href = "/cliente/seleccionar-analisis-riesgos/"+selectedValue;

        }
    });
};


    var initEvents = function() {

        var arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }

        $("#costo_estadia").inputmask('$ 999,999,999.99', {
            numericInput: true
        });

        $("#costo_km").inputmask('$ 999,999,999.99', {
            numericInput: true
        });

        // lista = construyeElementosLista
        //botón agregar otro archivo
        $( ".hrefAgregarOtro" ).on( "click", function(event) {
            event.preventDefault();
            addArchivo();
        });
        delArchivo();

        $( ".hrefAgregarOtro1" ).on( "click", function(event) {
            event.preventDefault();
            addArchivo1();
        });
        delArchivo1();


    };

    // //construye  elementos de la lista
    // var construyeElementosLista = function () {
    //     var tipoArchivo = $("#tipoArchivo").val();
    //     var colTipoArchivo = JSON.parse(tipoArchivo);
    //     var opcion ="";

    //     $.each(colTipoArchivo, function(i, item) {
    //         opcion += "<option value='"+i+"' >"+item+"</option>";
    //     });

    //     return opcion;
    // };

    //validador de elementos agregados para archivo
    const archivoValidador = {
        validators: {
            notEmpty: {
                message: 'Por favor introduce un valor',
            },
            file: {
                extension: 'jpeg,jpg,png,pdf,docx,xls,gif,ppt,bmp',
                type: 'image/jpeg,image/png,application/pdf,application/msword,application/vnd.ms-excel,image/gif,application/vnd.ms-powerpoint,image/x-ms-bmp',
                message: 'Por favor ingrese un archivo válido, solo se permite imágenes, archivos de office y PDF',
            },
        },
    };

    //validador de elementos agregados para archivo
    const tipoArchivoValidador = {
        validators: {
            notEmpty: {
                message: 'Por favor introduce un valor',
            },
        },
    };

    //agrega el elemento archivo y lista desplegable
    var addArchivo = function () {
        contadorDocumentos++;
        var html = '';
        html += ([    "",
            "<tr id='trDocumento"+contadorDocumentos+"'>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='nombre"+contadorDocumentos+"' name='nombre["+contadorDocumentos+"]' required />",
            "       </div>" +
            "    </td>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='email"+contadorDocumentos+"' name='email["+contadorDocumentos+"]' required />",
            "       </div>" +
            "    </td>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='telefono"+contadorDocumentos+"' name='telefono["+contadorDocumentos+"]' required />",
            "       </div>" +
            "    </td>",
            "    <td>",
            "       <a href='#' class='btn btn-clean btn-icon btn-outline-success mt-1 hrefEliminar' data-id='"+contadorDocumentos+"' data-toggle='tooltip' data-theme='dark' title='Eliminar'>",
            "           <i class='flaticon-delete'></i>",
            "       </a>",
            "    </td>",
            "</tr>",

            ""].join(""));
        $("#tblDocumentos tbody").append(html); //agrega el html creado
        //agrega validación del elemento creado
        validador.addField('nombre[' + contadorDocumentos + ']', archivoValidador);
        validador.addField('email[' + contadorDocumentos + ']', archivoValidador);
        validador.addField('telefono[' + contadorDocumentos + ']', archivoValidador);
        KTApp.initTooltips(); //inicia tooltip del elemento creado
        KTApp.initFileInput(); //inicia el elemento archivo del elemento creado
    };

    //elimina un elemento
    var delArchivo = function () {
        jQuery(document).on("click", ".hrefEliminar" , function(e) {
            e.preventDefault();
            var idDocumento = $(this).attr("data-id"); //indice del elemento
            KTApp.hideTooltips(); //oculta tooltip
            //elimina la validación del elemento
            validador.removeField('nombre[' + idDocumento + ']');
            validador.removeField('email[' + idDocumento + ']');
            validador.removeField('telefono[' + idDocumento + ']');
            $('#trDocumento'+idDocumento).remove();//elimina el elemento
        });
    };


    var addArchivo1 = function () {
        contadorDocumentos++;
        var html = '';
        html += ([    "",
            "<tr id='trDocumento1"+contadorDocumentos+"'>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='nombre_fac"+contadorDocumentos+"' name='nombre_fac["+contadorDocumentos+"]' required />",
            "       </div>" +
            "    </td>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='email_fac"+contadorDocumentos+"' name='email_fac["+contadorDocumentos+"]' required />",
            "       </div>" +
            "    </td>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='telefono_fac"+contadorDocumentos+"' name='telefono_fac["+contadorDocumentos+"]' required />",
            "       </div>" +
            "    </td>",
            "    <td>",
            "       <a href='#' class='btn btn-clean btn-icon btn-outline-success mt-1 hrefEliminarfac' data-id='"+contadorDocumentos+"' data-toggle='tooltip' data-theme='dark' title='Eliminar'>",
            "           <i class='flaticon-delete'></i>",
            "       </a>",
            "    </td>",
            "</tr>",

            ""].join(""));
        $("#tblDocumentos1 tbody").append(html); //agrega el html creado
        //agrega validación del elemento creado
        validador.addField('nombre_fac[' + contadorDocumentos + ']', archivoValidador);
        validador.addField('email_fac[' + contadorDocumentos + ']', archivoValidador);
        validador.addField('telefono_fac[' + contadorDocumentos + ']', archivoValidador);
        KTApp.initTooltips(); //inicia tooltip del elemento creado
        KTApp.initFileInput(); //inicia el elemento archivo del elemento creado
    };

    //elimina un elemento
    var delArchivo1 = function () {
        jQuery(document).on("click", ".hrefEliminarfac" , function(e) {
            e.preventDefault();
            var idDocumento = $(this).attr("data-id"); //indice del elemento
            KTApp.hideTooltips(); //oculta tooltip
            //elimina la validación del elemento
            validador.removeField('nombre_fac[' + idDocumento + ']');
            validador.removeField('email_fac[' + idDocumento + ']');
            validador.removeField('telefono_fac[' + idDocumento + ']');
            $('#trDocumento1'+idDocumento).remove();//elimina el elemento
        });
    };



    var eventosEspeciales = function () {
        $('#elemento1').val();
    };

    return {

        //main function to initiate the module
        init: function() {
            initEvents();
            validacion();
            eventosEspeciales();
        },

    };

}();

jQuery(document).ready(function() {
    Modulo.init();
});


// $(document).ready(function () {
//     $('#cliente_select').on('change', function () {
//         var selectedValue = $(this).val();

//         if (selectedValue === "0") {
//             // Habilitar las pestañas
//             $('.nav-tabs .nav-link').removeClass('disabled');
//         } else {
//             // Deshabilitar las pestañas excepto la activa
//             $('.nav-tabs .nav-link').addClass('disabled');

//             // Si alguna pestaña no activa fue clicada, impedir que cambie
//             $('.nav-tabs .nav-link').on('click', function (e) {
//                 if ($(this).hasClass('disabled')) {
//                     e.preventDefault();
//                     return false;
//                 }
//             });
//         }
//     });
// });

$(document).ready(function () {
    // Manejo del clic en pestañas deshabilitadas
    $('.nav-tabs .nav-link').on('click', function (e) {
        if ($(this).hasClass('disabled')) {
            e.preventDefault();
        }
    });

    $('#cliente_select').on('change', function () {
        var selectedValue = $(this).val();

        // Lista de IDs de inputs a habilitar/deshabilitar
        var inputs = [
            '#organizacion',
            '#nombre_comercial',
            '#calle',
            '#no_exterior',
            '#no_interior',
            '#delegacion',
            '#giro_comercial',
            '#sector',
            '#no_personal',
            '#contacto_principal',
            '#cargo',
            '#telefono',
            '#mail',
            '#persona_atiende',
            '#cargo_atiende',
            '#telefono_atiende',
            '#mail_atiende'
        ];

        if (selectedValue === "0") {
            // Habilita pestañas
            $('.nav-tabs .nav-link').removeClass('disabled');

            // Habilita inputs
            inputs.forEach(function (id) {
                $(id).prop('disabled', false);
            });
        } else {
            // Deshabilita pestañas (excepto la activa)
            $('.nav-tabs .nav-link').addClass('disabled');
            $('.nav-tabs .nav-link.active').removeClass('disabled');

            // Deshabilita inputs
            inputs.forEach(function (id) {
                $(id).prop('disabled', true);
            });
        }
    });
});

