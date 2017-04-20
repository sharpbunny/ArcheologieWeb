$(function() {

    var latitu = 0;
    var longitu = 0;
    var touslessites;
    var gauche = 1;
    var droite = 1;
    var pageencour;
    var map;

    InitialiserCarte();

    function InitialiserCarte() {
        

        map = L.map('map').setView([48.765, 2.745], 9);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

         L.marker([48.765, 2.745]).addTo(map);

        $.ajax({
           
            url: "map/json",
            type: 'GET',
            cache: false,
            //data:'data'+html,
            dataType: 'json',
            // lorsque l'appel AJAX aura réussi, cette fonction sera automatiquement appelée ;
            // c'est elle que l'on utilise pour mettre à jour notre page !
            // Comme quoi, tout a vraiment été pensé
            success: function(json) {
               
                // the response contains data
                if (json.error === 0) {
                    //extract data from json and pass them to the DOM
                    for (var i = 0; i < json.array.length; i++) {
                        var obj = json.array[i];
                        if (obj.longitude != null && obj.latitude != null) {
                            L.marker([obj.latitude, obj.longitude]).addTo(map)
                                .bindPopup('Site de fouille.<br>Ville de ' + obj.nomCommune + '<br><u>Périodes</u>: ' + obj.libellePeriodes + '<br><u>Thèmes</u>: ' + obj.libelleThemes + '<br>Début intervention: ' + obj.date_debut + '<br>Fin intervention: ' + obj.date_fin + '<br><a href="detail/view/' + obj.ID_site + '">' + obj.nom_site + '</a>');
                        } else {
                            // add to list site without geoloc
                        }

                    }
                    touslessites = json.array;
                } else {
                    alert('error');
                };

                remplirladiv(touslessites);
            },
            statusCode: {
                404: function() {
                    alert("404 page not found");
                },
                error: function(json) {
                    alert();
                    alert('error: ' + json);
                }
            }
        });
    }

    function remplirladiv(touslessites) {
        var affichparpage = 14;
        var nombrePage = touslessites.length / affichparpage;
        var dernierepage = touslessites.length % affichparpage;
        //alert(dernierepage);
        if (gauche == 1) {
            $('#gauche').hide();
        }
        if (droite == nombrePage) {
            $('#droite').hide();
        }
        for (var i = 0; i < affichparpage; i++) {
            var obj = touslessites[i];

            for (var key in obj) {

                if (key == "nom_site") {
                    $("#listDesSites").append('<p TITLE=' + obj['ID_site'] + '>' + obj[key] + '</p>');
                }
            }
        }
    }

    $('#gauche').click(function() {
        gauche++;
        pageencour = droite;
        droite--;
        var affichparpage = 14;
        var nombrePage = touslessites.length / affichparpage;
        var dernierepage = touslessites.length % affichparpage;
        if (gauche == 1) {
            $('#gauche').hide();
        }
        $("#listDesSites").empty();
        for (var i = ((affichparpage * pageencour) - affichparpage) - affichparpage; i < (affichparpage * pageencour) - affichparpage; i++) {
            var obj = touslessites[i];

            for (var key in obj) {
                if (key == "nom_site") {
                    $("#listDesSites").append('<p TITLE=' + obj['ID_site'] + '>' + obj[key] + '</p>');
                }
            }
        }
        $('#droite').show();
        //alert(gauche);
        return false;
    });

    $('#droite').click(function() {
        droite++;
        pageencour = gauche;
        gauche--;
        var affichparpage = 14;
        var nombrePage = touslessites.length / affichparpage;
        var dernierepage = touslessites.length % affichparpage;
        if (droite == parseInt(nombrePage, 10)) {
            $('#droite').hide();
        }
        $("#listDesSites").empty();
        for (var i = (affichparpage * droite) - affichparpage; i < (affichparpage * droite); i++) {
            var obj = touslessites[i];

            for (var key in obj) {
                if (key == "nom_site") {

                    $("#listDesSites").append('<p TITLE=' + obj['ID_site'] + '>' + obj[key] + '</p>');
                }
            }
        }
        $('#gauche').show();

        //alert(droite);
        return false;
    });


    $("#listDesSites").on("click", "p", function() {

        console.log('lut');
        touslessites;
        var contenu = $(this).attr("TITLE");
        for (var i = 0; i < touslessites.length; i++) {
            var obj = touslessites[i];
            //bindPopup('Site de fouille.<br>Ville de ' + obj.nomCommune + '<br><u>Périodes</u>: ' + obj.libellePeriodes + '<br><u>Thèmes</u>: ' + obj.libelleThemes + '<br>Début intervention: ' + obj.date_debut + '<br>Fin  intervention: ' + obj.date_fin + ' < br > < a href = "detail/view/' + obj.ID_site + '" > ' + obj.nom_site + '</a>');
            if (obj.ID_site == contenu) {

                // var latlng = L.latLng(obj.latitude, obj.longitude).bindPopup('' + obj.nom_site + '').openPopup();
                // alert(latlng);
                // // alert(obj.ID_site + ' / ' + obj.nom_site + ' / ' + obj.latitude + ' / ' + obj.longitude);
                // // var marker = new L.Marker([obj.latitude, obj.longitude]);
                // // L.marker([obj.latitude, obj.longitude]).remove(map)
                // // L.marker([obj.latitude, obj.longitude]).addTo(map)
                // // marker.bindPopup('' + obj.nom_site + '').openPopup();

                // // for (var i in marker) {
                // //     alert(i);
                // // }
                // // marker.openPopup();
                // // map.addLayer(marker);
                // //marker.bindPopup('' + obj.nom_site + '').openPopup();
                // //L.marker([obj.latitude, obj.longitude]).remove(map);
                // latlng.bindPopup('' + obj.nom_site + '').openPopup();

                ;
            }
        }

    });

});