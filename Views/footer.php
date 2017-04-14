<footer id="footer">
<div>
<?php
    echo $footer."\n";
    echo "</div>\n";
if (isset($scripts)) {
    foreach ($scripts as $script){
        echo $script."\n";
    }
}
?>
</footer>
