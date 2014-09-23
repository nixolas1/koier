<?php

require_once("db.php");
require_once("logged_in.php");

$koie_id=0;
if(isset($_GET['id']) && is_numeric($_GET["id"])) $koie_id = htmlspecialchars($_GET['id']);
$td="</td><td>";

$query = "SELECT * FROM `koie` WHERE `id` =$koie_id LIMIT 0 , 30";
$koier = mysql_query($query);
$row = mysql_fetch_array($koier, MYSQL_ASSOC);
$name = $row['name'];

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("header.php"); ?>
        <title>Koie: <?php echo($name);?></title>
       
        
    </head>
    <body>
            <div class="topbar"><?php echo($name);?> Koieoversikt</div>
             <ul class="navbar">
                <?php include("navbar.php"); ?>
            </ul>
            
            <div class="container">
                <div class="panel panel-default">
                  <div class="panel-heading"><h3 class="panel-title">Reservasjoner</h3></div>
                    <table class="table table-striped">
                        <thead><td>ID</td><td>Epost</td><td>Fra</td><td>Til</td></thead>
                        <tbody>
                        <?php
                            $query = "SELECT * FROM `reservation` WHERE `koie_id` =$koie_id LIMIT 0 , 30";
                            $res = mysql_query($query);
                            while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
                                $index = $row['id'];
                                $epost="<a href='mailto:".$row['epost']."'>".$row['epost']."</a>";
                                $fra = $row['dato_fra'];
                                $til = $row['dato_til'];
                                print("<tr><td>".$index.$td.$epost.$td.$fra.$td.$til.$td."</tr>");
                            }
                        ?>
                        </tbody>
                        </table>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading"><h3 class="panel-title">Utstyr</h3></div>
                  <div class="panel-body">
                   <?php
                            $query = "SELECT * FROM `utstyr` WHERE `koie_id` =$koie_id";
                            $res = mysql_query($query);
                            $b=' <a class="butt" href="#" title="Sett som fraktet"><span class="glyphicon glyphicon-ok"></span></a>';
                            $bx=' <a class="butt" href="#" title="Sett som ikke fraktet"><span class="glyphicon glyphicon-remove"></span></a>';
                            $ufrakt=array();
                            print("<b>Fraktet: </b>");
                            while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
                                if($row['fraktet']==1){
                                   $navn = $row['navn'];
                                    print($navn.$bx);
                                }
                                else{
                                    $ufrakt[] = array($row["id"],$row["navn"]);
                                }
                            }
                            print("<hr><b>Ikke fraktet: </b> ");
                            foreach($ufrakt as $thing){
                                    $navn = $thing[1];
                                    print($navn.$b);
                            }
                            //INSERT INTO `koier`.`utstyr` (`id`, `koie_id`, `navn`, `fraktet`) VALUES ('1', '0', 'Kost', '1');
                        ?>
                        <hr>
                        <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            </button>
                          </span>
                          <input type="text" class="form-control">
                        </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading"><h3 class="panel-title">Vedstatus</h3></div>
                  <div class="panel-body">
                    <?php
                        $query = "SELECT * FROM `rapport` WHERE `koie_id` =$koie_id ORDER BY id DESC LIMIT 1";
                        $res = mysql_query($query);
                        $r = mysql_fetch_array($res, MYSQL_ASSOC);
                        print($r['ved']);
                        //$per = int()
                    ?>
                    Vedkubber
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            60%
                        </div>
                    </div>
                  </div>
                </div>
               
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Rapporter</h3>
                  </div>
                     <table class="table table-striped">
                    <thead><td>ID</td><td>Epost</td><td>Ved</td><td>Gjenglemt</td><td>Skader</td><td>Dato</td></thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM `rapport` WHERE `koie_id` =$koie_id LIMIT 0 , 30";
                        $res = mysql_query($query);
                        while($r = mysql_fetch_array($res, MYSQL_ASSOC)){
                            $email="<a href='mailto:".$r['epost']."'>".$r['epost']."</a>";
        print("<tr><td>".$r['id'].$td.$email.$td.$r['ved'].$td.$r['gjenglemt'].$td.$r['skader'].$td.$r['dato'].$td."</tr>");
                        }
                    ?>
                    </tbody>
                    </table>
                </div>  
            </div>
    </body>
</html>
<?php mysql_close($db); ?>