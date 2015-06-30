<!DOCTYPE html>
<html lang="es">
<title>Login y Registro</title>
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />

<body>


<div class="container">
	<a id="modal_trigger" href="#modal" class="btn">Click Para Ingresar o Registrarte</a>

	<div id="modal" class="popupContainer" style="display:none;">
		<header class="popupHeader">
			<span class="header_title">Login</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>
		
		<section class="popupBody">
			<!-- Social Login -->
			<div class="social_login">
				

				<div class="centeredText">
					<span>Usa tu correo electronico</span>
				</div>

				<div class="action_btns">
					<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
					<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
				</div>
			</div>

			<!-- Username & Password Login form -->
			<div class="user_login">
				<form>
					<label>Email</label>
					<input name="user" type="text" />
					<br />

					<label>Password</label>
					<input name="password" type="password" />
					<br />

					<div class="checkbox">
						<input id="remember" type="checkbox" />
						<label for="remember">Recordar este ordenador</label>
					</div>

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Regresar</a></div>
						<div class="one_half last"><a href="#" id="func_login" type="submit" name="submit" class="btn btn_red">Login</a></div>
					</div>
				</form>

				<a href="#" class="forgot_password">Olvido su contraseña?</a>
			</div>

			<!-- Register Form -->
			<div class="user_register">
				<form>
					<label>Full Name</label>
					<input type="text" />
					<br />

					<label>Correo Electronico</label>
					<input type="email" />
					<br />

					<label>Password</label>
					<input type="password" />
					<br />

					

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Atras</a></div>
						<div class="one_half last"><a href="#" class="btn btn_red">Registrar</a></div>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>

<?php
		if(isset($_POST['submit'])){
			


			
			session_start();
			include_once "conexion.php";

			function verificar_login($user,$password,&$result) {
			    $sql = "SELECT * FROM usuarios WHERE correo = '$user' and pass = '$password'";
			    $rec = mysql_query($sql);
			    $count = 0;

			    while($row = mysql_fetch_object($rec))
			    {
			        $count++;
			        $result = $row;
			    }

			    if($count == 1)
			    {
			        return 1;
			    }

			    else
			    {
			        return 0;
			    }
			}
 //	
//			if(!isset($_SESSION['userid']))
//			{
//			    // if(isset($_POST['login']))
//			    if(isset($_POST['submit']))
//			    {
//			        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
//			        {
//			           	
//
//			            $_SESSION['userid'] = $result->idusuario;
//			            header("location:index.php");
//			        }
//			        else
//			        {
//			            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
//			        }
//			    }
//			
//
//		}else {
//			echo 'Su usuario ingreso correctamente.';
//			echo '<a href="logout.php">Logout</a>';
//		}

			if(!isset($_SESSION['userid']))
			{
			    // if(isset($_POST['login']))
			    if(isset($_POST['submit']))
			    {
			        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
			        {
			           	
			            $_SESSION['userid'] = $result->idusuario;
			            header("location:index2.php");
			        }
			        else
			        {
			            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
			        }
			    }
			

		}else {
			echo 'Su usuario ingreso correctamente.';
			echo '<a href="logout.php">Logout</a>';
		}
	}
	
	?>

<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_open" });

	$(function(){
		// Llamar al formulario de login

		$("#login_form").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Llamando al formulario de registro
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// regresar
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script>

</body>
</html>
