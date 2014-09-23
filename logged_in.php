<?php
session_start();
if($_SESSION['loggedin'] != 1){
    header("location:index.php");
}
?>