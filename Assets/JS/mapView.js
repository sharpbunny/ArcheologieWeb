
window.onload = function() {
var map;
        var latitu=0;
        var longitu=0;
        var touslessites;
        var gauche=1;
       var droite=1;
       var pageencour;
$(function() {
    InitialiserCarte();

     function InitialiserCarte(){

       map = L.map('map').setView([48.866667, 2.333333], 9);
    
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map); 
    }
        L.marker([48.866667, 2.333333]).addTo(map)
            .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
            .openPopup();
});


//Départ de jQuery
jQuery(document).ready(function($){
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
            //alert(errorThrown);
           },
           // s'exécute une fois l'appel AJAX effectué.
           complete : function(json,statut){  
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
                        }
                        
                       if( boolla==true && boollon==true)
                       { 
                         L.marker([lati,longi]).addTo(map);   
                           
                        }                                   
                    }
                 }
                  touslessites=json;
                  remplirladiv(touslessites);               
      }



    function remplirladiv(touslessites){
        var affichparpage=14;
        var nombrePage=touslessites.length / affichparpage;
        var dernierepage=touslessites.length % affichparpage;
        alert(nombrePage);
        alert(dernierepage);
         if(gauche==1)
        {
            $('#gauche').hide();
        }
           if(droite==nombrePage)
        {
            $('#droite').hide();
        }
    for(var i=0;i<affichparpage;i++){
                var obj = touslessites[i];
               
                    for(var key in obj){

                       if(key=="nom_site"){               
                         $("#listDesSites").append(obj[key]+'<br>');
                       }              
                 }     
       }
    }
$('#gauche').click(function(){
gauche++;
pageencour=droite;
droite--;
  var affichparpage=14;
        var nombrePage=touslessites.length / affichparpage;
        var dernierepage=touslessites.length % affichparpage;
        if(gauche==1)
        {
            $('#gauche').hide();
        }
         $("#listDesSites").empty();
for(var i=((affichparpage*pageencour)-affichparpage)-affichparpage;i<(affichparpage*pageencour)-affichparpage;i++){
                var obj = touslessites[i];
               
                    for(var key in obj)
                    { 
                       if(key=="nom_site")
                       {               
                         $("#listDesSites").append(obj[key]+'<br>');
                       }              
                 }     
       }
 $('#droite').show();
//alert(gauche);
return false;
});

$('#droite').click(function(){
droite++;
pageencour=gauche;
gauche--;
var affichparpage=14;
        var nombrePage=touslessites.length / affichparpage;
        var dernierepage=touslessites.length % affichparpage;
          if(droite==parseInt(nombrePage, 10))
        {
            $('#droite').hide();
        }
        $("#listDesSites").empty();
for(var i=(affichparpage*droite)-affichparpage;i<(affichparpage*droite);i++){
                var obj = touslessites[i];
               
                    for(var key in obj)
                    { 
                       if(key=="nom_site")
                       { 
                                         
                         $("#listDesSites").append(obj[key]+'<br>');
                       }              
                 }     
       }
 $('#gauche').show();

//alert(droite);
return false;
});

}//Fin de window.load



