
// A G R E G A R   R O L

	$("#btnGuardar").click(function(){
	    var name_rol = document.getElementById("name_rol").value;
	    if(name_rol == ""){
	        Swal.fire("Para continuar debes agregar el nombre del rol");
	    }else{
			Swal.fire({
				position: "top-center",
				icon: "success",
				title: "Espere un momento, la información esta siendo procesada",
				showConfirmButton: false
			});
	        document.getElementById("frmRol").submit();
	    }
	});

// E D I T A R   R O L
 	$("#send_rol").click(function(){
	    var name_rol = document.getElementById("name_rol").value;
	    if(name_rol == ""){
	        Swal.fire("Para continuar debes agregar el nombre del rol");
	    }else{
			Swal.fire({
				position: "top-center",
				icon: "success",
				title: "Espere un momento, la información esta siendo procesada",
				showConfirmButton: false
			});
	        document.getElementById("submit_rol_edit").submit();
	    }
	});

// M O D U L O   D E   P E R M I S O S
		$('#all_generales_check').change(function () {
		    ($(this).is(":checked") ? $('.all_generales').prop("checked", true) :    $('.all_generales').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_user').prop("checked", true) :    $('#all_user').prop("checked", false));
		    ($(this).is(":checked") ? $('#CheckAll').prop("checked", true) :    $('#CheckAll').prop("checked", false));
		    ($(this).is(":checked") ? $('#CheckTablero').prop("checked", true) :    $('#CheckTablero').prop("checked", false));
		});


		$(".user_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_1");
			var op_user = document.getElementById("op_user").value;

			if(op_user == 0){
				element.classList.add("active");
				 document.getElementById("op_user").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_user").value = 0;
			}
		});

		$('#all_user').change(function () {
		    ($(this).is(":checked") ? $('.user_check').prop("checked", true) :    $('.user_check').prop("checked", false))
		});


		$(".rol_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_2");
			var op_rol = document.getElementById("op_rol").value;

			if(op_rol == 0){
				element.classList.add("active");
				 document.getElementById("op_rol").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_rol").value = 0;
			}
		});

		$('#CheckAll').change(function () {
		    ($(this).is(":checked") ? $('.roles_check').prop("checked", true) :    $('.roles_check').prop("checked", false))
		});

		$(".tablero_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_tablero");
			var op_tablero = document.getElementById("op_tablero").value;

			if(op_tablero == 0){
				element.classList.add("active");
				 document.getElementById("op_tablero").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_tablero").value = 0;
			}
		});

		$('#CheckTablero').change(function () {
		    ($(this).is(":checked") ? $('.tablero_check').prop("checked", true) :    $('.tablero_check').prop("checked", false))
		});

	// PERMISOS GENERALES END
		//        ADMINISTRACION DEL SISTEMA

	// PERMISOS UNIDADES
		$("#all_unidades_check").click(function(){
		    ($(this).is(":checked") ? $('.all_unidades').prop("checked", true) :    $('.all_unidades').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_unidad').prop("checked", true) :    $('#all_unidad').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_marca').prop("checked", true) :    $('#all_marca').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_modelo').prop("checked", true) :    $('#all_modelo').prop("checked", false));
		    // ($(this).is(":checked") ? $('#all_ubicacion').prop("checked", true) :    $('#all_ubicacion').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_estatus').prop("checked", true) :    $('#all_estatus').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_aseguradora').prop("checked", true) :    $('#all_aseguradora').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_tipovehiculo').prop("checked", true) :    $('#all_tipovehiculo').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_agencia').prop("checked", true) :    $('#all_agencia').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_documento').prop("checked", true) :    $('#all_documento').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_asignacion').prop("checked", true) :    $('#all_asignacion').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_mantenimiento').prop("checked", true) :    $('#all_mantenimiento').prop("checked", false));
		});
		$("#all_unidad").click(function(){
			($(this).is(":checked") ? $('.unidad_check').prop("checked", true) :    $('.unidad_check').prop("checked", false))
		});

		$(".unidad_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_3");
			var op_unidad = document.getElementById("op_unidad").value;

			if(op_unidad == 0){
				element.classList.add("active");
				 document.getElementById("op_unidad").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_unidad").value = 0;
			}
		});

		$("#all_marca").click(function(){
			($(this).is(":checked") ? $('.marca_check').prop("checked", true) :    $('.marca_check').prop("checked", false))
		});

		$(".marca_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_4");
			var op_marca = document.getElementById("op_marca").value;

			if(op_marca == 0){
				element.classList.add("active");
				 document.getElementById("op_marca").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_marca").value = 0;
			}
		});

		$("#all_modelo").click(function(){
			($(this).is(":checked") ? $('.modelo_check').prop("checked", true) :    $('.modelo_check').prop("checked", false))
		});

		$(".modelo_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_5");
			var op_modelo = document.getElementById("op_modelo").value;

			if(op_modelo == 0){
				element.classList.add("active");
				 document.getElementById("op_modelo").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_modelo").value = 0;
			}
		});

		$("#all_ubicacion").click(function(){
			($(this).is(":checked") ? $('.ubicacion_check').prop("checked", true) :    $('.ubicacion_check').prop("checked", false))
		});

		$(".ubicacion_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_6");
			var op_ubicacion = document.getElementById("op_ubicacion").value;

			if(op_ubicacion == 0){
				element.classList.add("active");
				 document.getElementById("op_ubicacion").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_ubicacion").value = 0;
			}
		});

		$("#all_estatus").click(function(){
			($(this).is(":checked") ? $('.estatus_check').prop("checked", true) :    $('.estatus_check').prop("checked", false))
		});

		$(".estatus_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_7");
			var op_estatus = document.getElementById("op_estatus").value;

			if(op_estatus == 0){
				element.classList.add("active");
				 document.getElementById("op_estatus").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_estatus").value = 0;
			}
		});

		$("#all_aseguradora").click(function(){
			($(this).is(":checked") ? $('.aseguradora_check').prop("checked", true) :    $('.aseguradora_check').prop("checked", false))
		});

		$(".aseguradora_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_8");
			var op_aseguradora = document.getElementById("op_aseguradora").value;

			if(op_aseguradora == 0){
				element.classList.add("active");
				 document.getElementById("op_aseguradora").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_aseguradora").value = 0;
			}
		});

		$("#all_tipovehiculo").click(function(){
			($(this).is(":checked") ? $('.tipovehiculo_check').prop("checked", true) :    $('.tipovehiculo_check').prop("checked", false))
		});

		$(".tipovehiculo_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_12");
			var op_tipovehiculo = document.getElementById("op_tipovehiculo").value;

			if(op_tipovehiculo == 0){
				element.classList.add("active");
				 document.getElementById("op_tipovehiculo").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_tipovehiculo").value = 0;
			}
		});

		$("#all_agencia").click(function(){
			($(this).is(":checked") ? $('.agencia_check').prop("checked", true) :    $('.agencia_check').prop("checked", false))
		});

		$(".agencia_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_13");
			var op_agencia = document.getElementById("op_agencia").value;

			if(op_agencia == 0){
				element.classList.add("active");
				 document.getElementById("op_agencia").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_agencia").value = 0;
			}
		});

		$("#all_documento").click(function(){
			($(this).is(":checked") ? $('.documento_check').prop("checked", true) :    $('.documento_check').prop("checked", false))
		});

		$(".documento_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_14");
			var op_documento = document.getElementById("op_documento").value;

			if(op_documento == 0){
				element.classList.add("active");
				 document.getElementById("op_documento").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_documento").value = 0;
			}
		});

		$("#all_asignacion").click(function(){
			($(this).is(":checked") ? $('.asignacion_check').prop("checked", true) :    $('.asignacion_check').prop("checked", false))
		});

		$(".asignacion_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_15");
			var op_asignacion = document.getElementById("op_asignacion").value;

			if(op_asignacion == 0){
				element.classList.add("active");
				 document.getElementById("op_asignacion").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_asignacion").value = 0;
			}
		});

		$("#all_mantenimiento").click(function(){
			($(this).is(":checked") ? $('.mantenimiento_check').prop("checked", true) :    $('.mantenimiento_check').prop("checked", false))
		});

		$(".mantenimiento_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_mantenimiento");
			var op_mantenimiento = document.getElementById("op_mantenimiento").value;

			if(op_mantenimiento == 0){
				element.classList.add("active");
				 document.getElementById("op_mantenimiento").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_mantenimiento").value = 0;
			}
		});

	// PERMISOS UNIDADES END 
	   	//      GERENCIA DE OPERACIONES

	// PERMISOS CLIENTES  GERENCIA COMERCIAL
		$("#all_clientes_check").click(function(){
		    ($(this).is(":checked") ? $('.all_clientes').prop("checked", true) :    $('.all_clientes').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_cliente').prop("checked", true) :    $('#all_cliente').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_estados').prop("checked", true) :    $('#all_estados').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_municipios').prop("checked", true) :    $('#all_municipios').prop("checked", false));	
		    //segmentos
		    ($(this).is(":checked") ? $('#all_asegmento').prop("checked", true) :    $('#all_asegmento').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_astipovehiculo').prop("checked", true) :    $('#all_astipovehiculo').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_aspuerta').prop("checked", true) :    $('#all_aspuerta').prop("checked", false));	
		    ($(this).is(":checked") ? $('#all_ascarroceria').prop("checked", true) :    $('#all_ascarroceria').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_asnumcilindros').prop("checked", true) :    $('#all_asnumcilindros').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_aspasajeros').prop("checked", true) :    $('#all_aspasajeros').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_motor').prop("checked", true) :    $('#all_motor').prop("checked", false));
		    ($(this).is(":checked") ? $('#all_asespejoslaterales').prop("checked", true) :    $('#all_asespejoslaterales').prop("checked", false));	
		    ($(this).is(":checked") ? $('#all_asaccesorios').prop("checked", true) :    $('#all_asaccesorios').prop("checked", false));	
		    ($(this).is(":checked") ? $('#all_asapotencia').prop("checked", true) :    $('#all_asapotencia').prop("checked", false));	
		    ($(this).is(":checked") ? $('#all_astransmision').prop("checked", true) :    $('#all_astransmision').prop("checked", false));	
		    //Concursos
		    ($(this).is(":checked") ? $('#all_concursos').prop("checked", true) :    $('#all_concursos').prop("checked", false));
		    //Requisiciones
		    ($(this).is(":checked") ? $('#all_cliunidades').prop("checked", true) :    $('#all_cliunidades').prop("checked", false));
		    //Requisiciones
		    ($(this).is(":checked") ? $('#all_requisiciones').prop("checked", true) :    $('#all_requisiciones').prop("checked", false));
		    //Gestor de Documentos
		    ($(this).is(":checked") ? $('#all_gestordoc').prop("checked", true) :    $('#all_gestordoc').prop("checked", false));
		    	
		});

		$("#all_cliente").click(function(){
			($(this).is(":checked") ? $('.clientes_check').prop("checked", true) :    $('.clientes_check').prop("checked", false))
		});

		$(".clientes_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_9");
			var op_cliente = document.getElementById("op_cliente").value;

			if(op_cliente == 0){
				element.classList.add("active");
				 document.getElementById("op_cliente").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_cliente").value = 0;
			}
		});

		$("#all_estados").click(function(){
			($(this).is(":checked") ? $('.estados_check').prop("checked", true) :    $('.estados_check').prop("checked", false))
		});

		$(".estados_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_10");
			var op_estado = document.getElementById("op_estado").value;

			if(op_estado == 0){
				element.classList.add("active");
				 document.getElementById("op_estado").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_estado").value = 0;
			}
		});

		$("#all_municipios").click(function(){
			($(this).is(":checked") ? $('.municipios_check').prop("checked", true) :    $('.municipios_check').prop("checked", false))
		});


		$(".municipios_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_11");
			var op_municipios = document.getElementById("op_municipios").value;

			if(op_municipios == 0){
				element.classList.add("active");
				 document.getElementById("op_municipios").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_municipios").value = 0;
			}
		});
	// SEGMENTOS

		$("#all_asegmento").click(function(){
			($(this).is(":checked") ? $('.asegmento_check').prop("checked", true) :    $('.asegmento_check').prop("checked", false))
		});

		$(".asegmento_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_16");
			var op_asegmento = document.getElementById("op_asegmento").value;

			if(op_asegmento == 0){
				element.classList.add("active");
				 document.getElementById("op_asegmento").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_asegmento").value = 0;
			}
		});


		$("#all_astipovehiculo").click(function(){
			($(this).is(":checked") ? $('.astipovehiculo_check').prop("checked", true) :    $('.astipovehiculo_check').prop("checked", false))
		});

		$(".astipovehiculo_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_17");
			var op_astipovehiculo = document.getElementById("op_astipovehiculo").value;

			if(op_astipovehiculo == 0){
				element.classList.add("active");
				 document.getElementById("op_astipovehiculo").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_astipovehiculo").value = 0;
			}
		});

		$("#all_aspuerta").click(function(){
			($(this).is(":checked") ? $('.aspuerta_check').prop("checked", true) :    $('.aspuerta_check').prop("checked", false))
		});

		$(".aspuerta_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_18");
			var op_aspuerta = document.getElementById("op_aspuerta").value;

			if(op_aspuerta == 0){
				element.classList.add("active");
				 document.getElementById("op_aspuerta").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_aspuerta").value = 0;
			}
		});

		$("#all_ascarroceria").click(function(){
			($(this).is(":checked") ? $('.ascarroceria_check').prop("checked", true) :    $('.ascarroceria_check').prop("checked", false))
		});

		$(".ascarroceria_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_19");
			var op_ascarroceria = document.getElementById("op_ascarroceria").value;

			if(op_ascarroceria == 0){
				element.classList.add("active");
				 document.getElementById("op_ascarroceria").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_ascarroceria").value = 0;
			}
		});

		$("#all_asnumcilindros").click(function(){
			($(this).is(":checked") ? $('.asnumcilindros_check').prop("checked", true) :    $('.asnumcilindros_check').prop("checked", false))
		});

		$(".asnumcilindros_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_20");
			var op_asnumcilindros = document.getElementById("op_asnumcilindros").value;

			if(op_asnumcilindros == 0){
				element.classList.add("active");
				 document.getElementById("op_asnumcilindros").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_asnumcilindros").value = 0;
			}
		});

		$("#all_aspasajeros").click(function(){
			($(this).is(":checked") ? $('.aspasajeros_check').prop("checked", true) :    $('.aspasajeros_check').prop("checked", false))
		});

		$(".aspasajeros_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_21");
			var op_aspasajeros = document.getElementById("op_aspasajeros").value;

			if(op_aspasajeros == 0){
				element.classList.add("active");
				 document.getElementById("op_aspasajeros").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_aspasajeros").value = 0;
			}
		});

		$("#all_motor").click(function(){
			($(this).is(":checked") ? $('.motor_check').prop("checked", true) :    $('.motor_check').prop("checked", false))
		});

		$(".motor_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_22");
			var op_motor = document.getElementById("op_motor").value;

			if(op_motor == 0){
				element.classList.add("active");
				 document.getElementById("op_motor").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_motor").value = 0;
			}
		});

		$("#all_asllantarefaccion").click(function(){
			($(this).is(":checked") ? $('.asllantarefaccion_check').prop("checked", true) :    $('.asllantarefaccion_check').prop("checked", false))
		});

		$(".asllantarefaccion_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_23");
			var op_asllantarefaccion = document.getElementById("op_asllantarefaccion").value;

			if(op_asllantarefaccion == 0){
				element.classList.add("active");
				 document.getElementById("op_asllantarefaccion").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_asllantarefaccion").value = 0;
			}
		});

		$("#all_asespejoslaterales").click(function(){
			($(this).is(":checked") ? $('.asespejoslaterales_check').prop("checked", true) :    $('.asespejoslaterales_check').prop("checked", false))
		});

		$(".asespejoslaterales_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_24");
			var op_asespejoslaterales = document.getElementById("op_asespejoslaterales").value;

			if(op_asespejoslaterales == 0){
				element.classList.add("active");
				 document.getElementById("op_asespejoslaterales").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_asespejoslaterales").value = 0;
			}
		});

		$("#all_asaccesorios").click(function(){
			($(this).is(":checked") ? $('.asaccesorios_check').prop("checked", true) :    $('.asaccesorios_check').prop("checked", false))
		});

		$(".asaccesorios_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_25");
			var op_asaccesorios = document.getElementById("op_asaccesorios").value;

			if(op_asaccesorios == 0){
				element.classList.add("active");
				 document.getElementById("op_asaccesorios").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_asaccesorios").value = 0;
			}
		});

		$("#all_asapotencia").click(function(){
			($(this).is(":checked") ? $('.asapotencia_check').prop("checked", true) :    $('.asapotencia_check').prop("checked", false))
		});

		$(".asapotencia_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_26");
			var op_aspotencia = document.getElementById("op_asapotencia").value;

			if(op_aspotencia == 0){
				element.classList.add("active");
				 document.getElementById("op_asapotencia").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_asapotencia").value = 0;
			}
		});

		$("#all_astransmision").click(function(){
			($(this).is(":checked") ? $('.astransmision_check').prop("checked", true) :    $('.astransmision_check').prop("checked", false))
		});

		$(".astransmision_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_27");
			var op_astransmision = document.getElementById("op_astransmision").value;

			if(op_astransmision == 0){
				element.classList.add("active");
				 document.getElementById("op_astransmision").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_astransmision").value = 0;
			}
		});

		// CONCURSOS
		$("#all_concursos").click(function(){
			($(this).is(":checked") ? $('.concursos_check').prop("checked", true) :    $('.concursos_check').prop("checked", false))
		});

		$(".concursos_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_concursos");
			var op_concursos = document.getElementById("op_concursos").value;

			if(op_concursos == 0){
				element.classList.add("active");
				 document.getElementById("op_concursos").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_concursos").value = 0;
			}
		});

		// Cliente unidades (solo vista)
		$("#all_cliunidades").click(function(){
			($(this).is(":checked") ? $('.cliunidades_check').prop("checked", true) :    $('.cliunidades_check').prop("checked", false))
		});

		$(".cliunidades_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_cliunidades");
			var op_cliunidades = document.getElementById("op_cliunidades").value;

			if(op_cliunidades == 0){
				element.classList.add("active");
				 document.getElementById("op_cliunidades").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_cliunidades").value = 0;
			}
		});

		// Requisiciones
		$("#all_requisiciones").click(function(){
			($(this).is(":checked") ? $('.requisiciones_check').prop("checked", true) :    $('.requisiciones_check').prop("checked", false))
		});

		$(".requisiciones_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_requisiciones");
			var op_requisiciones = document.getElementById("op_requisiciones").value;

			if(op_requisiciones == 0){
				element.classList.add("active");
				 document.getElementById("op_requisiciones").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_requisiciones").value = 0;
			}
		});

		// Gestor Documentos
		$("#all_gestordoc").click(function(){
			($(this).is(":checked") ? $('.gestordoc_check').prop("checked", true) :    $('.gestordoc_check').prop("checked", false))
		});

		$(".gestordoc_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_destordoc");
			var op_gestordoc = document.getElementById("op_gestordoc").value;

			if(op_gestordoc == 0){
				element.classList.add("active");
				 document.getElementById("op_gestordoc").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_gestordoc").value = 0;
			}
		});

// M O D U L O   D E  D I R E C C I O N   A D M I N I S T R A C I O M  D E  C O N T R A T O S
		$('#all_contratos_check').change(function () {
		    ($(this).is(":checked") ? $('.all_contratos').prop("checked", true) :    $('.all_contratos').prop("checked", false));
		});


		$("#all_contratos").click(function(){
			($(this).is(":checked") ? $('.contratos_check').prop("checked", true) :    $('.contratos_check').prop("checked", false))
		});

		$(".contratos_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_contratos");
			var op_contratos = document.getElementById("op_contratos").value;

			if(op_contratos == 0){
				element.classList.add("active");
				 document.getElementById("op_contratos").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_contratos").value = 0;
			}
		});

// M O D U L O   D E  D I R E C C I O N   A D M I N I S T R A C I O M  Y   F I N A N Z A S
		$('#all_finanzas_check').change(function () {
		    ($(this).is(":checked") ? $('.all_finanzas').prop("checked", true) :    $('.all_finanzas').prop("checked", false));
		    ($(this).is(":checked") ? $('.all_ordencompra').prop("checked", true) :    $('.all_ordencompra').prop("checked", false));
		    
		});


		$("#all_finanzas").click(function(){
			($(this).is(":checked") ? $('.finanzas_check').prop("checked", true) :    $('.finanzas_check').prop("checked", false))
		});

		$(".finanzas_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_finanzas");
			var op_finanzas = document.getElementById("op_finanzas").value;

			if(op_finanzas == 0){
				element.classList.add("active");
				 document.getElementById("op_finanzas").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_finanzas").value = 0;
			}
		});


		$("#all_ordencompra").click(function(){
			($(this).is(":checked") ? $('.ordencompra_check').prop("checked", true) :    $('.ordencompra_check').prop("checked", false))
		});

		$(".ordencompra_tab").click(function(){
			var element = document.getElementById("kt_tab_pane_ordencompra");
			var op_ordencompra = document.getElementById("op_ordencompra").value;

			if(op_ordencompra == 0){
				element.classList.add("active");
				 document.getElementById("op_ordencompra").value = 1;
			}else{
				element.classList.remove("active");
				document.getElementById("op_ordencompra").value = 0;
			}
		});