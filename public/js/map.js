// Code pour la carte Leaflet.js
var map = L.map('map', {scrollWheelZoom: false}).setView([43.69052, 3.87072], 17);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 18,
attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var marker = L.marker([43.69052, 3.87072]).addTo(map);

//On donne les coordonnées et la forme
// var polygon = L.polygon([
//     [48.551411850277134,7.740937248448404],
//     [48.548952213518675,7.738328376287058],
//     [48.5475740669051,7.7476307184389555],
//     [48.551411850277134,7.740937248448404]
//On ajoute a la map
// ]).addTo(map);

//On donne les coordonnées et la forme
// var circle = L.circle([43.69052, 3.87072], {
//     color: 'red',
//     fillColor: '#f03',
//     fillOpacity: 0.5,
//     radius: 120
//On ajoute a la map
// }).addTo(map);

//openPopup pour afficher au chargement
marker.bindPopup("<b>Le Cercle des Mamans").openPopup();
// circle.bindPopup("I am a circle.");
// polygon.bindPopup("I am a polygon.");

//Pour afficher un pop up indépendament des éléments plus haut et ajuste la map selon l'endroit du clic
var popup = L.popup();

function onMapClick(e) {
popup
    .setLatLng(e.latlng)
    .setContent("You clicked the map at " + e.latlng.toString())
    .openOn(map);
}

map.on('click', onMapClick);

// Pour le bouton envoyer de contact
document.querySelector('.bt').addEventListener('click', function() {
this.classList.remove('clicked');
// setTimeout pour garantir que la suppression de la classe et 
// son ajout sont effectués dans deux cycles d'événements séparés.(fonctionne pas sans)
setTimeout(() => {
    this.classList.toggle('clicked');
}, 0);
});