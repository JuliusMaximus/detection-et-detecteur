//---------------------MAP----------------------

var map = document.querySelector('#map');

var paths = map.querySelectorAll(".map__image a");

var links = map.querySelectorAll(".map__list a");

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