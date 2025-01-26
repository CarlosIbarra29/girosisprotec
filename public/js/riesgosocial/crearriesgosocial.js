$("#btn_riesgo_social").click(function(){
	$(".div_riesgos_sociales").show();
	$(".div_riesgos_tecnologicos").hide();
	$(".div_riesgos_naturales").hide();
	$(".div_riesgos_otros").hide();
});

$("#btn_riesgo_tecnologico").click(function(){
	$(".div_riesgos_sociales").hide();
	$(".div_riesgos_tecnologicos").show();
	$(".div_riesgos_naturales").hide();
	$(".div_riesgos_otros").hide();
});

$("#btn_riesgo_natural").click(function(){
	$(".div_riesgos_sociales").hide();
	$(".div_riesgos_tecnologicos").hide();
	$(".div_riesgos_naturales").show();
	$(".div_riesgos_otros").hide();
});


$("#btn_riesgo_otro").click(function(){
	$(".div_riesgos_sociales").hide();
	$(".div_riesgos_tecnologicos").hide();
	$(".div_riesgos_naturales").hide();
	$(".div_riesgos_otros").show();
});