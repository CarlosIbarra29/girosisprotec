
"use strict";
var Modulo = function() {

    var validacion = function() {
        //validacion de formulario
        const form = document.getElementById('submit_user');
        var validador = FormValidation.formValidation(
            form,
            {
                locale: 'es_ES',
                localization: FormValidation.locales.es_ES,
                fields: {
                    codigo_postal: {
                        validators: {
                            notEmpty: {
                            },
                            regexp: {
                                regexp: CP_MX_REGEXP,
                                message: CP_MX_MESSAGE,
                            },
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    declarative: new FormValidation.plugins.Declarative({
                        html5Input: true,
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        //  eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
                        //  eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
                    }),
                }
            }
        ).on('core.form.valid', function() {
            toastr.success("Guardando, Por favor Espere...");
        }).on('core.form.invalid', function() {
            toastr.warning("Por favor, Ingrese la información marcada en rojo.");
            KTUtil.scrollTop();
        });

        $( "#btnGuardar" ).click(function( e ) {
            e.preventDefault();
            validador.validate().then(function(status) {
                if (status === 'Valid'){
                    var btnGuardar = document.getElementById('btnGuardar');
                    KTUtil.btnWait( btnGuardar, 'spinner spinner-right spinner-white pr-15', 'Espere...', true);
                    form.submit();
                }
            });
        });
    };

    var initEvents = function() {
        $("#rol").select2({
            placeholder: "Seleccione una opción",
            allowClear: true
        });
    };

    return {

        //main function to initiate the module
        init: function() {
            initEvents();
            validacion();
        },

    };

}();

jQuery(document).ready(function() {
    Modulo.init();

});