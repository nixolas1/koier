<?php 

if(isset($_POST["username"])){
    $user=$_POST["username"];
    $pass=sha1($_POST["password"]);
    if($user=="admin" && $pass=="3fb25fd34450023519526097fa43b429102bc577"){
        session_start(); 
        $_SESSION['loggedin']=1;
        header("location: koie.php");
    }else{
        //echo("user: ".$_POST["username"]." pass:".sha1($_POST["password"]));
    }
}
else if(isset($_GET["logout"])){
    session_start(); 
    session_destroy(); 
}


?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("header.php"); ?>
        <title>Koier</title>
    </head>
    <body>
            <div class="topbar">Koier Admin Login</div>
            
            <div class="container">
            	<center>
                	<form action = "index.php" method = "post" class="login">
                		<?php if(isset($_POST["username"])){
                            echo('<div class="alert alert-danger" role="alert">Feil brukernavn eller passord. Prøv igjen!</div>');
                        }
                        ?>
                         <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" id="password"name="password" placeholder="Password">
                          </div>
						<input type="submit" value="Login" class="btn btn-primary">
					</form>
            	</center>
            </div>
    </body>
</html>
