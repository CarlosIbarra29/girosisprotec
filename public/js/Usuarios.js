	$(".kdatatable_usuario").DataTable({
		language: {
		    'lengthMenu': 'Display _MENU_',
		    "url": $('#datatable_i18n').val()
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

//  C R U D   U S E R
	// $("#send_user").click(function(){
	//     var name_user = document.getElementById("name_user").value;
	//     var email_user = document.getElementById("email_user").value;
	//     var rol = document.getElementById("rol").value;
	//     var password = document.getElementById("password").value;
	    

	//     if(name_user == "" || email_user == "" || rol == 0 || password == ""){
	//         swal({
	//             title: "Para continuar debes agregar los datos solicitados",
	//         });
	//     }else{
	//         swal("Espere un momento, la información esta siendo procesada", {
	//             icon: "success",
	//             buttons: false,
	//         });
	//         document.getElementById("submit_user").submit();
	//     }
	// });


	// $("#send_user_edit").click(function(){
	//     var name_user = document.getElementById("name_user_edit").value;
	//     var email_user = document.getElementById("email_user_edit").value;
	//     var rol = document.getElementById("rol_edit").value;
	    

	//     if(name_user == "" || email_user == "" || rol == 0){
	//         swal({
	//             title: "Para continuar debes agregar los datos solicitados",
	//         });
	//     }else{
	//         swal("Espere un momento, la información esta siendo procesada", {
	//             icon: "success",
	//             buttons: false,
	//         });
	//         document.getElementById("submit_user_edit").submit();
	//     }
	// });

	// $(".desactivar-usuario").click(function(){
	//     var id = $(this).data('id');
	//     var nombre = $(this).data('nombre');

	//     swal({
	//         title: "Estas seguro de desactivar el registro "+nombre,
	//         icon: "warning",
	//         buttons: true,
	//         dangerMode: true,
	//     })
	//     .then((willDelete) => {
	//         if (willDelete) {
	//         	document.getElementById("id_user_desc").value = id;
	//           	swal("Espere un momento, la información esta siendo procesada", {
	//             	icon: "success",
	//             	buttons: false,
	//           	});

	//           	document.getElementById("user_delete_form").submit();

	//         } else {
	//         	swal("La accion fue cancelada!");
	//         }
	//     });
	// });

	// $(".activar-usuario").click(function(){
	//     var id = $(this).data('id');
	//     var nombre = $(this).data('nombre');

	//     swal({
	//         title: "Estas seguro de desactivar el registro "+nombre,
	//         icon: "warning",
	//         buttons: true,
	//         dangerMode: true,
	//     })
	//     .then((willDelete) => {
	//         if (willDelete) {
	//         	document.getElementById("id_user_act").value = id;
	//           	swal("Espere un momento, la información esta siendo procesada", {
	//             	icon: "success",
	//             	buttons: false,
	//           	});

	//           	document.getElementById("user_act_form").submit();

	//         } else {
	//         	swal("La accion fue cancelada!");
	//         }
	//     });
	// });

//  C R U D   R O L

	$(".edit_rol").click(function(){
	    var id = $(this).data('id');
	    var nombre = $(this).data('nombre');

	    document.getElementById("id_rol").value = id;
	    document.getElementById("name_rol_edit").value = nombre;
	});

	$("#edit_rol_submit").click(function(){
	    var name_rol_edit = document.getElementById("name_rol_edit").value;
	    if(name_rol_edit == ""){
	        swal({
	            title: "Para continuar debes agregar el nombre del rol",
	        });
	    }else{
	        swal("Espere un momento, la información esta siendo procesada", {
	            icon: "success",
	            buttons: false,
	        });
	        document.getElementById("submit_rol_edit").submit();
	    }
	});

	$(".desactivar-rol").click(function(){
	    var id = $(this).data('id');
	    var nombre = $(this).data('nombre');

	    swal({
	        title: "Estas seguro de desactivar el registro "+nombre,
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	    })
	    .then((willDelete) => {
	        if (willDelete) {
	        	document.getElementById("id_rol_des").value = id;
	          	swal("Espere un momento, la información esta siendo procesada", {
	            	icon: "success",
	            	buttons: false,
	          	});

	          	document.getElementById("rol_delete_form").submit();

	        } else {
	        	swal("La accion fue cancelada!");
	        }
	    });
	});

	$(".activar-rol").click(function(){
	    var id = $(this).data('id');
	    var nombre = $(this).data('nombre');

	    swal({
	        title: "Estas seguro de desactivar el registro "+nombre,
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	    })
	    .then((willDelete) => {
	        if (willDelete) {
	        	document.getElementById("id_rol_act").value = id;
	          	swal("Espere un momento, la información esta siendo procesada", {
	            	icon: "success",
	            	buttons: false,
	          	});

	          	document.getElementById("rol_act_form").submit();

	        } else {
	        	swal("La accion fue cancelada!");
	        }
	    });
	});

