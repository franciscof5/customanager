<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
</head>
 
<body>
	<?php
		@include("navbar.php");
	?>
	<?php
		global $logado;
		if($logado);
		//não implementado
	?>
	<div class="container" style="margin-top:80px;">
			<h4>Acesso restrito</h4>
			<p>Favor colocar usuário e senha</p>
	</div> <!-- /container -->
  </body>
</html>

<?php /*
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Altran - Teste 1</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	 <div class="container-fluid">
	  
	  <div class="navbar-header">
	   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	   </button>
	   <a class="navbar-brand" href="#">Web Dev Academy</a>
	  </div>

	  <div id="navbar" class="navbar-collapse collapse">
	   <ul class="nav navbar-nav navbar-right">
		<li><a href="#">Produtos</a></li>
		<li><a href="#">Clientes</a></li>
		<li><a href="#">Pedidos</a></li>
		<li><a href="#">Ajuda</a></li>N
	   </ul>
	  </div>

	 </div>
	</nav>

	<div id="main" class="container-fluid">
	 <h3 class="page-header">Template Inicial</h3>
	</div>
	

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>