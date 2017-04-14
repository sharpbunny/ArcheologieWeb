    <div id="footer">
        <div class="container" >
<?php
    echo $footer."\n";
    echo "        </div>\n";
if (isset($scripts)) {
    foreach ($scripts as $script){
        echo $script."\n";
    }
}
?>
    </div>
