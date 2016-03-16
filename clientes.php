<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Teste 1 - Pedidos System - Altran</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
 
<body>
	<?php
		@include("navbar.php");
		//@include("database.php");
		//require 'database.php';
	?>
	<?php
		global $logado;
		//if($logado);
		//não implementado

		
 
		    if ( !empty($_POST)) {
		        // keep track validation errors
		        $nameError = null;
		        $emailError = null;
		        $mobileError = null;
		         
		        // keep track post values
		        $name = $_POST['name'];
		        $email = $_POST['email'];
		        $mobile = $_POST['mobile'];
		         
		        // validate input
		        $valid = true;
		        if (empty($name)) {
		            $nameError = 'Please enter Name';
		            $valid = false;
		        }
		         
		        if (empty($email)) {
		            $emailError = 'Please enter Email Address';
		            $valid = false;
		        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
		            $emailError = 'Please enter a valid Email Address';
		            $valid = false;
		        }
		         
		        if (empty($mobile)) {
		            $mobileError = 'Please enter Mobile Number';
		            $valid = false;
		        }
		         
		        // insert data
		        if ($valid) {
		            $pdo = Database::connect();
		            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		            $sql = "INSERT INTO cliente (name,email,mobile) values(?, ?, ?)";
		            $q = $pdo->prepare($sql);
		            $q->execute(array($name,$email,$mobile));
		            Database::disconnect();
		            //header("Location: index.php");
		        }
		    }
	?>
	
	
	<script type="text/javascript">
		jQuery( document ).ready(function($) {
			$( "#row-adc" ).hide();
			$( "#adc-btn" ).click(function() {
			 $(this).text(function(i, text){
		          return text === "Adicionar Cliente" ? "Cancelar" : "Adicionar Cliente";
		      });
			 
			 //btn-success
				$( "#row-adc" ).slideToggle( "slow", function() {
				    // Animation complete.
				});

			});

		});
	</script>

	<div class="container" style="margin-top:80px;">
		<div class="row">
			<h4 class="pull-left">Clientes</h4>
			<p class="text-right"><btn class="btn-sm btn-primary text-right" id="adc-btn" style="cursor: pointer;">Adicionar Cliente</btn></p>
		</div>
		
		<div class="row" id="row-adc" style="background-color:#EEE; padding:10px 10px;">
			<form class="form-horizontal" action="clientes.php" method="post">

			 <div class="form-group col-md-4">
			   <label for="name">Nome</label>
			   <div class="controls">
                    <input name="name" type="text"  placeholder="Nome" value="<?php echo !empty($name)?$name:'';?>">
                    <?php if (!empty($nameError)): ?>
                        <span class="help-inline"><?php echo $nameError;?></span>
                    <?php endif; ?>
                </div>
			 </div>
			 
			 <div class="form-group col-md-4">
			   <label for="email">Email</label>
			  	<div class="controls">
                    <input name="email" type="text" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                    <?php if (!empty($emailError)): ?>
                        <span class="help-inline"><?php echo $emailError;?></span>
                    <?php endif;?>
                </div>
			 </div>
			 
			 <div class="form-group col-md-4">
			   <label for="mobile">Telefone</label>
			   <div class="controls">
                    <input name="mobile" type="text"  placeholder="Telefone" value="<?php echo !empty($mobile)?$mobile:'';?>">
                    <?php if (!empty($mobileError)): ?>
                        <span class="help-inline"><?php echo $mobileError;?></span>
                    <?php endif;?>
                </div>
			 </div>

                <div class="form-actions">
                  <br />
                  <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                </div>
            </form>
		</div>
		<div class="row">
			
			<table class="table table-striped table-bordered">
			  <thead>
				<tr>
				  <th>Número</th>
				  <th>Nome</th>
				  <th>Email</th>
				  <th>Telefone</th>
				  <th>Pedidos</th>
				  <th>Action</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
			   include 'database.php';
			   $pdo = Database::connect();
			   $sql = 'SELECT * FROM cliente ORDER BY id DESC';
			   var_dump($pdo->query($sql));
			   foreach ($pdo->query($sql) as $row) {
						echo '<tr>';
						echo '<td>'. $row['clien_id'] . '</td>';
						echo '<td>'. $row['clien_nome'] . '</td>';
						echo '<td>'. $row['clien_email'] . '</td>';
						echo '<td>'. $row['clien_telefone'] . '</td>';
						echo '<td>'. "." . '</td>';
						echo '<td><a class="btn" href="read.php?id='.$row['id'].'">Read</a></td>';
						echo '</tr>';
			   }
			   Database::disconnect();
			  ?>
			  </tbody>
			</table>
		</div>
	</div> <!-- /container -->
  </body>
</html>
