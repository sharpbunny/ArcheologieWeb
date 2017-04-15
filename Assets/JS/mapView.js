window.onload = function() {
var map;
        var latitu=0;
        var longitu=0;
    InitialiserCarte();

     function InitialiserCarte(){

       map = L.map('map').setView([48.866667, 2.333333], 9);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
     
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
              ajoutdesmarqueur(json);                 
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
 
});//Fin de jQuery

 function ajoutdesmarqueur(json){
        
         var boolla=false;
                var boollon=false;  
            for(var i=0;i<json.length;i++) {
                var obj = json[i];
               
                    for(var key in obj){
                        if(key=="latitude")
                        {
                            lati =obj[key];
                            boolla=true;                       
                        }
                        if(key=="longitude")
                        {
                            longi=obj[key];
                            boollon=true;
                            //alert(longi);
                        }
                        
                       if( boolla==true && boollon==true)
                       { 
                         L.marker([lati,longi]).addTo(map);   
                           
                        }                                   
                    }
                 }  
        
      }

}//Fin de window.load