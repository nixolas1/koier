<?php
$db = mysql_connect("localhost","koier","SuperKoie1338!");
if(!$db){
  die('Could not connect: ' . mysql_error());
}
$db_select = mysql_select_db("koier",$db); 
if (!$db_select){
  die ("Could not select the database: <br />". mysql_error());
}
mysql_set_charset('utf8',$db);
?>
