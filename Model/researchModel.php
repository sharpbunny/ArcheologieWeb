<?php
include('..\Model\Connector.php');
if(isset($_POST['researchField'])&& $_POST['researchField']!= NULL){
mysql_connect('localhost','root','');
mysql_select_db('interventionBDD');


$searchRequest = mysql_query("SELECT * FROM site_intervention WHERE nom LIKE '%$researchField%'ORDER BY nom") or die(mysql_error());
$verification = mysql_num_rows($searchRequest);






if($verification != 0){
    
}

?>