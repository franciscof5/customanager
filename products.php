<!DOCTYPE html>
<html>
<?php
@include("header.php");
?>
 
<body>
	<div class="container" style="margin-top:80px;">
	<?php
		include "navbar.php";
		include 'database.php';
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
		        $descricao = $_POST['desc'];
		        $preco = $_POST['price'];
		         
		        // validate input
		        $valid = true;
		        if (empty($name)) {
		            $nameError = 'Por favor coloque um nome';//'Please enter Name';
		            $valid = false;
		        }
		         
		        if (empty($descricao)) {
		            $descricaoError = 'Por favor preencha o email';//'Please enter Email Address';
		            $valid = false;
		        }
		         
		        if (empty($preco)) {
		            $precoError = 'Por favor informar o preço';//'Please enter Mobile Number';
		            $valid = false;
		        }
		         
		        // insert data
		        if ($valid) {
		        	echo '<div class="alert alert-success">
  							<strong>Sucesso!</strong> Produto '.$name.' adicionado no banco de dados.
						</div>';
		            $pdo = Database::connect();
		            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		            $sql = "INSERT INTO products (prod_nome,prod_desc,prod_preco) values(?, ?, ?)";
		            $q = $pdo->prepare($sql);
		            $q->execute(array($name,$descricao,$preco));
		            Database::disconnect();
		            //header("Location: index.php");
		        } else {
		        	echo '<div class="alert alert-danger">
						  <strong>Erro:</strong> '.$nameError.' '.$descricaoErrorError.' '.$precoError.'
						</div>';
		        }
		    }
	?>
	
	
	<script type="text/javascript">
		jQuery( document ).ready(function($) {
			$( "#row-adc" ).hide();
			$( "#adc-btn" ).click(function() {
			 $(this).text(function(i, text){
		          return text === "ADICIONAR PRODUTO" ? "CANCELAR" : "ADICIONAR PRODUTO";
		      });
			 
			 //btn-success
				$( "#row-adc" ).slideToggle( "slow", function() {
				    // Animation complete.
				    $ ( "#input_name" ).val("");
		    		$ ( "#input_descricao" ).val("");
		    		$ ( "#input_preco" ).val("");
				});

			});

		    $("[rel='tooltip']").tooltip();

		    //
		    $(".btn-customer-delete").click(function(){
		        bootbox.confirm("Tem certeza que deseja remover esse cliente?", function(result) {
				  if(result) {
				  	bootbox.alert("Cliente removido com sucesso!"); 
				  }
				}); 
		    });
		    $(".btn-customer-edit").click(function(){
		    	var nomedb = $(this).parent().parent().parent().parent().parent().parent().find(".prod_db_nome").text();
		    	var emaildb = $(this).parent().parent().parent().parent().parent().parent().find(".prod_db_preco").text();
		    	var telefonedb = $(this).parent().parent().parent().parent().parent().parent().find(".prod_db_telefone").text();
		    	$( "#row-adc" ).slideDown( "slow", function() {
		    		$ ( "#input_name" ).val(nomedb);
		    		$ ( "#input_email" ).val(emaildb);
		    		$ ( "#input_mobile" ).val(telefonedb);
		    	});

		    	//if(("#adc-btn" ).text!="CANCELAR")
		    	//$("#adc-btn" ).text="CANCELAR";
		    		
		    	$( "#adc-btn" ).text(function(i, text){
		          return "CANCELAR";
		      	});
		    });
		});
	</script>

	
		<div class="row">
			<h4 class="pull-left">PRODUTOS</h4>
			<p class="text-right"><btn class="btn-sm btn-primary text-right" id="adc-btn" style="cursor: pointer;">ADICIONAR PRODUTO</btn></p>
		</div>
		
		<div class="row" id="row-adc" style="background-color:#EEE; padding:10px 10px;">
			<form class="form-horizontal" action="products.php" method="post">

			 <div class="form-group col-md-4">
			   <label for="name">NOME</label>
			   <div class="controls">
                    <input id="input_name" name="name" type="text"  placeholder="Nome" value="<?php echo !empty($name)?$name:'';?>">
                    <?php if (!empty($nameError)): ?>
                        <span class="help-inline"><?php echo $nameError;?></span>
                    <?php endif; ?>
                </div>
			 </div>
			 
			 <div class="form-group col-md-4">
			   <label for="desc">DESCRIÇÃO</label>
			  	<div class="controls">
                    <input id="input_desc" name="desc" type="text" placeholder="Descrição" value="<?php echo !empty($email)?$email:'';?>">
                    <?php if (!empty($emailError)): ?>
                        <span class="help-inline"><?php echo $emailError;?></span>
                    <?php endif;?>
                </div>
			 </div>
			 
			 <div class="form-group col-md-4">
			   <label for="price">PREÇO</label>
			   <div class="controls">
                    <input id="input_price" name="price" type="text"  placeholder="Preço" value="<?php echo !empty($mobile)?$mobile:'';?>">
                    <?php if (!empty($mobileError)): ?>
                        <span class="help-inline"><?php echo $mobileError;?></span>
                    <?php endif;?>
                </div>
			 </div>

                <div class="form-actions">
                  <br />
                  <button type="submit" class="btn btn-sm btn-success">SALVAR</button>
                </div>
            </form>
		</div>
		<div class="row">
			
			<table class="table table-striped table-bordered">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>NOME</th>
				  <th>DESCRIÇÃO</th>
				  <th>PREÇO</th>
				  <th>PEDIDOS</th>
				  <th>AÇÕES</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
			   
			   $pdo = Database::connect();
			   $sql = 'SELECT * FROM products ';
			   foreach ($pdo->query($sql) as $row) {
						echo '<tr>';
						echo '<td class="cust_db_id">'. $row['prod_id'] . '</td>';
						echo '<td class="cust_db_nome">'. $row['prod_nome'] . '</td>';
						echo '<td class="cust_db_email">'. $row['prod_descricao'] . '</td>';
						echo '<td class="cust_db_telefone">'. $row['prod_preco'] . '</td>';
						echo '<td>'. "." . '</td>';
						echo '<td>
								<table style="width:100%;">
								<tr>
									<td align="center">
					                	<button type="button" class="btn btn-default btn-customer-edit" data-toggle="tooltip" data-placement="top" title="EDITAR PRODUTO" rel="tooltip"><i class="glyphicon glyphicon-edit"></i></button>
					                </td>
					                <td align="center">
					                	<button title="" data-placement="top" data-toggle="tooltip" class="btn btn-default btn-customer-delete" type="button" data-original-title="REMOVER PRODUTO" rel="tooltip"><i class="glyphicon glyphicon-remove-circle"></i></button>
					                </td>
				                </tr>
				                </table>
							  </td>';
						echo '</tr>';
			   }
			   Database::disconnect();
			  ?>
			  </tbody>
			</table>
		</div>
	</div> <!-- /container -->

	<?php
		@include("footer.php");
	?>
  </body>
</html>
