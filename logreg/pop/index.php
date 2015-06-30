<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/style2.css"/>
<title>Login Modal Dialog Window with CSS and jQuery</title>
<script type="text/javascript" src="css/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(600);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});
</script>
<link rel="canonical" href="http://www.alessioatzeni.com/wp-content/tutorials/jquery/login-box-modal-dialog-window/index.html" />
</head>
<body>
<h1>Login CSS jQuery<small><a href="http://www.alessioatzeni.com/blog/login-box-modal-dialog-window-with-css-and-jquery/">Tutorial</a></small></h1>
<div class="container">
	<div id="content">
    
		<div class="post">
    	<h2>Login</h2>
        	<div class="btn-sign">
				<a href="#login-box" class="login-window">Login / Sign In</a>
        	</div>
		</div>
        
        <div id="login-box" class="login-popup">
        <a href="#" class="close"><img src="close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          
          <section class="login">
          	<div class="titulo">Login</div>
          	<form action="validar.php" method="post" enctype="application/x-www-form-urlencoded">
          		<input id="username" name="user" type="text" required title="Username required" placeholder="Correo" data-icon="U">
          		<input id="password" name="pass" type="password" required title="Password required" placeholder="Password" data-icon="x">
          		<div class="olvido">
          			<div class="col"><a href="#" title="Ver Carásteres">Registrarse</a></div>
          		</div>
          		<div>
          			<center><input class="enviar" type="submit" value="Aceptar"></center>
          		</div>
          	</form>
          </section>
		</div>    
    </div>
</div>

</body>
</html>
