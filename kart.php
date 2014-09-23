<?php
//require_once("db.php");
require_once("logged_in.php");

$koie_id=0;
if(isset($_GET['id'])){
    $koie_id = htmlspecialchars($_GET['id']);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("header.php"); ?>
        <title>Koier</title>    
    </head>
    <body style="background-color:#F5F5F5;">
            <div class="topbar">Koier</div>
             <ul class="navbar kart_navbar">
                <?php include("navbar.php"); ?>
            </ul>

          <div id="map_canvas"></div>

          <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
          <script src="static/js/kart.js"></script>
    </body>
</html>
