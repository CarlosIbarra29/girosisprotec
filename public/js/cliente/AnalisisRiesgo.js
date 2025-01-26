    $(document).on('change', 'select[id^="punto_normativo"]', function () {
        var id = $(this).attr('id');
        var idGrupo = $(this).val();
        var idDocumento = id.replace('punto_normativo', '');
        var id_cliente = document.getElementById("id_cliente").value;
        var id_tipo = document.getElementById("id_tipo").value;
        
        var url = $('#url_alcances').val();
        var data = {
            id: idGrupo,
            _token: $("[name='_token']").val()
        };

        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Espere un momento, la información esta siendo procesada",
            showConfirmButton: false
        });
        window.location.href = "/cliente/generar-analisis-riesgos/"+id_cliente+"/"+id_tipo+"/"+idGrupo+"/1";

    });


    $("#alcance_mas").click(function(){
        var paginador = document.getElementById("paginador_num").value;
        var id_cliente = document.getElementById("id_cliente").value;
        var id_tipo = document.getElementById("id_tipo").value;
        var id_alcance = document.getElementById("id_alcance").value;
        var consecutivo = parseInt(paginador) + 1;
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Espere un momento, la información esta siendo procesada",
            showConfirmButton: false
        });
        window.location.href = "/cliente/generar-analisis-riesgos/"+id_cliente+"/"+id_tipo+"/"+id_alcance+"/"+consecutivo;
    });


    $("#alcance_menos").click(function(){
        var paginador = document.getElementById("paginador_num").value;
        var id_cliente = document.getElementById("id_cliente").value;
        var id_tipo = document.getElementById("id_tipo").value;
        var id_alcance = document.getElementById("id_alcance").value;
        var consecutivo = parseInt(paginador) - 1;
        Swal.fire({
            position: "top-center",
            icon: "success",
            title: "Espere un momento, la información esta siendo procesada",
            showConfirmButton: false
        });
        window.location.href = "/cliente/generar-analisis-riesgos/"+id_cliente+"/"+id_tipo+"/"+id_alcance+"/"+consecutivo;
    });


    $(document).on('change', 'select[id^="nivel_control"]', function () {

        var nivel_control = document.getElementById("nivel_control").value

        if(nivel_control == 1){
            $(".nivel_inoperante").show(); $(".nivel_sincontrol").hide(); $(".nivel_deficiente").hide(); $(".regular").hide(); $(".eficiente").hide(); $(".optimo").hide();
        }
        if(nivel_control == 2){
            $(".nivel_inoperante").hide(); $(".nivel_sincontrol").show(); $(".nivel_deficiente").hide(); $(".regular").hide(); $(".eficiente").hide(); $(".optimo").hide();
        }
        if(nivel_control == 3){
            $(".nivel_inoperante").hide(); $(".nivel_sincontrol").hide(); $(".nivel_deficiente").show(); $(".regular").hide(); $(".eficiente").hide();$(".optimo").hide();
        }
        if(nivel_control == 4){
            $(".nivel_inoperante").hide(); $(".nivel_sincontrol").hide(); $(".nivel_deficiente").hide(); $(".regular").show(); $(".eficiente").hide(); $(".optimo").hide();
        }
        if(nivel_control == 5){
            $(".nivel_inoperante").hide(); $(".nivel_sincontrol").hide(); $(".nivel_deficiente").hide(); $(".regular").hide(); $(".eficiente").show(); $(".optimo").hide();
        }
        if(nivel_control == 6){
            $(".nivel_inoperante").hide(); $(".nivel_sincontrol").hide(); $(".nivel_deficiente").hide(); $(".regular").hide(); $(".eficiente").hide(); $(".optimo").show();
        }
    });

$("#btnGuardar").click(function(){
    Swal.fire({
        position: "top-center",
        icon: "success",
        title: "Espere un momento, la información esta siendo procesada",
        showConfirmButton: false
    });
    document.getElementById("submit_analisis_social").submit();
});