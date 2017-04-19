$(function() {

    var touslessites;
    var latitu = 0;
    var longitu = 0;
    var touslessites;
    var gauche = 1;
    var droite = 1;
    var pageencour;

    InitialiserCarte();

    function InitialiserCarte() {

        var map = L.map('map').setView([48.765, 2.745], 9);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


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
                } else {
                    alert('error');
                };
                touslessites = json;
                remplirladiv(json);
            },
            statusCode: {
                404: function() {
                    alert("404 page not found");
                },
                error: function(json) {
                    alert('error: ' + json);
                }
            }
        });
    }

    function remplirladiv(touslessites) {
        var affichparpage = 14;
        var nombrePage = touslessites.array.length / affichparpage;
        var dernierepage = touslessites.array.length % affichparpage;
        //alert(dernierepage);
        if (gauche == 1) {
            $('#gauche').hide();
        }
        if (droite == nombrePage) {
            $('#droite').hide();
        }
        for (var i = 0; i < affichparpage; i++) {
            var obj = touslessites.array[i];

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
        var nombrePage = touslessites.array.length / affichparpage;
        var dernierepage = touslessites.array.length % affichparpage;
        if (gauche == 1) {
            $('#gauche').hide();
        }
        $("#listDesSites").empty();
        for (var i = ((affichparpage * pageencour) - affichparpage) - affichparpage; i < (affichparpage * pageencour) - affichparpage; i++) {
            var obj = touslessites.array[i];

            for (var key in obj) {
                if (key == "nom_site") {
                    $("#listDesSites").append('<p>' + obj[key] + '</p>');
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
        var nombrePage = touslessites.array.length / affichparpage;
        var dernierepage = touslessites.array.length % affichparpage;
        if (droite == parseInt(nombrePage, 10)) {
            $('#droite').hide();
        }
        $("#listDesSites").empty();
        for (var i = (affichparpage * droite) - affichparpage; i < (affichparpage * droite); i++) {
            var obj = touslessites.array[i];

            for (var key in obj) {
                if (key == "nom_site") {

                    $("#listDesSites").append('<p>' + obj[key] + '</p>');
                }
            }
        }
        $('#gauche').show();

        //alert(droite);
        return false;
    });


    // $("#listDesSites").on("click", "p", function(touslessites) {

    //     var contenu = $(this).attr("TITLE");
    //     //bindPopup('Site de fouille.<br>Ville de ' + obj.nomCommune + '<br><u>Périodes</u>: ' + obj.libellePeriodes + '<br><u>Thèmes</u>: ' + obj.libelleThemes + '<br>Début intervention: ' + obj.date_debut + '<br>Fin  intervention: ' + obj.date_fin + ' < br > < a href = "detail/view/' + obj.ID_site + '" > ' + obj.nom_site + '</a>');
    //     alert(contenu);
    //     for (var i = 0; i < touslessites.array.length; i++) {
    //         var obj = touslessites.array[i];

    //         for (var key in obj) {

    //             if (key == contenu) {
    //                 alert(obj['latitude']);
    //             }
    //         }
    //     }
    // });





});