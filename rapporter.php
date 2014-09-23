<?php
require_once("db.php");
require_once("logged_in.php");
$td="</td><td>";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("header.php"); ?>
        <title>Rapportoversikt</title>
    </head>
    <body>
            <div class="topbar">Oversikt over alle rapporter</div>
             <ul class="navbar">
                <?php include("navbar.php"); ?>
            </ul>
            
            <div class="container">
                 <table class="table table-striped">
                    <thead><td>ID</td><td>Koie</td><td>Epost</td><td>Ved</td><td>Gjenglemt</td><td>Skader</td><td>Dato</td></thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM `rapport` LIMIT 0 , 30";
                        $res = mysql_query($query);
                        while($r = mysql_fetch_array($res, MYSQL_ASSOC)){
                            $email="<a href='mailto:".$r['epost']."'>".$r['epost']."</a>";
                            print("<tr><td>".$r['id'].$td.$r["koie_id"].$td.$email.$td.$r['ved']);
                            print($td.$r['gjenglemt'].$td.$r['skader'].$td.$r['dato'].$td."</tr>");
                        }
                    ?>
                    </tbody>
                    </table>
            </div>
 
    </body>
</html>
