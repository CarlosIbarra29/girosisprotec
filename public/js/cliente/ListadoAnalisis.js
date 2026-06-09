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
              '<button class="btn btn-clean btn-sm btn-icon btn-outline-success mt-1" onClick="deleteanalisis(' +
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
      if ($("#kdatatable_usuarios").length) {
        initTable1();
      }
    },
  };
})();

jQuery(document).ready(function () {
  Tabla.init();
});

/* ===========================================
 * Tabla de ANALISIS (#kdatatable_clientes_inactivos)
 * Scroll X/Y + cabecera visible + filtros por columna ARRIBA
 * =========================================== */
(function () {
  if (!jQuery || !jQuery.fn || !jQuery.fn.DataTable) return;

  var $ = jQuery;
  var $tabla = $("#kdatatable_clientes_inactivos");

  if (!$tabla.length) return;

  // Ancho mínimo para activar scroll horizontal
  var minWidthPx = 1400;
  $tabla.css("min-width", minWidthPx + "px");

  /* --------------------------------------------------
   * 1) Crear fila de filtros en EL ENCABEZADO (thead)
   *    tomando SOLO la fila real de títulos
   * -------------------------------------------------- */
  var $thead = $tabla.find("thead");

  // Si existe la fila real con clase main-header-row, usamos esa.
  // Si no, usamos la última fila del thead como respaldo.
  var $headerRow = $thead.find("tr.main-header-row").first();
  if (!$headerRow.length) {
    $headerRow = $thead.find("tr").last();
  }

  // Evitar duplicar filtros si el script vuelve a correr
  $thead.find("tr.filters-row").remove();

  var $filterRow = $headerRow.clone(false);

  $filterRow
    .removeClass("main-header-row quadrant-row")
    .addClass("filters-row")
    .find("th")
    .each(function () {
      var title = $(this).text().trim().replace(/\s+/g, " ");

      // Sin filtro en "Acciones" o columnas sin título
      if (!title || title.toLowerCase() === "acciones") {
        $(this).html("");
        return;
      }

      $(this).html(
        '<input type="text" class="form-control form-control-sm column-filter" placeholder="' +
          title +
          '" />'
      );
    });

  // Agregar la fila de filtros al final del thead
  $thead.append($filterRow);

  /* --------------------------------------------------
   * 2) Inicializar DataTable
   * -------------------------------------------------- */
  var DT_INACTIVOS = $tabla.DataTable({
    language: {
      lengthMenu: "Display _MENU_",
      url: $("#datatable_i18n").val(),
    },
    dom:
      "<'row'<'col-sm-6 d-flex align-items-center justify-content-start'l>" +
      "<'col-sm-6 d-flex align-items-center justify-content-end'f>>" +
      "rt" +
      "<'row'<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
      "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>>",
    scrollX: true,
    scrollY: "60vh",
    scrollCollapse: true,
    paging: true,
    deferRender: true,
    autoWidth: false,
    responsive: false,
    ordering: true,
    order: [],
    orderCellsTop: true,
    fixedHeader: true,
  });

  // --- Estado inicial: filtros ocultos ---
  setTimeout(function () {
    var $wrapper = $("#kdatatable_clientes_inactivos_wrapper");
    if (!$wrapper.length) return;

    $wrapper.addClass("filters-hidden");
    $wrapper.find("thead tr.filters-row").hide();

    $wrapper
      .find(".btn-filters-toggle")
      .addClass("filters-off")
      .attr("title", "Mostrar filtros");
  }, 0);

  /* --------------------------------------------------
   * Botón "Filtros" junto a ESC.
   * -------------------------------------------------- */
  $(document).on(
    "click",
    "#kdatatable_clientes_inactivos_wrapper .btn-filters-toggle",
    function (e) {
      e.preventDefault();

      var $wrapper = $("#kdatatable_clientes_inactivos_wrapper");
      if (!$wrapper.length) return;

      var ocultos = $wrapper.hasClass("filters-hidden");
      var ahoraOcultos = !ocultos;

      $wrapper.toggleClass("filters-hidden", ahoraOcultos);

      var $filterRows = $wrapper.find("thead tr.filters-row");
      if (ahoraOcultos) {
        $filterRows.hide();
      } else {
        $filterRows.show();
      }

      var nuevoTitle = ahoraOcultos ? "Mostrar filtros" : "Ocultar filtros";
      $wrapper
        .find(".btn-filters-toggle")
        .toggleClass("filters-off", ahoraOcultos)
        .attr("title", nuevoTitle);

      try {
        DT_INACTIVOS.columns().adjust().draw(false);
      } catch (err) {}
    }
  );

  window.DT_INACTIVOS = DT_INACTIVOS;

  /* --------------------------------------------------
   * 3) Conectar inputs con la búsqueda de su columna
   * -------------------------------------------------- */
  DT_INACTIVOS.columns().eq(0).each(function (colIdx) {
    var th = $thead.find("tr.filters-row th").eq(colIdx);

    $("input", th).on("keyup change clear", function () {
      var val = this.value;

      if (DT_INACTIVOS.column(colIdx).search() !== val) {
        DT_INACTIVOS
          .column(colIdx)
          .search(val || "", false, false)
          .draw();
      }
    });
  });

  /* --------------------------------------------------
   * 4) Ajustar columnas cuando cambie el layout
   * -------------------------------------------------- */
  function ajustaColumnas() {
    try {
      DT_INACTIVOS.columns().adjust().draw(false);
    } catch (e) {}
  }

  setTimeout(ajustaColumnas, 0);

  $(window).on("resize", ajustaColumnas);
  $(document).on("shown.bs.tab shown.bs.collapse", ajustaColumnas);
})();

/* ============================
 * Acciones (SweetAlert)
 * ============================ */
function deleteanalisis(nombre, id) {
  Swal.fire({
    title: "Estas seguro de eliminar el registro " + nombre,
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Si, Eliminarlo!",
    cancelButtonText: "No, Cancelar!",
    reverseButtons: true,
  }).then(function (result) {
    if (result.value) {
      document.getElementById("id_delete_analisis").value = id;

      Swal.fire({
        position: "top-center",
        icon: "success",
        title: "Espere un momento, la información esta siendo procesada",
        showConfirmButton: false,
      });

      document.getElementById("analisis_delete_form").submit();
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