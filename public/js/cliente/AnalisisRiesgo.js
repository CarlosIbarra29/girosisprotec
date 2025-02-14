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



// Alcances Tecnologicos
    $(document).on('change', 'select[id^="punto_normativo_tecnologico"]', function () {
        var id = $(this).attr('id');
        var idGrupo = $(this).val();
        var idDocumento = id.replace('punto_normativo_tecnologico', '');
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
        window.location.href = "/cliente/generar-analisis-riesgos-tecnologico/"+id_cliente+"/"+id_tipo+"/"+idGrupo+"/1";

    });


    $("#alcance_mas_tec").click(function(){
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
        window.location.href = "/cliente/generar-analisis-riesgos-tecnologico/"+id_cliente+"/"+id_tipo+"/"+id_alcance+"/"+consecutivo;
    });


    $("#alcance_menos_tec").click(function(){
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
        window.location.href = "/cliente/generar-analisis-riesgos-tecnologico/"+id_cliente+"/"+id_tipo+"/"+id_alcance+"/"+consecutivo;
    });

// Alcances Naturales

    $(document).on('change', 'select[id^="punto_normativo_naturales"]', function () {
        var id = $(this).attr('id');
        var idGrupo = $(this).val();
        var idDocumento = id.replace('punto_normativo_naturales', '');
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
        window.location.href = "/cliente/generar-analisis-riesgos-naturales/"+id_cliente+"/"+id_tipo+"/"+idGrupo+"/1";

    });

    $("#alcance_mas_nat").click(function(){
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
        window.location.href = "/cliente/generar-analisis-riesgos-naturales/"+id_cliente+"/"+id_tipo+"/"+id_alcance+"/"+consecutivo;
    });


    $("#alcance_menos_nat").click(function(){
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
        window.location.href = "/cliente/generar-analisis-riesgos-naturales/"+id_cliente+"/"+id_tipo+"/"+id_alcance+"/"+consecutivo;
    });

// Alcances otros
    $(document).on('change', 'select[id^="punto_normativo_otros"]', function () {
        var id = $(this).attr('id');
        var idGrupo = $(this).val();
        var idDocumento = id.replace('punto_normativo_otros', '');
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
        window.location.href = "/cliente/generar-analisis-otros-riesgos/"+id_cliente+"/"+id_tipo+"/"+idGrupo+"/1";

    });

    $("#alcance_mas_otros").click(function(){
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
        window.location.href = "/cliente/generar-analisis-otros-riesgos/"+id_cliente+"/"+id_tipo+"/"+id_alcance+"/"+consecutivo;
    });


    $("#alcance_menos_otros").click(function(){
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
        window.location.href = "/cliente/generar-analisis-otros-riesgos/"+id_cliente+"/"+id_tipo+"/"+id_alcance+"/"+consecutivo;
    });



    // $(document).on('change', 'select[id^="nivel_control"]', function () {

    $(document).on('change', 'select#nivel_control, select#factor_probabilidad, select#impacto_severidad', function () {

        var nivel_control = document.getElementById("nivel_control").value

        if(nivel_control == 1){
            $(".nivel_inoperante").show(); $(".nivel_sincontrol").hide(); $(".nivel_deficiente").hide(); $(".regular").hide(); $(".eficiente").hide(); $(".optimo").hide();

            var control = 3.162;
        }
        
        if(nivel_control == 2){
            $(".nivel_inoperante").hide(); $(".nivel_sincontrol").show(); $(".nivel_deficiente").hide(); $(".regular").hide(); $(".eficiente").hide(); $(".optimo").hide();
        
            var control = 3.162;

        }
        
        if(nivel_control == 3){
            $(".nivel_inoperante").hide(); $(".nivel_sincontrol").hide(); $(".nivel_deficiente").show(); $(".regular").hide(); $(".eficiente").hide();$(".optimo").hide();
        
            var control = 2.530;

        }
        
        if(nivel_control == 4){
            $(".nivel_inoperante").hide(); $(".nivel_sincontrol").hide(); $(".nivel_deficiente").hide(); $(".regular").show(); $(".eficiente").hide(); $(".optimo").hide();
        
            var control = 1.897;

        }
        
        if(nivel_control == 5){
            $(".nivel_inoperante").hide(); $(".nivel_sincontrol").hide(); $(".nivel_deficiente").hide(); $(".regular").hide(); $(".eficiente").show(); $(".optimo").hide();
        
            var control = 1.265;

        }
        
        if(nivel_control == 6){
            $(".nivel_inoperante").hide(); $(".nivel_sincontrol").hide(); $(".nivel_deficiente").hide(); $(".regular").hide(); $(".eficiente").hide(); $(".optimo").show();
        
            var control = 0.632;

        }

        var factor_probabilidad = document.getElementById("factor_probabilidad").value

        if(factor_probabilidad == 1){

            var probabilidad = 3.162;

        } else if(factor_probabilidad == 2){

            var probabilidad = 2.530;

        } else if(factor_probabilidad == 3){

            var probabilidad = 1.897

        } else if(factor_probabilidad == 4){

            var probabilidad = 1.265

        } else if(factor_probabilidad == 5){

            var probabilidad = 0.632

        } 

        var impacto_severidad = document.getElementById("impacto_severidad").value

        if(impacto_severidad == 1){

            var impacto = 0.4;

        } else if(impacto_severidad == 2){

            var impacto = 1.2;

        } else if(impacto_severidad == 3){

            var impacto = 2.0;

        } else if(impacto_severidad == 4){

            var impacto = 4.0;

        } else if(impacto_severidad == 5){

            var impacto = 6.0;

        } else if(impacto_severidad == 6){

            var impacto = 8.0;

        } else if(impacto_severidad == 7){

            var impacto = 10.0;

        }

        var rIndieP = (control * probabilidad) * impacto;

        document.getElementById("nivel_riesgo").value = rIndieP;


        if (rIndieP == 0){

            $(".nivelmmb").show();$(".nivelmb").hide();$(".nivelb").hide();$(".nivelm").hide();$(".nivela").hide(); $(".nivelma").hide(); $(".nivelmma").hide(); 

        } else if (rIndieP > 0 && rIndieP <= 1.4){

            $(".nivelmmb").hide();$(".nivelmb").show();$(".nivelb").hide();$(".nivelm").hide();$(".nivela").hide(); $(".nivelma").hide(); $(".nivelmma").hide();

        } else if (rIndieP >= 1.50 && rIndieP <= 6.4){

            $(".nivelmmb").hide();$(".nivelmb").hide();$(".nivelb").show();$(".nivelm").hide();$(".nivela").hide(); $(".nivelma").hide(); $(".nivelmma").hide();

        } else if (rIndieP >= 6.5 && rIndieP <= 16){

           $(".nivelmmb").hide();$(".nivelmb").hide();$(".nivelb").hide();$(".nivelm").show();$(".nivela").hide(); $(".nivelma").hide(); $(".nivelmma").hide();

        } else if (rIndieP >= 16.10 && rIndieP <= 36){

            $(".nivelmmb").hide();$(".nivelmb").hide();$(".nivelb").hide();$(".nivelm").hide();$(".nivela").show(); $(".nivelma").hide(); $(".nivelmma").hide();

        } else if (rIndieP >= 36.10 && rIndieP <= 80){

            $(".nivelmmb").hide();$(".nivelmb").hide();$(".nivelb").hide();$(".nivelm").hide();$(".nivela").hide(); $(".nivelma").show(); $(".nivelmma").hide();
        
        } else if (rIndieP >= 80.10 && rIndieP <= 100){

            $(".nivelmmb").hide();$(".nivelmb").hide();$(".nivelb").hide();$(".nivelm").hide();$(".nivela").hide(); $(".nivelma").hide(); $(".nivelmma").show();
        
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