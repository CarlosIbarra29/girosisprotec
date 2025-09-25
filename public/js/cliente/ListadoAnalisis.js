"use strict";

/* ============================
 * Tabla de USUARIOS (server-side)
 * ============================ */
var Tabla = (function () {

  $.fn.dataTable.Api.register("column().title()", function () {
    return $(this.header()).text().trim();
  });

  var initTable1 = function () {
    var table = $("#kdatatable_usuarios").DataTable({
      responsive: true,
      dom:
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
      lengthMenu: [5, 10, 25, 50],
      pageLength: 10,
      order: [[0, "desc"]],
      language: {
        lengthMenu: "Display _MENU_",
        url: $("#datatable_i18n").val(),
      },
      processing: true,
      serverSide: true,
      ajax: {
        url: $("#clientedatatable").val(),
        type: "POST",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
          columnsDef: [
            "id",
            "organizacion",
            "nombre_comercial",
            "contacto_principal",
            "telefono",
            "mail",
            "permisos",
            "acciones",
          ],
        },
      },
      columns: [
        { data: "id" },
        { data: "organizacion" },
        { data: "nombre_comercial" },
        { data: "contacto_principal" },
        { data: "telefono" },
        { data: "mail" },
        { data: "acciones", responsivePriority: -1 },
      ],
      columnDefs: [
        {
          targets: -1,
          title: "Acciones",
          orderable: false,
          render: function (data, type, full) {
            return (
              '<a href="/cliente/ver-cliente/' +
              full.id +
              '" class="btn btn-sm btn-outline-success btn-icon mr-2" title="Ver cliente" data-theme="dark" data-toggle="tooltip" data-placement="top">' +
              '<span class="svg-icon svg-icon-md"><i class="flaticon-eye"></i></span></a>' +
              '<a href="/cliente/editar-cliente/' +
              full.id +
              '" class="btn btn-sm btn-outline-success btn-icon mr-2" title="Editar cliente" data-theme="dark" data-toggle="tooltip" data-placement="top">' +
              '<span class="svg-icon svg-icon-md"><i class="flaticon-edit"></i></span></a>' +
              '<button class="btn btn-clean btn-sm btn-icon btn-outline-success mt-1" onClick="deletecliente(' +
              full.id +
              "," +
              full.id +
              ')" data-toggle="modal" data-target="#model_delete_user" data-toggle="tooltip" data-theme="dark" title="Desactivar cliente">' +
              '<span class="svg-icon svg-icon-md"><i class="flaticon-delete"></i></span></button>'
            );
          },
        },
      ],
      buttons: [
        { extend: "excel", className: "invisible" },
        { extend: "pdf", className: "invisible" },
        { extend: "csv", className: "invisible" },
        { extend: "print", className: "invisible" },
      ],
    }).on("init.dt", function () {
      if (window.KTApp && KTApp.initTooltips) KTApp.initTooltips();
    });

    // Export
    $("#export-excel").on("click", function () {
      table.button(0).trigger();
    });
    $("#export-pdf").on("click", function () {
      table.button(1).trigger();
    });
    $("#export-csv").on("click", function () {
      table.button(2).trigger();
    });
    $("#export-print").on("click", function () {
      table.button(3).trigger();
    });

    // Filtros
    $("#kt_search").on("click", function (e) {
      e.preventDefault();
      var params = {};
      $(".datatable-input").each(function () {
        var i = $(this).data("col-index");
        if (params[i]) {
          params[i] += "|" + $(this).val();
        } else {
          params[i] = $(this).val();
        }
      });
      $.each(params, function (i, val) {
        table.column(i).search(val ? val : "", false, false);
      });
      table.table().draw();
    });

    $("#kt_reset").on("click", function (e) {
      e.preventDefault();
      $(".datatable-input").each(function () {
        $(this).val("");
        table.column($(this).data("col-index")).search("", false, false);
      });
      table.table().draw();
    });
  };

  return {
    init: function () {
      if ($("#kdatatable_usuarios").length) initTable1();
    },
  };
})();

jQuery(document).ready(function () {
  Tabla.init();
});

/* ===========================================
 * Tabla de ANALISIS (#kdatatable_clientes_inactivos)
 * con scroll horizontal + vertical y cabecera fija
 * =========================================== */
(function () {
  if (!$.fn.DataTable) return;

  // Inicializa DataTable solo si existe la tabla
  if (!$("#kdatatable_clientes_inactivos").length) return;

  // Opcional: ancho mínimo para activar scroll horizontal
  var minWidthPx = 1400;
  $("#kdatatable_clientes_inactivos").css("min-width", minWidthPx + "px");

  // DataTable con scroll X/Y; con scrollY, el header queda siempre visible
  var DT_INACTIVOS = $("#kdatatable_clientes_inactivos").DataTable({
    language: {
      lengthMenu: "Display _MENU_",
      url: $("#datatable_i18n").val(),
    },
    // Estructura con contenedor scroll de DataTables
    dom:
      "<'row'<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
      "<'col-sm-6 d-flex align-items-center justify-content-end'f>>" +
      "<'dataTables_scroll'<'dataTables_scrollHead'>'t'<'dataTables_scrollFoot'>>" +
      "<'row'<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
      "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>>",

    scrollX: true,
    scrollY: "60vh",
    scrollCollapse: true,
    paging: true,
    deferRender: true,
    autoWidth: false,
    responsive: false, // evitamos que esconda columnas; usamos scrollX
    ordering: true,
    order: [],

    // Si necesitas fijar columnas del lado izquierdo, descomenta:
    // fixedColumns: { leftColumns: 1 }, // requiere el plugin FixedColumns
  });

  // <<< AQUÍ va el ajuste que me pediste >>>
  // Recalcular anchos en el siguiente ciclo del event loop,
  // para que tome los estilos/anchos definitivos de la página.
  if (window.DT_INACTIVOS) {
    try {
      setTimeout(function () {
        window.DT_INACTIVOS.columns.adjust().draw(false);
      }, 0);
    } catch (e) {}
  } else {
    // Si no existe global aún, lo exponemos y ajustamos
    window.DT_INACTIVOS = DT_INACTIVOS;
    setTimeout(function () {
      DT_INACTIVOS.columns.adjust().draw(false);
    }, 0);
  }

  // Ajusta al redimensionar ventana o cuando cambias tabs/colapsables
  $(window).on("resize", function () {
    DT_INACTIVOS.columns.adjust().draw(false);
  });
  $(document).on("shown.bs.tab shown.bs.collapse", function () {
    DT_INACTIVOS.columns.adjust().draw(false);
  });
})();

/* ============================
 * Acciones (SweetAlert)
 * ============================ */
function deletecliente(nombre, id) {
  Swal.fire({
    title: "Estas seguro de desactivar el registro " + nombre,
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Si, Desactivarlo!",
    cancelButtonText: "No, Cancelar!",
    reverseButtons: true,
  }).then(function (result) {
    if (result.value) {
      document.getElementById("id_cliente_delete").value = id;
      Swal.fire({
        position: "top-center",
        icon: "success",
        title: "Espere un momento, la información esta siendo procesada",
        showConfirmButton: false,
      });
      document.getElementById("cliente_delete_form").submit();
    } else if (result.dismiss === "cancel") {
      Swal.fire("Cancelada", "La acción fue cancelada", "error");
    }
  });
}

$(document).on("click", ".activar-cliente", function () {
  var id = $(this).data("id");
  var nombre = $(this).data("nombre");

  Swal.fire({
    title: "Estas seguro de activar el registro " + nombre,
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Si, Activarlo!",
    cancelButtonText: "No, Cancelar!",
    reverseButtons: true,
  }).then(function (result) {
    if (result.value) {
      document.getElementById("id_delete").value = id;
      Swal.fire({
        position: "top-center",
        icon: "success",
        title: "Espere un momento, la información esta siendo procesada",
        showConfirmButton: false,
      });
      document.getElementById("cliente_act_form").submit();
    } else if (result.dismiss === "cancel") {
      Swal.fire("Cancelada", "La acción fue cancelada", "error");
    }
  });
});
