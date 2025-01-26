"use strict";
var informacion = (function () {

  var inicioControles = function () {
    var avatar = new KTImageInput('kt_profile_avatar');
  };
  var validacion = function () {
    var validador;

    var form = document.getElementById("form-informacion");

    validador = FormValidation.formValidation(form, {
      locale: "es_ES",
      localization: FormValidation.locales.es_ES,
      fields: {
        profile_avatar: {
          validators: {
            file: {
              extension: "jpeg,jpg,png",
              type: "image/jpeg,image/png",
              maxSize: 2097152, //2MB
              message: "La imagen debe ser en formato JPG, JPEG o PNG y no debe pesar más de 2MB",
            },
        },
      },
        name: {
          validators: {
            notEmpty: {
              message: "El nombre es requerido",
            },
          },
        },
        telefono: {
          validators: {
            notEmpty: {
              message: "El telefono es requerido",
            },
          },
        },
        email: {
          validators: {
            notEmpty: {
              message: "El email es requerido",
            },
            emailAddress: {
              message: "El email no es valido",
            },
          },
        },
        password2: {
          validators: {
            identical: {
              compare: function () {
                return form.querySelector('[name="password1"]').value;
              },
              message: "Las contraseñas no coinciden",
            },
          },
        },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        submitButton: new FormValidation.plugins.SubmitButton(),
        declarative: new FormValidation.plugins.Declarative({
          html5Input: true,
        }),
        bootstrap: new FormValidation.plugins.Bootstrap({
          //	eleInvalidClass: '', // Repace with uncomment to hide bootstrap validation icons
          //	eleValidClass: '',   // Repace with uncomment to hide bootstrap validation icons
        }),
      },
    })
      .on("core.form.valid", function () {
        toastr.success("Guardando, Por favor Espere...");
        form.submit();
      })
      .on("core.form.invalid", function () {
        toastr.warning("Por favor, Ingrese la información marcada en rojo.");
        KTUtil.scrollTop();
      });

    form
      .querySelector('[name="password1"]')
      .addEventListener("input", function () {
        validador.revalidateField("password2");
      });
  };

  return {
    //main function to initiate the module
    init: function () {
      inicioControles();
      validacion();
    },
  };
})();

jQuery(document).ready(function () {
  informacion.init();
});
