
window.onload = function(){

    function afficherlacarte(){
    var OpenStreetMap_France = L.tileLayer('http://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        maxZoom: 20,
        attribution: '&copy; Openstreetmap France | &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });
}
document.getElementById('map').innerHTML=InitialiserCarte();

function InitialiserCarte() {
    
var map = L.map('map').setView([45.7531152, 4.827906], 17);
// create the tile layer with correct attribution
var tuileUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png';

var attrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';

L.TileLayer(tuileUrl, {minZoom: 8, maxZoom: 18, attribution: attrib}).addTo(map);


}





}