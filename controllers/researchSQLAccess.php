<?php
$searchRequest = mysql_query("SELECT * FROM tableSiteIntervention WHERE nom LIKE '%$research%'ORDER BY nom") or die(mysql_error());
$verification = mysql_num_rows($searchRequest);

if($verification != 0){
    
}

?>