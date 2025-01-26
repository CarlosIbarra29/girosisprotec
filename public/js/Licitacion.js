// T I P O   D E   D O C U M E N T O


// L I C I T A C I O N E S
	$(".prioridad").click(function(){
		id = $(this).data('id');

		
		if(id == 1){
			document.getElementById("prioridad_value").value = 1;
			document.getElementById("alta_img").src="/img/correct.png";
			document.getElementById("media_img").src="/img/gris.jpg";
			document.getElementById("baja_img").src="/img/gris.jpg";
		}

		if(id == 2){
			document.getElementById("prioridad_value").value = 2;
			document.getElementById("media_img").src="/img/correct.png";
			document.getElementById("alta_img").src="/img/gris.jpg";
			document.getElementById("baja_img").src="/img/gris.jpg";
		}

		if(id == 3){
			document.getElementById("prioridad_value").value = 3;
			document.getElementById("baja_img").src="/img/correct.png";
			document.getElementById("alta_img").src="/img/gris.jpg";
			document.getElementById("media_img").src="/img/gris.jpg";
		}
	});


	$("#send_licitacion").click(function(){
		var titulo_servicio = document.getElementById("titulo_servicio").value;
		var prioridad_value = document.getElementById("prioridad_value").value;

	    if(titulo_servicio == "" || prioridad_value == 0){
	        swal({
	            title: "Para continuar debes agregar el nombre del titulo del servicio",
	        });
	    }else{
	        swal("Espere un momento, la información esta siendo procesada", {
	            icon: "success",
	            buttons: false,
	        });
	        document.getElementById("submit_licitacion_uno").submit();
	    }		
	});

	$("#send_licitaciondoc").click(function(){
		var id_documento = document.getElementById("id_documento").value;
		var file_key_text = document.getElementById("file_key_text").value;

	    if(id_documento == 0 || file_key_text == ""){
	        swal({
	            title: "Para continuar debes agregar el archivo y tipo de documento",
	        });
	    }else{
	        swal("Espere un momento, la información esta siendo procesada", {
	            icon: "success",
	            buttons: false,
	        });
	        document.getElementById("submit_licitacion_doc").submit();
	    }
	});

	$("#edit_licitacion").click(function(){
		var titulo_servicio_edit = document.getElementById("titulo_servicio_edit").value;
	    if(titulo_servicio_edit == ""){
	        swal({
	            title: "Para continuar debes agregar el nombre del titulo del servicio",
	        });
	    }else{
	        swal("Espere un momento, la información esta siendo procesada", {
	            icon: "success",
	            buttons: false,
	        });
	        document.getElementById("submit_editlicitacion_uno").submit();
	    }	
	});

	$(".eliminar-documento").click(function(){
	    id = $(this).data('id');
	    nombre = $(this).data('nombre');
		
	    swal({
	        title: "Estas seguro de eliminar el documento "+nombre,
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	    })
	    .then((willDelete) => {
	        if (willDelete) {
	        	document.getElementById("id_delete_documento").value = id;
	          	swal("Espere un momento, la información esta siendo procesada", {
	            	icon: "success",
	            	buttons: false,
	          	});

	          	document.getElementById("documento_delete_form").submit();

	        } else {
	        	swal("La accion fue cancelada!");
	        }
	    });
	});
