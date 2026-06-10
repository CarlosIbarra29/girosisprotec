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
 * Resize de columnas tipo Excel
 * =========================================== */
(function () {
  if (!jQuery || !jQuery.fn || !jQuery.fn.DataTable) return;

  var $ = jQuery;
  var $tabla = $("#kdatatable_clientes_inactivos");

  if (!$tabla.length) return;

  var STORAGE_KEY = "giro:listadoanalisis:column-widths:v3";

  var defaultWidths = [
    88, 118, 150, 165, 220, 250, 180, 165, 165, 230,
    145, 90, 90, 105, 85, 90, 85, 90, 135, 145,
    130, 125, 190, 205, 145, 230, 135,
    165, 80, 100, 105, 105, 90, 120, 90, 95,
    140, 130, 140, 165, 140, 145, 130, 220,
    220, 160, 100, 125, 125, 150, 155, 145, 125
  ];

  function getMainHeaderRow() {
    var $thead = $tabla.find("thead");
    var $headerRow = $thead.find("tr.main-header-row").first();
    if (!$headerRow.length) $headerRow = $thead.find("tr").last();
    return $headerRow;
  }

  function getColumnCount() {
    return getMainHeaderRow().find("th").length;
  }

  function normalizeWidths(widths, count) {
    var out = [];
    for (var i = 0; i < count; i++) {
      var w = parseInt(widths && widths[i], 10);
      if (!w) w = defaultWidths[i] || 130;
      if (w < 70) w = 70;
      if (w > 720) w = 720;
      out.push(w);
    }
    return out;
  }

  function loadWidths(count) {
    try {
      var raw = localStorage.getItem(STORAGE_KEY);
      if (!raw) return normalizeWidths(defaultWidths, count);
      return normalizeWidths(JSON.parse(raw), count);
    } catch (e) {
      return normalizeWidths(defaultWidths, count);
    }
  }

  function saveWidths(widths) {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify(widths));
    } catch (e) {}
  }

  function sumWidths(widths) {
    return widths.reduce(function (a, b) { return a + b; }, 0);
  }

  function ensureColgroup($table, count) {
    var $colgroup = $table.children("colgroup.giro-colgroup");
    if (!$colgroup.length) {
      $colgroup = $('<colgroup class="giro-colgroup"></colgroup>');
      $table.prepend($colgroup);
    }
    if ($colgroup.children("col").length !== count) {
      $colgroup.empty();
      for (var i = 0; i < count; i++) $colgroup.append("<col>");
    }
    return $colgroup;
  }

  function allTables() {
    return $(
      "#kdatatable_clientes_inactivos," +
      "#kdatatable_clientes_inactivos_wrapper .dataTables_scrollHead table," +
      "#kdatatable_clientes_inactivos_wrapper .dataTables_scrollBody table," +
      "#kdatatable_clientes_inactivos_wrapper .dataTables_scrollFoot table"
    );
  }

  function applyWidths(widths, DT) {
    var count = widths.length;
    var total = sumWidths(widths);

    allTables().each(function () {
      var $t = $(this);
      $t.css({
        width: total + "px",
        minWidth: total + "px",
        tableLayout: "fixed"
      });

      var $colgroup = ensureColgroup($t, count);
      widths.forEach(function (w, i) {
        $colgroup.children("col").eq(i).css({
          width: w + "px",
          minWidth: w + "px"
        });
      });
    });

    if (DT) {
      try { DT.columns.adjust(); } catch (e) {}
    }
  }

  function addResizeHandles(DT, widths) {
    var $head = $("#kdatatable_clientes_inactivos_wrapper .dataTables_scrollHead table thead tr.main-header-row th");
    if (!$head.length) $head = $tabla.find("thead tr.main-header-row th");

    $head.find(".dt-col-resizer").remove();

    $head.each(function (index) {
      var $th = $(this);
      var $handle = $('<span class="dt-col-resizer" aria-hidden="true" title="Arrastra para ajustar columna"></span>');

      $handle.on("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
      });

      $handle.on("dblclick", function (e) {
        e.preventDefault();
        e.stopPropagation();
        widths[index] = defaultWidths[index] || 130;
        saveWidths(widths);
        applyWidths(widths, DT);
        setTimeout(function () {
          try { DT.columns.adjust().draw(false); } catch (err) {}
          applyWidths(widths, DT);
          addResizeHandles(DT, widths);
        }, 30);
      });

      $handle.on("mousedown touchstart", function (e) {
        e.preventDefault();
        e.stopPropagation();

        var startEvent = e.type === "touchstart" ? e.originalEvent.touches[0] : e;
        var startX = startEvent.pageX;
        var startWidth = widths[index] || $th.outerWidth();
        var lastWidth = startWidth;

        $("body").addClass("giro-is-resizing");
        $handle.addClass("is-active");

        function onMove(ev) {
          var moveEvent = ev.type === "touchmove" ? ev.originalEvent.touches[0] : ev;
          var diff = moveEvent.pageX - startX;
          var nextWidth = startWidth + diff;

          if (nextWidth < 70) nextWidth = 70;
          if (nextWidth > 720) nextWidth = 720;
          if (Math.abs(nextWidth - lastWidth) < 1) return;

          lastWidth = nextWidth;
          widths[index] = nextWidth;
          applyWidths(widths, null);
        }

        function onEnd() {
          $("body").removeClass("giro-is-resizing");
          $handle.removeClass("is-active");
          $(document).off(".giroResizeCols");

          saveWidths(widths);

          setTimeout(function () {
            applyWidths(widths, DT);
            try { DT.columns.adjust().draw(false); } catch (err) {}
            applyWidths(widths, DT);
            addResizeHandles(DT, widths);
          }, 40);
        }

        $(document)
          .on("mousemove.giroResizeCols touchmove.giroResizeCols", onMove)
          .on("mouseup.giroResizeCols touchend.giroResizeCols touchcancel.giroResizeCols", onEnd);
      });

      $th.append($handle);
    });
  }

  var columnCount = getColumnCount();
  var columnWidths = loadWidths(columnCount);
  applyWidths(columnWidths, null);

  /* --------------------------------------------------
   * 1) Crear fila de filtros en EL ENCABEZADO (thead)
   *    tomando SOLO la fila real de títulos
   * -------------------------------------------------- */
  var $thead = $tabla.find("thead");
  var $headerRow = getMainHeaderRow();

  // Evitar duplicar filtros si el script vuelve a correr
  $thead.find("tr.filters-row").remove();

  var $filterRow = $headerRow.clone(false);

  $filterRow
    .removeClass("main-header-row quadrant-row")
    .addClass("filters-row")
    .find("th")
    .each(function () {
      var $th = $(this);
      $th.find(".dt-col-resizer, .btn-filters-toggle").remove();
      var title = $th.text().trim().replace(/\s+/g, " ");

      // Sin filtro en "Acciones" o columnas sin título
      if (!title || title.toLowerCase() === "acciones") {
        $th.html("");
        return;
      }

      $th.html(
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
      lengthMenu: "Mostrar _MENU_",
      url: $("#datatable_i18n").val(),
    },
    dom:
      "<'row giro-dt-toolbar'<'col-sm-6 d-flex align-items-center justify-content-start'l>" +
      "<'col-sm-6 d-flex align-items-center justify-content-end'f>>" +
      "rt" +
      "<'row giro-dt-footer'<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
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
    fixedHeader: false,
    stateSave: false,
    drawCallback: function () {
      applyWidths(columnWidths, DT_INACTIVOS);
      addResizeHandles(DT_INACTIVOS, columnWidths);
      if (window.KTApp && KTApp.initTooltips) KTApp.initTooltips();
    }
  });

  window.DT_INACTIVOS = DT_INACTIVOS;

  setTimeout(function () {
    applyWidths(columnWidths, DT_INACTIVOS);
    addResizeHandles(DT_INACTIVOS, columnWidths);
    try { DT_INACTIVOS.columns.adjust().draw(false); } catch (e) {}
    applyWidths(columnWidths, DT_INACTIVOS);
  }, 150);

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
      e.stopPropagation();

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

      setTimeout(function () {
        try { DT_INACTIVOS.columns().adjust().draw(false); } catch (err) {}
        applyWidths(columnWidths, DT_INACTIVOS);
        addResizeHandles(DT_INACTIVOS, columnWidths);
      }, 40);
    }
  );

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
    try { DT_INACTIVOS.columns().adjust().draw(false); } catch (e) {}
    applyWidths(columnWidths, DT_INACTIVOS);
    addResizeHandles(DT_INACTIVOS, columnWidths);
  }

  setTimeout(ajustaColumnas, 350);
  setTimeout(ajustaColumnas, 900);

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