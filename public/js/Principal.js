"use strict";
var Principal = (function () {
    var routeName = $("#routeName").val();

    var showTititleWhenScroll = function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $("#scroll_title").fadeIn();
            } else {
                $("#scroll_title").fadeOut();
            }
        });
    };

    var sidebarToggleActiveMenu = function () {
        //tablero
        if (routeName != "tablero.show") {
            $("#menuHome").removeClass("menu-item-active");
        }


        //activar menu de Administracion
        function activeMenuAdministracion() {
            $("#menuAdministracion").addClass("menu-item-active");
            $("#menuAdministracion").addClass("menu-item-open");
        }

        //rutas para el menu de usuarios
        if (routeName.includes("user")) {
            activeMenuAdministracion();
            //we addd the active class to the menuUsuarios parent item
            $("#menuUsuarios").addClass("menu-item-active");
            $("#menuUsuarios").addClass("menu-item-open");

            switch (routeName) {
                case "user.catalogousuarios":
                    //we add the class 'menu-item-open' to id menuListadoUsuarios
                    $("#menuListadoUsuarios").addClass("menu-item-open");
                    break;
                case "user.agregarusuario":
                    $("#menuNuevoUsuario").addClass("menu-item-open");
                    break;
            }
        }

        if (routeName.includes("rol")) {
            activeMenuAdministracion();
            $("#menuRoles").addClass("menu-item-active");
            $("#menuRoles").addClass("menu-item-open");
            switch (routeName) {
                case "rol.catalogoroles":
                    $("#menuListadoRoles").addClass("menu-item-open");
                    break;
                case "rol.agregarrol":
                    $("#menuNuevoRol").addClass("menu-item-open");
                    break;
            }
        }


        //activar menu de Libro de Riesgos
        function activeMenuLibro() {
            $("#menuLibro").addClass("menu-item-active");
            $("#menuLibro").addClass("menu-item-open");
        }

        //rutas para el menu de clientes
        if (routeName.includes("libro")) {
            activeMenuLibro();
            //we addd the active class to the menuUsuarios parent item
            $("#menuRiesgos").addClass("menu-item-active");
            $("#menuRiesgos").addClass("menu-item-open");

            switch (routeName) {
                case "libro.listadolibroriesgos":
                    $("#menuListadoRiesgos").addClass("menu-item-open");
                    break;
                case "libro.riesgosocialid":
                    $("#menuListadoRiesgos").addClass("menu-item-open");
                    break;
                case "libro.crearriesgosocial":
                    $("#menuListadoRiesgos").addClass("menu-item-open");
                    break;
                case "libro.editarriesgosocial":
                    $("#menuListadoRiesgos").addClass("menu-item-open");
                    break;
                case "libro.riesgosocialidinactivos":
                    $("#menuListadoRiesgos").addClass("menu-item-open");
                    break;

            }
        }


        //rutas para el menu de clientes
        if (routeName.includes("librotec")) {
            activeMenuLibro();
            //we addd the active class to the menuUsuarios parent item
            $("#menuRiesgos").addClass("menu-item-active");
            $("#menuRiesgos").addClass("menu-item-open");

            switch (routeName) {
                case "librotec.listadolibroriesgostec":
                    $("#menuListadoRiesgosTecnologicos").addClass("menu-item-open");
                    break;
                case "librotec.riesgotecnologicoid":
                    $("#menuListadoRiesgosTecnologicos").addClass("menu-item-open");
                    break;
                case "librotec.crearriesgotec":
                    $("#menuListadoRiesgosTecnologicos").addClass("menu-item-open");
                    break;  
                case "librotec.editarriesgotecnologico":
                    $("#menuListadoRiesgosTecnologicos").addClass("menu-item-open");
                    break; 
                case "librotec.riesgotecnologicoidinactivos":
                    $("#menuListadoRiesgosTecnologicos").addClass("menu-item-open");
                    break;  
                          
            }
        }

        if (routeName.includes("libronat")) {
            activeMenuLibro();
            //we addd the active class to the menuUsuarios parent item
            $("#menuRiesgos").addClass("menu-item-active");
            $("#menuRiesgos").addClass("menu-item-open");

            switch (routeName) {
                case "libronat.listadolibroriesgosnat":
                    $("#menuListadoRiesgosNaturales").addClass("menu-item-open");
                    break;
                 case "libronat.riesgonaturalid":
                    $("#menuListadoRiesgosNaturales").addClass("menu-item-open");
                    break;
                 case "libronat.crearriesgonat":
                    $("#menuListadoRiesgosNaturales").addClass("menu-item-open");
                    break;
                 case "libronat.editarriesgonaturales":
                    $("#menuListadoRiesgosNaturales").addClass("menu-item-open");
                    break;
                 case "libronat.riesgonaturalidinactivos  ":
                    $("#menuListadoRiesgosNaturales").addClass("menu-item-open");
                    break;         
            }
        }

        if (routeName.includes("librootr")) {
            activeMenuLibro();
            //we addd the active class to the menuUsuarios parent item
            $("#menuRiesgos").addClass("menu-item-active");
            $("#menuRiesgos").addClass("menu-item-open");

            switch (routeName) {
                case "librootr.listadolibroriesgosotros":
                    $("#menuListadoRiesgosOtros").addClass("menu-item-open");
                    break;
                case "librootr.riesgootroid":
                    $("#menuListadoRiesgosOtros").addClass("menu-item-open");
                    break;
                case "librootr.crearriesgootro":
                    $("#menuListadoRiesgosOtros").addClass("menu-item-open");
                    break;
                case "librootr.editarriesgootro":
                    $("#menuListadoRiesgosOtros").addClass("menu-item-open");
                    break;
                case "librootr.riesgootrosidinactivos":
                    $("#menuListadoRiesgosOtros").addClass("menu-item-open");
                    break;
                case "librootr.listadonuevosriesgos":
                    $("#menuListadoRiesgosOtros").addClass("menu-item-open");
                    break;
                
            }
        }



        function activeMenuHdNivControl() {
            $("#menuHd").addClass("menu-item-active");
            $("#menuHd").addClass("menu-item-open");
        }

        //rutas para el menu de clientes
        if (routeName.includes("hd")) {
            activeMenuHdNivControl();
            //we addd the active class to the menuUsuarios parent item
            $("#menuNivelcontrol").addClass("menu-item-active");
            $("#menuNivelcontrol").addClass("menu-item-open");

            switch (routeName) {
                case "hd.catalogonivelcontrol":
                    $("#menuListadoNivelcontrol").addClass("menu-item-open");
                    break;
            }
        }

        //activar menu de CATALOGOS
        function activeMenuCatalogos() {
            $("#menuCatalogos").addClass("menu-item-active");
            $("#menuCatalogos").addClass("menu-item-open");
        }

        //rutas para el menu de clientes
        if (routeName.includes("area")) {
            activeMenuCatalogos();
            //we addd the active class to the menuUsuarios parent item
            $("#menuCatalogoArePersonal").addClass("menu-item-active");
            $("#menuCatalogoArePersonal").addClass("menu-item-open");

            switch (routeName) {
                case "area.listadoarea":
                    //we add the class 'menu-item-open' to id menuListadoUsuarios
                    $("#menuListadoareapersonal").addClass("menu-item-open");
                    break;
            }
        }


    };

    return {
        //main function to initiate the module
        init: function () {
            sidebarToggleActiveMenu();
            showTititleWhenScroll();
        },
    };
})();

jQuery(document).ready(function () {
    Principal.init();
});
