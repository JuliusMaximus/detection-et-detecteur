// Gestion du collapse des bouttons de l'espace membres
$("#btnAssos").click( function () { 
	$("#prospecteur").collapse("hide");
	$("#annonces").collapse("hide");
	$("#meteo").collapse("hide");
	if ($("#assos").collapse("show")) {
		$("#btnAssos").removeAttr("data-target");
	};
});

$('#btnProspecteur').click( function () { 
	$("#assos").collapse("hide");
	$("#annonces").collapse("hide");
	$("#meteo").collapse("hide");
	if ($("#prospecteur").collapse("show")) {
		$("#btnProspecteur").removeAttr("data-target");
	}; 
});

$('#btnAnnonces').click( function () { 
	$("#prospecteur").collapse("hide");
	$("#assos").collapse("hide"); 
	$("#meteo").collapse("hide");
	if ($("#annonces").collapse("show")) {
		$("#btnAnnonces").removeAttr("data-target");
	};
});

$('#btnMeteo').click( function () { 
	$("#prospecteur").collapse("hide");
	$("#assos").collapse("hide");
	$("#annonces").collapse("hide"); 
	if ($("#meteo").collapse("show")) {
		$("#btnMeteo").removeAttr("data-target");
	};
});