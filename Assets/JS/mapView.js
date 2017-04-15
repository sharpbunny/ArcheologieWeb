window.onload = function() {


    InitialiserCarte();

     function InitialiserCarte() {

        var map = L.map('map').setView([48.866667, 2.333333], 13);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        L.marker([48.866667, 2.333333]).addTo(map)
            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
            .openPopup();

    }

//Départ de jQuery
jQuery(document).ready(function($) {
   // Votre code ici avec les appels à la fonction $()


  // $('#activerpointeur').click(function()
  // {
      
       //page=$(this).attr("href");
       
       $.ajax({

           url:"./Controllers/ajoutMarqueur.php",
           type:'GET',
           cache:false,
           //data:'data'+html,
            dataType:'json',
           // lorsque l'appel AJAX aura réussi, cette fonction est automatiquement appelée ;
           // c'est elle que l'on utilise pour mettre à jour notre page !
           // Comme quoi, tout à vraiment été pensé
           success : function(json){
                var lati;
                var longi;
                var boolla=false;
                var boollon=false;    
        
               for(var i=0;i<json.length;i++) {
                var obj = json[i];
               
                for(var key in obj){
                    if(key=="latitude")
                    {
                        lati =obj[key];
                        boolla=true;
                       // alert(lati);
                    }
                    if(key=="longitude")
                    {
                         longi=obj[key];
                         boollon=true;
                         //alert(longi);
                    }
                    if( boolla==true && boollon==true){    
                        alert(lati + longi);
                        L.marker([lati,longi]).addTo(map);
                    }
                                       
                        }
                 }  
           
           // $(html).appendTo("#gauche"); // On passe code_html à jQuery() qui va nous créer l'arbre DOM !
           },
           //paramètre exécuté une fonction si l'appel AJAX a échoué.
           error:function(XMLHttpRequest,textStatus,errorThrown){
            alert(errorThrown);
           },
           // s'exécute une fois l'appel AJAX effectué.
           complete : function(resultat,statut){

           }
        
       });
       return false;
    // $.get(

    // 'mapController.php', // Le fichier cible côté serveur.

    // 'false', // Nous utilisons false, pour dire que nous n'envoyons pas de données.

    // 'getsiteintervention', // Nous renseignons uniquement le nom de la fonction de retour.

    // 'array' // Format des données reçues.

    //     );


    //     function getsiteintervention(array){  
    //         alert("salut");         
    //         // Du code pour gérer le retour de l'appel AJAX.
    //         $("#gauche").addTo('array');
    //     }
  // }
  // );


});//Fin de jQuery

}//Fin de window.load