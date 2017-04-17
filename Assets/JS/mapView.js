$(function() {

    InitialiserCarte();

    function InitialiserCarte() {

        var map = L.map('map').setView([48.765, 2.745], 9);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        $.ajax({

            url:"map/json",
            type:'GET',
            cache:false,
            //data:'data'+html,
            dataType:'json',
            // lorsque l'appel AJAX aura réussi, cette fonction est automatiquement appelée ;
            // c'est elle que l'on utilise pour mettre à jour notre page !
            // Comme quoi, tout à vraiment été pensé
            success : function(json)
            {

                if(json.error === 0)                         // the response contains data
                {
                    //extract data from json and pass them to the DOM
                    for (var i=0; i<json.array.length; i++)
                    {
                        var obj = json.array[i];
                        if (obj.longitude!=null && obj.latitude!=null) {
                            L.marker([obj.latitude, obj.longitude]).addTo(map)
                                .bindPopup('Site de fouille.<br>Ville de '+obj.nomCommune+'<br>Périodes: '+obj.libellePeriodes+'<br>Début intervention: '+obj.date_debut+'<br>Fin intervention: '+obj.date_fin+'<br><a href="detail/view/'+obj.ID_site+'">'+obj.nom_site+'</a>');
                        } else {
                            // add to list site without geoloc
                        }
                    }
                }
                else
                {
                    alert('error');
                }
            },
            statusCode: {
                404: function() {
                    alert( "404 page not found" );
                },
                error: function(json) {
                    alert('error +: ' + json);
                }
            }
        });
    }
});


