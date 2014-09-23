<?php
	if(array_key_exists("rapport", $_POST))
	{
		$mysqli = new mysqli("localhost", "root", "", "test");
		if($mysqli->connect_errno)
		{
			printf("Connection failed %s\n: " . $mysqli->connect_errno);
			exit();
		}

		$rapport = $mysqli->escape_string($_POST["rapport"]);
		if($mysqli->query("INSERT INTO rapporter (koie, rapport) VALUES (0, '$rapport')"))
		{
			printf("Rapport lagt til i database");
		}
		else
		{
			printf("Error: %s\n", $mysqli->error);
		}

		$mysqli->close();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sending...</title>
		<script language="javascript">
			location.href = "/";
		</script>
	</head>
</html>