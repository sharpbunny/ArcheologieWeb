$(function() {

    InitialiserCarte();

    function InitialiserCarte() {

        var map = L.map('map').setView([43.565, 3.845], 14);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        L.marker([43.565, 3.845]).addTo(map)
            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
            .openPopup();

    }

});