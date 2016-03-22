<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CUSTOMANAGER</title>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/jquery.growl.css" rel="stylesheet">
		<link href="css/customanager.css" rel="stylesheet">

		<script type="text/javascript" src="js/jquery2.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		<script type="text/javascript" src="js/bootbox.min.js"></script>
		
		<script type="text/javascript" src="js/jquery.mask.min.js"></script>
		<script type="text/javascript" src="js/customanager.js"></script>

		<script type="text/javascript" src="js/parsley.min.js"></script>
		<script src="js/pt-br.js"></script>

		<script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>

		<script type="text/javascript" src="js/jquery.growl.js"></script>
		
	</head>
<body>

<?php
if( isset( $_GET[ 'message' ] ) && $_GET[ 'message' ] == 'success' ) {
	echo '<script>$.growl.notice({ title: "Sucesso", message: "Operação realizada com sucesso!", location : "br" });</script>';
} elseif ($_GET[ 'message' ] == 'error' ) {
	echo '<script>$.growl.error({ title: "Erro", message: "Erro ao executar operação!", location : "br" });</script>';
};
?>

<div class="container" style="padding-top:80px;">

	<?php @include("navbar.php"); ?>
