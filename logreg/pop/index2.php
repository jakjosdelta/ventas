<!DOCTYPE html>
<?php
session_start();

?>
<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="estilos/estilos3.css">
	<title>Ingenieria web 2015</title>
</head>
<body>
	<br>
	<center><div class="tit"><h2>Logueado</h2></div>
	<?php
echo "Nombre del usuario Logeado: ".$_SESSION['user'];

?>
	
</body>
</html>