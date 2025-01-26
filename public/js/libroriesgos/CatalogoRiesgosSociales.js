
$("#kdatatable_riesgos_sociales").DataTable({
    language: {
        'lengthMenu': 'Display _MENU_',
        "url": $('#datatable_i18n').val()
    },
    order: {
        idx: 1,
        dir: 'asc'
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


$("#kdatatable_libro_riesgos_sociales").DataTable({
    language: {
        'lengthMenu': 'Display _MENU_',

        "url": $('#datatable_i18n').val()
    },
    order: {
        idx: 1,
        dir: 'asc'
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

$(".desactivar-social").click(function() {
    var id = $(this).data('id');
    var nombre = $(this).data('nombre');

    Swal.fire({
      title: "Estas seguro de desactivar el registro "+nombre,
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Si, Desactivarlo!",
      cancelButtonText: "No, Cancelar!",
      reverseButtons: true
    }).then(function(result) {
      if (result.value) {
        document.getElementById("id_delete_social").value = id;
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Espere un momento, la información esta siendo procesada",
          showConfirmButton: false
        });
        document.getElementById("social_delete_form").submit();
      } else if (result.dismiss === "cancel") {
        Swal.fire(
          "Cancelada",
          "La acción fue cancelada",
          "error"
        )
      }
    });
});


$(".activar-social").click(function() {
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
        document.getElementById("id_act_riesgo").value = id;
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Espere un momento, la información esta siendo procesada",
          showConfirmButton: false
        });
        document.getElementById("riesgo_activar_form").submit();
      } else if (result.dismiss === "cancel") {
        Swal.fire(
          "Cancelada",
          "La acción fue cancelada",
          "error"
        )
      }
    });
});


$(".desactivar-tecnologico").click(function() {
    var id = $(this).data('id');
    var nombre = $(this).data('nombre');

    Swal.fire({
      title: "Estas seguro de desactivar el registro "+nombre,
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Si, Desactivarlo!",
      cancelButtonText: "No, Cancelar!",
      reverseButtons: true
    }).then(function(result) {
      if (result.value) {
        document.getElementById("id_delete_tecnologico").value = id;
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Espere un momento, la información esta siendo procesada",
          showConfirmButton: false
        });
        document.getElementById("tecnologico_delete_form").submit();
      } else if (result.dismiss === "cancel") {
        Swal.fire(
          "Cancelada",
          "La acción fue cancelada",
          "error"
        )
      }
    });
});


$(".activar-tecnologico").click(function() {
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
        document.getElementById("id_act_riesgo").value = id;
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: "Espere un momento, la información esta siendo procesada",
          showConfirmButton: false
        });
        document.getElementById("riesgo_activar_form").submit();
      } else if (result.dismiss === "cancel") {
        Swal.fire(
          "Cancelada",
          "La acción fue cancelada",
          "error"
        )
      }
    });
});



$("#send_riesgo").click(function(){
    var nombre_riesgo = document.getElementById("nombre_riesgo").value;
    if(nombre_riesgo == ""){
        Swal.fire("Para continuar debes agregar el nombre del riesgo social");
    }else{
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Espere un momento, la información esta siendo procesada",
            showConfirmButton: false
        });
        document.getElementById("submit_nameriesgo").submit();
    }
});

function editriesgosocial(id, nombre)
{
  document.getElementById("id_riesgo_edit").value = id;
  document.getElementById("nombre_riesgo_edit").value = nombre;
}


$("#send_riesgo_edit").click(function(){
    var nombre_riesgo_edit = document.getElementById("nombre_riesgo_edit").value;
    if(nombre_riesgo_edit == ""){
        Swal.fire("Para continuar debes agregar el nombre del riesgo social");
    }else{
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Espere un momento, la información esta siendo procesada",
            showConfirmButton: false
        });
        document.getElementById("submit_nameriesgo_edit").submit();
    }
});

