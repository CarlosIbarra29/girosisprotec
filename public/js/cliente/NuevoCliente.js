"use strict";

var Modulo = function() {

    var lista = ''; //lista de elementos
    var contadorDocumentos = 0; //indice contador de elementos
    var validador; //validador del formulario
    var contadorDoc = 0; //indice contador de elementos

    var validacion = function () {
        const form = document.getElementById('submit_cliente');
        const selectCliente = document.getElementById('cliente_select');
        const btnGuardar = document.getElementById('btnGuardar');

        validador = FormValidation.formValidation(
            form,
            {
                locale: 'es_ES',
                localization: FormValidation.locales.es_ES,
                fields: {
                    nombre_comercial: {
                        validators: {
                            notEmpty: {
                                message: 'El nombre comercial es obligatorio'
                            }
                        }
                    },
                    organizacion: {
                        validators: {
                            notEmpty: {
                                message: 'La razón social es obligatoria'
                            }
                        }
                    },
                    contacto_principal: {
                        validators: {
                            notEmpty: {
                                message: 'El contacto principal es obligatorio'
                            }
                        }
                    },
                    telefono: {
                        validators: {
                            notEmpty: {
                                message: 'El teléfono es obligatorio'
                            },
                            regexp: {
                                regexp: /^[0-9]{10}$/,
                                message: 'El teléfono debe tener exactamente 10 dígitos'
                            }
                        }
                    },
                    telefono_atiende: {
                        validators: {
                            callback: {
                                message: 'El teléfono debe tener exactamente 10 dígitos',
                                callback: function(input) {
                                    const value = String(input.value || '').trim();
                                    return value === '' || /^[0-9]{10}$/.test(value);
                                }
                            }
                        }
                    },

                    alcance_nombre_instalacion: {
                        validators: {
                            notEmpty: {
                                message: 'El nombre comercial es obligatorio'
                            }
                        }
                    },
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

            if (typeof KTUtil !== 'undefined' && typeof KTUtil.scrollTop === 'function') {
                KTUtil.scrollTop();
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });

        $(document).off('click.giNext', '#btnGuardar').on('click.giNext', '#btnGuardar', function (e) {
            e.preventDefault();

            const selectedValue = selectCliente.value;

            if (!selectedValue) {
                toastr.warning("Por favor, selecciona un cliente.");
                return;
            }

            if (selectedValue !== "0") {
                if (typeof KTUtil !== 'undefined' && typeof KTUtil.btnWait === 'function') {
                    KTUtil.btnWait(btnGuardar, 'spinner spinner-right spinner-white pr-15', 'Espere...', true);
                }

                window.location.href = "/cliente/generar-analisis-riesgos/" + selectedValue + "/1/0/1";
                return;
            }

            avanzarNuevoCliente();
        });
    };

    var obtenerTabActivo = function () {
        let activeHref = $('#giClienteTabs .nav-link.active').attr('href');

        if (activeHref) {
            return activeHref.replace('#', '');
        }

        let activePane = $('#myTabContent .tab-pane.show.active').attr('id') || $('#myTabContent .tab-pane.active').attr('id');

        if (activePane) {
            return activePane;
        }

        return 'kt_tab_pane_1';
    };

    var avanzarNuevoCliente = function () {
        const btnGuardar = document.getElementById('btnGuardar');
        const form = document.getElementById('submit_cliente');
        const activePane = obtenerTabActivo();

        if (activePane === 'kt_tab_pane_1') {
            if (validarPasoInformacion()) {
                mostrarTab('#kt_tab_pane_2');
            }
            return;
        }

        if (activePane === 'kt_tab_pane_2') {
            if (validarPasoContacto()) {
                mostrarTab('#kt_tab_pane_3');
            }
            return;
        }

        if (activePane === 'kt_tab_pane_3') {

            // NUEVO: validación de fotografías
            if (!validarFotosAlcance()) {
                toastr.warning("Por favor, verifica las fotografías seleccionadas.");
                return;
            }

            if (!validarPasoInformacion()) {
                mostrarTab('#kt_tab_pane_1');
                return;
            }

            if (!validarPasoContacto()) {
                mostrarTab('#kt_tab_pane_2');
                return;
            }

            if (typeof validador !== 'undefined' && validador) {
                validador.validate().then(function(status) {
                    if (status === 'Valid') {
                        if (typeof KTUtil !== 'undefined' && typeof KTUtil.btnWait === 'function') {
                            KTUtil.btnWait(btnGuardar, 'spinner spinner-right spinner-white pr-15', 'Espere...', true);
                        }

                        form.submit();
                    } else {
                        toastr.warning("Por favor, verifica los campos marcados.");
                    }
                });
            } else {
                if (typeof KTUtil !== 'undefined' && typeof KTUtil.btnWait === 'function') {
                    KTUtil.btnWait(btnGuardar, 'spinner spinner-right spinner-white pr-15', 'Espere...', true);
                }

                form.submit();
            }
        }
    };

    var limpiarErrorCampo = function (selector) {
        const $input = $(selector);
        const $field = $input.closest('.f-field');

        $input.removeClass('is-invalid');
        $field.removeClass('gi-field-error');
        $field.find('.gi-error-text').remove();
    };

    var marcarErrorCampo = function (selector, mensaje) {
        const $input = $(selector);
        const $field = $input.closest('.f-field');

        $input.addClass('is-invalid');
        $field.addClass('gi-field-error');

        if ($field.find('.gi-error-text').length === 0) {
            $field.append('<div class="gi-error-text">' + mensaje + '</div>');
        }
    };

    var campoTieneValor = function (selector) {
        return String($(selector).val() || '').trim() !== '';
    };

    var soloDigitos = function (valor) {
        return String(valor || '').replace(/\D/g, '').substring(0, 10);
    };

    var validarTelefono10 = function (selector, obligatorio) {
        const valor = String($(selector).val() || '').trim();

        limpiarErrorCampo(selector);

        if (obligatorio && !valor) {
            marcarErrorCampo(selector, 'El teléfono es obligatorio');
            return false;
        }

        if (valor && !/^[0-9]{10}$/.test(valor)) {
            marcarErrorCampo(selector, 'El teléfono debe tener exactamente 10 dígitos');
            return false;
        }

        return true;
    };

    var validarPasoInformacion = function () {
        let ok = true;

        limpiarErrorCampo('#nombre_comercial');
        limpiarErrorCampo('#organizacion');

        if (!campoTieneValor('#nombre_comercial')) {
            marcarErrorCampo('#nombre_comercial', 'El nombre comercial es obligatorio');
            ok = false;
        }

        if (!campoTieneValor('#organizacion')) {
            marcarErrorCampo('#organizacion', 'La razón social es obligatoria');
            ok = false;
        }

        if (!ok) {
            toastr.warning("Por favor, captura Nombre comercial y Razón Social.");

            if (typeof KTUtil !== 'undefined' && typeof KTUtil.scrollTop === 'function') {
                KTUtil.scrollTop();
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        return ok;
    };

    var validarPasoContacto = function () {
        let ok = true;

        limpiarErrorCampo('#contacto_principal');
        limpiarErrorCampo('#telefono');
        limpiarErrorCampo('#telefono_atiende');

        if (!campoTieneValor('#contacto_principal')) {
            marcarErrorCampo('#contacto_principal', 'El contacto principal es obligatorio');
            ok = false;
        }

        if (!validarTelefono10('#telefono', true)) {
            ok = false;
        }

        if (!validarTelefono10('#telefono_atiende', false)) {
            ok = false;
        }

        if (!ok) {
            toastr.warning("Por favor, captura Contacto principal y valida que los teléfonos tengan 10 dígitos.");

            if (typeof KTUtil !== 'undefined' && typeof KTUtil.scrollTop === 'function') {
                KTUtil.scrollTop();
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        return ok;
    };

    var mostrarTab = function (tabId) {
        const $tab = $('#giClienteTabs .nav-link[href="' + tabId + '"]');

        if ($tab.length) {
            if (typeof $tab.tab === 'function') {
                $tab.tab('show');
            } else {
                $('#giClienteTabs .nav-link').removeClass('active');
                $tab.addClass('active');

                $('#myTabContent .tab-pane').removeClass('show active');
                $(tabId).addClass('show active');
            }
        }

        setTimeout(function () {
            actualizarTextoBoton();
            scanFloatingLabels();

            if (typeof KTUtil !== 'undefined' && typeof KTUtil.scrollTop === 'function') {
                KTUtil.scrollTop();
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }, 80);
    };

    var actualizarTextoBoton = function () {
        const activePane = obtenerTabActivo();

        if (activePane === 'kt_tab_pane_3') {
            $('#btnGuardar').text('Guardar');
        } else {
            $('#btnGuardar').text('Siguiente');
        }
    };

    var initEvents = function() {

        var arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        };

        if ($("#costo_estadia").length) {
            $("#costo_estadia").inputmask('$ 999,999,999.99', {
                numericInput: true
            });
        }

        if ($("#costo_km").length) {
            $("#costo_km").inputmask('$ 999,999,999.99', {
                numericInput: true
            });
        }

        // lista = construyeElementosLista
        //botón agregar otro archivo
        $(".hrefAgregarOtro").on("click", function(event) {
            event.preventDefault();
            addArchivo();
        });
        delArchivo();

        $(".hrefAgregarOtro1").on("click", function(event) {
            event.preventDefault();
            addArchivo1();
        });
        delArchivo1();

        $('.nav-tabs .nav-link').off('shown.bs.tab.giShown').on('shown.bs.tab.giShown', function () {
            actualizarTextoBoton();
            scanFloatingLabels();
        });
    };

    // //construye  elementos de la lista
    // var construyeElementosLista = function () {
    //     var tipoArchivo = $("#tipoArchivo").val();
    //     var colTipoArchivo = JSON.parse(tipoArchivo);
    //     var opcion ="";
    //
    //     $.each(colTipoArchivo, function(i, item) {
    //         opcion += "<option value='"+i+"' >"+item+"</option>";
    //     });
    //
    //     return opcion;
    // };

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

    const tipoArchivoValidador = {
        validators: {
            notEmpty: {
                message: 'Por favor introduce un valor',
            },
        },
    };

    var addArchivo = function () {
        contadorDocumentos++;
        var html = '';
        html += ([
            "",
            "<tr id='trDocumento" + contadorDocumentos + "'>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='nombre" + contadorDocumentos + "' name='nombre[" + contadorDocumentos + "]' required />",
            "       </div>" +
            "    </td>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='email" + contadorDocumentos + "' name='email[" + contadorDocumentos + "]' required />",
            "       </div>" +
            "    </td>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='telefono" + contadorDocumentos + "' name='telefono[" + contadorDocumentos + "]' required />",
            "       </div>" +
            "    </td>",
            "    <td>",
            "       <a href='#' class='btn btn-clean btn-icon btn-outline-success mt-1 hrefEliminar' data-id='" + contadorDocumentos + "' data-toggle='tooltip' data-theme='dark' title='Eliminar'>",
            "           <i class='flaticon-delete'></i>",
            "       </a>",
            "    </td>",
            "</tr>",
            ""
        ].join(""));

        $("#tblDocumentos tbody").append(html);

        if (validador) {
            validador.addField('nombre[' + contadorDocumentos + ']', archivoValidador);
            validador.addField('email[' + contadorDocumentos + ']', archivoValidador);
            validador.addField('telefono[' + contadorDocumentos + ']', archivoValidador);
        }

        KTApp.initTooltips();
        KTApp.initFileInput();
    };

    var delArchivo = function () {
        jQuery(document).on("click", ".hrefEliminar", function(e) {
            e.preventDefault();

            var idDocumento = $(this).attr("data-id");

            KTApp.hideTooltips();

            if (validador) {
                validador.removeField('nombre[' + idDocumento + ']');
                validador.removeField('email[' + idDocumento + ']');
                validador.removeField('telefono[' + idDocumento + ']');
            }

            $('#trDocumento' + idDocumento).remove();
        });
    };

    var addArchivo1 = function () {
        contadorDocumentos++;
        var html = '';
        html += ([
            "",
            "<tr id='trDocumento1" + contadorDocumentos + "'>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='nombre_fac" + contadorDocumentos + "' name='nombre_fac[" + contadorDocumentos + "]' required />",
            "       </div>" +
            "    </td>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='email_fac" + contadorDocumentos + "' name='email_fac[" + contadorDocumentos + "]' required />",
            "       </div>" +
            "    </td>",
            "    <td>" +
            "       <div class='form-group mb-0'>" +
            "               <input type='text' class='form-control' id='telefono_fac" + contadorDocumentos + "' name='telefono_fac[" + contadorDocumentos + "]' required />",
            "       </div>" +
            "    </td>",
            "    <td>",
            "       <a href='#' class='btn btn-clean btn-icon btn-outline-success mt-1 hrefEliminarfac' data-id='" + contadorDocumentos + "' data-toggle='tooltip' data-theme='dark' title='Eliminar'>",
            "           <i class='flaticon-delete'></i>",
            "       </a>",
            "    </td>",
            "</tr>",
            ""
        ].join(""));

        $("#tblDocumentos1 tbody").append(html);

        if (validador) {
            validador.addField('nombre_fac[' + contadorDocumentos + ']', archivoValidador);
            validador.addField('email_fac[' + contadorDocumentos + ']', archivoValidador);
            validador.addField('telefono_fac[' + contadorDocumentos + ']', archivoValidador);
        }

        KTApp.initTooltips();
        KTApp.initFileInput();
    };

    var delArchivo1 = function () {
        jQuery(document).on("click", ".hrefEliminarfac", function(e) {
            e.preventDefault();

            var idDocumento = $(this).attr("data-id");

            KTApp.hideTooltips();

            if (validador) {
                validador.removeField('nombre_fac[' + idDocumento + ']');
                validador.removeField('email_fac[' + idDocumento + ']');
                validador.removeField('telefono_fac[' + idDocumento + ']');
            }

            $('#trDocumento1' + idDocumento).remove();
        });
    };

    var eventosEspeciales = function () {
        $('#elemento1').val();
    };

    var markFilled = function (el) {
        if (!el) return;

        const value = el.value != null ? String(el.value).trim() : '';
        const isSelect = el.tagName && el.tagName.toLowerCase() === 'select';

        if (isSelect) {
            el.classList.toggle('filled', value !== '');
            return;
        }

        el.classList.toggle('filled', value !== '');
    };

    var scanFloatingLabels = function () {
        document.querySelectorAll('.f-control').forEach(function (el) {
            markFilled(el);
        });
    };

    var initFloatingLabels = function () {
        scanFloatingLabels();

        document.addEventListener('input', function (e) {
            if (e.target && e.target.classList && e.target.classList.contains('f-control')) {
                markFilled(e.target);

                if ($(e.target).hasClass('is-invalid')) {
                    limpiarErrorCampo('#' + e.target.id);
                }
            }
        });

        document.addEventListener('change', function (e) {
            if (e.target && e.target.classList && e.target.classList.contains('f-control')) {
                markFilled(e.target);

                if ($(e.target).hasClass('is-invalid')) {
                    limpiarErrorCampo('#' + e.target.id);
                }
            }
        });

        document.addEventListener('cliente-datos-cargados', scanFloatingLabels);
    };

    var initTelefonos10Digitos = function () {
        const phoneSelectors = '#telefono, #telefono_atiende, .js-phone-10';

        $(phoneSelectors).attr({
            maxlength: 10,
            inputmode: 'numeric',
            autocomplete: 'off'
        });

        $(document).off('input.giPhone10', phoneSelectors).on('input.giPhone10', phoneSelectors, function () {
            const limpio = soloDigitos($(this).val());
            $(this).val(limpio);

            if ($(this).hasClass('is-invalid')) {
                limpiarErrorCampo('#' + this.id);
            }

            if (typeof validador !== 'undefined' && validador && this.name) {
                validador.revalidateField(this.name);
            }
        });

        $(document).off('paste.giPhone10', phoneSelectors).on('paste.giPhone10', phoneSelectors, function (e) {
            e.preventDefault();

            let texto = '';

            if (e.originalEvent && e.originalEvent.clipboardData) {
                texto = e.originalEvent.clipboardData.getData('text') || '';
            } else if (window.clipboardData) {
                texto = window.clipboardData.getData('Text') || '';
            }

            $(this).val(soloDigitos(texto)).trigger('input');
        });

        $(document).off('keypress.giPhone10', phoneSelectors).on('keypress.giPhone10', phoneSelectors, function (e) {
            const code = e.which || e.keyCode;

            if (code < 48 || code > 57) {
                e.preventDefault();
                return false;
            }

            if (String($(this).val() || '').length >= 10) {
                e.preventDefault();
                return false;
            }
        });
    };


        // =========================================================
    // FOTOGRAFÍAS DEL LUGAR DEL ANÁLISIS
    // =========================================================

    var archivosFotosSeleccionados = [];

    var mostrarErrorFotosAlcance = function (mensaje) {
        const $error = $('#alcance_fotos_error');

        if (!$error.length) return;

        if (mensaje) {
            $error.text(mensaje).removeClass('d-none');
        } else {
            $error.text('').addClass('d-none');
        }
    };

    var renderPreviewFotosAlcance = function () {
        const preview = document.getElementById('alcance_fotos_preview');
        if (!preview) return;

        preview.innerHTML = '';

        archivosFotosSeleccionados.forEach(function (archivo, index) {
            const item = document.createElement('div');
            item.className = 'gi-photo-preview-item';

            const img = document.createElement('img');
            img.alt = 'Vista previa fotografía ' + (index + 1);

            const reader = new FileReader();

            reader.onload = function (e) {
                img.src = e.target.result;
            };

            reader.readAsDataURL(archivo);

            const badge = document.createElement('span');
            badge.className = 'gi-photo-preview-badge';
            badge.textContent = (index + 1) + '/3';

            item.appendChild(img);
            item.appendChild(badge);
            preview.appendChild(item);
        });
    };

    var sincronizarInputFotosAlcance = function () {
        const input = document.getElementById('alcance_fotos');

        if (!input || typeof DataTransfer === 'undefined') {
            return;
        }

        const dataTransfer = new DataTransfer();

        archivosFotosSeleccionados.forEach(function (archivo) {
            dataTransfer.items.add(archivo);
        });

        input.files = dataTransfer.files;
    };

    var validarFotosAlcance = function () {
        const formatosPermitidos = [
            'image/jpeg',
            'image/png'
        ];

        if (archivosFotosSeleccionados.length > 3) {
            mostrarErrorFotosAlcance(
                'Solo puedes agregar un máximo de 3 fotografías.'
            );

            return false;
        }

        const invalido = archivosFotosSeleccionados.some(function (archivo) {
            return formatosPermitidos.indexOf(archivo.type) === -1;
        });

        if (invalido) {
            mostrarErrorFotosAlcance(
                'Solo se permiten fotografías JPG, JPEG o PNG.'
            );

            return false;
        }

        mostrarErrorFotosAlcance('');

        return true;
    };

    var initFotosAlcance = function () {
        const input = document.getElementById('alcance_fotos');

        if (!input) {
            return;
        }

        $(input)
            .off('change.giFotosAlcance')
            .on('change.giFotosAlcance', function () {

                const nuevosArchivos = Array.from(this.files || []);

                const formatosPermitidos = [
                    'image/jpeg',
                    'image/png'
                ];

                const invalido = nuevosArchivos.some(function (archivo) {
                    return formatosPermitidos.indexOf(archivo.type) === -1;
                });

                if (invalido) {
                    this.value = '';

                    mostrarErrorFotosAlcance(
                        'Solo se permiten fotografías JPG, JPEG o PNG.'
                    );

                    toastr.warning(
                        'Solo se permiten fotografías JPG, JPEG o PNG.'
                    );

                    return;
                }

                /*
                 * IMPORTANTE:
                 * Sumamos las nuevas fotografías a las que ya estaban
                 * seleccionadas, en lugar de reemplazarlas.
                 */
                const fotosAcumuladas = archivosFotosSeleccionados.concat(nuevosArchivos);

                if (fotosAcumuladas.length > 3) {
                    this.value = '';

                    mostrarErrorFotosAlcance(
                        'Solo puedes agregar un máximo de 3 fotografías.'
                    );

                    toastr.warning(
                        'Solo puedes agregar un máximo de 3 fotografías.'
                    );

                    return;
                }

                archivosFotosSeleccionados = fotosAcumuladas;

                /*
                 * Volvemos a construir el FileList real del input
                 * para que al enviar el formulario Laravel reciba
                 * todas las fotografías acumuladas.
                 */
                sincronizarInputFotosAlcance();

                renderPreviewFotosAlcance();

                mostrarErrorFotosAlcance('');
            });
    };

    var initClienteSelect = function () {
        const inputs = [
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

        const alcanceInputs = [
            '#alcance_nombre_instalacion',
            '#alcance_procesos_clave',
            '#alcance_empleados_administrativos',
            '#alcance_empleados_operativos',
            '#alcance_horario_operacion',
            '#alcance_nivel_inseguridad',
            '#alcance_accesibilidad',
            '#alcance_presencia_autoridades',
            '#alcance_factores_sociales_politicos',
            '#alcance_activos_criticos',
            '#alcance_antecedentes_seguridad'
        ];

        function setDisabled(disabled) {
            inputs.forEach(function (id) {
                $(id).prop('disabled', disabled);
            });

            alcanceInputs.forEach(function (id) {
                $(id).prop('disabled', disabled);
            });

            $('input[name="alcance_certificaciones[]"]')
                .prop('disabled', disabled);

            // NUEVO
            $('#alcance_fotos').prop('disabled', disabled);
        }

        function clearForm() {
            inputs.forEach(function (id) {
                $(id).val('');
                limpiarErrorCampo(id);
            });

            alcanceInputs.forEach(function (id) {
                $(id).val('');
            });

            $('input[name="alcance_certificaciones[]"]')
                .prop('checked', false);

            // NUEVO: limpiar fotografías
            archivosFotosSeleccionados = [];
            $('#alcance_fotos').val('');
            renderPreviewFotosAlcance();
            mostrarErrorFotosAlcance('');

            scanFloatingLabels();
        }

        function fillForm(data) {
            $('#organizacion').val(data.organizacion || '');
            $('#nombre_comercial').val(data.nombre_comercial || '');
            $('#calle').val(data.calle || '');
            $('#no_exterior').val(data.no_exterior || '');
            $('#no_interior').val(data.no_interior || '');
            $('#delegacion').val(data.delegacion || '');
            $('#giro_comercial').val(data.giro_comercial || '');
            $('#sector').val(data.sector || '');
            $('#no_personal').val(data.no_personal || '');
            $('#contacto_principal').val(data.contacto_principal || '');
            $('#cargo').val(data.cargo || '');
            $('#telefono').val(soloDigitos(data.telefono || ''));
            $('#mail').val(data.mail || '');
            $('#persona_atiende').val(data.persona_atiende || '');
            $('#cargo_atiende').val(data.cargo_atiende || '');
            $('#telefono_atiende').val(
                soloDigitos(data.telefono_atiende || '')
            );
            $('#mail_atiende').val(data.mail_atiende || '');

            scanFloatingLabels();
        }

        function habilitaSiguiente() {
            const v = $('#cliente_select').val();

            const ok =
                v !== null &&
                v !== '' &&
                !isNaN(Number(v));

            $('#btnGuardar').prop('disabled', !ok);

            if (!ok) {
                $('#btnGuardar').text('Siguiente');
            }
        }

        $('.nav-tabs .nav-link')
            .off('click.giTabs')
            .on('click.giTabs', function (e) {

                if ($(this).hasClass('disabled')) {
                    e.preventDefault();
                    return false;
                }
            });

        $('#cliente_select')
            .off('change.giCliente')
            .on('change.giCliente', async function () {

                const selectedValue = $(this).val();

                habilitaSiguiente();

                if (!selectedValue) {
                    clearForm();
                    setDisabled(true);
                    mostrarTab('#kt_tab_pane_1');
                    return;
                }

                if (selectedValue === "0") {
                    clearForm();
                    setDisabled(false);

                    $('.nav-tabs .nav-link')
                        .removeClass('disabled');

                    mostrarTab('#kt_tab_pane_1');

                    $('#btnGuardar').text('Siguiente');

                    return;
                }

                try {
                    $('.nav-tabs .nav-link')
                        .removeClass('disabled');

                    clearForm();
                    setDisabled(true);

                    const resp = await fetch(
                        '/api/clientes/' + selectedValue
                    );

                    const json = await resp.json();

                    if (!resp.ok || !json.ok) {
                        throw new Error(
                            json.message ||
                            'No se pudo obtener el cliente'
                        );
                    }

                    fillForm(json.data);
                    setDisabled(true);

                    mostrarTab('#kt_tab_pane_1');

                    $('#btnGuardar').text('Siguiente');

                } catch (err) {
                    console.error(err);

                    toastr.error(
                        'No fue posible cargar los datos del cliente seleccionado.'
                    );

                    $(this).val('0');

                    clearForm();
                    setDisabled(false);

                    $('.nav-tabs .nav-link')
                        .removeClass('disabled');

                    mostrarTab('#kt_tab_pane_1');

                    habilitaSiguiente();
                }
            });

        habilitaSiguiente();
    };

    return {

        //main function to initiate the module
        init: function() {
            initEvents();
            validacion();
            eventosEspeciales();
            initFloatingLabels();
            initTelefonos10Digitos();
            initClienteSelect();

            // NUEVO
            initFotosAlcance();

            actualizarTextoBoton();
        },

    };

}();

jQuery(document).ready(function() {
    Modulo.init();
});


// $(document).ready(function () {
//     $('#cliente_select').on('change', function () {
//         var selectedValue = $(this).val();
//
//         if (selectedValue === "0") {
//             // Habilitar las pestañas
//             $('.nav-tabs .nav-link').removeClass('disabled');
//         } else {
//             // Deshabilitar las pestañas excepto la activa
//             $('.nav-tabs .nav-link').addClass('disabled');
//
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

// $(document).ready(function () {
//     // Manejo del clic en pestañas deshabilitadas
//     $('.nav-tabs .nav-link').on('click', function (e) {
//         if ($(this).hasClass('disabled')) {
//             e.preventDefault();
//         }
//     });
//
//     $('#cliente_select').on('change', function () {
//         var selectedValue = $(this).val();
//
//         // Lista de IDs de inputs a habilitar/deshabilitar
//         var inputs = [
//             '#organizacion',
//             '#nombre_comercial',
//             '#calle',
//             '#no_exterior',
//             '#no_interior',
//             '#delegacion',
//             '#giro_comercial',
//             '#sector',
//             '#no_personal',
//             '#contacto_principal',
//             '#cargo',
//             '#telefono',
//             '#mail',
//             '#persona_atiende',
//             '#cargo_atiende',
//             '#telefono_atiende',
//             '#mail_atiende'
//         ];
//
//         if (selectedValue === "0") {
//             // Habilita pestañas
//             $('.nav-tabs .nav-link').removeClass('disabled');
//
//             // Habilita inputs
//             inputs.forEach(function (id) {
//                 $(id).prop('disabled', false);
//             });
//         } else {
//             // Deshabilita pestañas (excepto la activa)
//             $('.nav-tabs .nav-link').addClass('disabled');
//             $('.nav-tabs .nav-link.active').removeClass('disabled');
//
//             // Deshabilita inputs
//             inputs.forEach(function (id) {
//                 $(id).prop('disabled', true);
//             });
//         }
//     });
// });