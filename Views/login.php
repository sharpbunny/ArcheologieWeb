<form id="formLogin" action="./index.php" method="POST">
    <input id="pseudoLogin" type="text" name="pseudoLogin" placeholder="Identifiant"> <br>
    <input id="passwordLogin" type="password" name="passwordLogin" placeholder="Mot de Passe"> <br>
    <input id="validerLogin" type="submit" name="validerLogin" value="Se connecter"> <br>
</form>
<?php
if (isset($_GET["error_login"]))
{
    $displayErrorMessage = "";
    if ($_GET["error_login"] == "badlogin")
    {
        $displayErrorMessage = "Mauvais login ou password, veuillez réessayer.";
    }
    else
    {
        $displayErrorMessage = "Erreur sur le login inconnue.";
    }
    echo "<p>$displayErrorMessage</p>";
}