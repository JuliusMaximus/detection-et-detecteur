
//---------------------MAP----------------------

var map = document.querySelector('#map');

var paths = map.querySelectorAll(".map__image a");

var links = map.querySelectorAll(".map__list a");

var li = map.querySelectorAll(".map__list li");

// Polyfill du foreach
if (NodeList.prototype.forEach === undefined) {
	NodeList.prototype.forEach = function (callback) {
		[].forEach.call(this, callback)
	};
};
/*Ajoute la class is-active au passage de la souris
et la supprime ensuite pour ne pas que les éléments
reste colorés */
var activeArea = function (id) {
	map.querySelectorAll('.is-active').forEach(function(item) {
		item.classList.remove('is-active');
	});

	if (id !== undefined) {
		document.querySelector('#list-' + id).classList.add('is-active');
		document.querySelector('#li-' + id).classList.add('is-active');
		document.querySelector('#FR-' + id).classList.add('is-active');
	};
};
// Sur la carte
paths.forEach(function (path) {
	path.addEventListener('mouseenter', function () {
		var id = this.id.replace('FR-', '');
		activeArea(id);
	});
});
// sur la liste
links.forEach(function (link) {
	link.addEventListener('mouseenter', function () {
		var id = this.id.replace('list-', '');
		activeArea(id);
	});
});

/*supprime la coloration en sortant du path
grace à la condition dans la function activeArea */
map.addEventListener('mouseover', function() {
	activeArea();
});




// au clic sur un lien avec une ancre on applique un effet smooth scroll

$('a[href^="#"]').on('click', function(evt){
 // bloque le comportement par défaut
 evt.preventDefault(); 
 // enregistre la valeur de l'attribut  href dans la variable target
var target = $(this).attr('href');
 /* le sélecteur $(html, body) permet de corriger un bug sur chrome 
 et safari (webkit) */
$('html, body')
 // on arrête toutes les animations en cours 
 .stop()
 /* on fait maintenant l'animation vers le haut (scrollTop) vers 
  notre ancre target */
 .animate({scrollTop: $(target).offset().top}, 2000 );
});