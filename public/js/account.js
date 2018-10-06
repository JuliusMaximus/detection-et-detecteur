// Gestion du collapse des bouttons de l'espace membres
$("#btnMessages").click( function () { 
	$("#profil").collapse("hide");
	$("#annonces").collapse("hide");
	if ($("#messages").collapse("show")) {
		$("#btnMessages").removeAttr("data-target");
	};
});

$('#btnProfil').click( function () { 
	$("#messages").collapse("hide");
	$("#annonces").collapse("hide");
	if ($("#profil").collapse("show")) {
		$("#btnProfil").removeAttr("data-target");
	}; 
});

$('#btnAnnonces').click( function () { 
	$("#profil").collapse("hide");
	$("#messages").collapse("hide"); 
	if ($("#annonces").collapse("show")) {
		$("#btnAnnonces").removeAttr("data-target");
	};
});

