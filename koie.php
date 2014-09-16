<?php

$db = mysql_connect("localhost","koier","SuperKoie1338!");
$db_select = mysql_select_db("koier",$db); 
if (!$db_select){
  die ("Could not select the database: <br />". mysql_error());
}

session_start();
if($_SESSION['loggedin'] != 1){
    header("location:index.php");
}

$koie_id=0;
if(isset($_GET['id'])){
    $koie_id = htmlspecialchars($_GET['id']);
}


?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("header.php"); ?>
        <title>Koie: Bymarka</title>
    </head>
    <body>
            <div class="topbar">Bymarka Koieoversikt</div>
             <ul class="navbar">
                <?php include("navbar.php"); ?>
            </ul>
            
            <div class="container">
                <h3>Reservasjoner</h3>
                <div>ting</div>
                <h3>Manglende utstyr</h3>
                <div>ting</div>
                <h3>Vedstatus</h3>
                <div>ting</div>
                <h3>Rapporter</h3>
                <div>ting</div>
            </div>
    </body>
</html>
