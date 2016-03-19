<?php
	/*include "database.php";
    
    if ( !empty($_POST)) {
    	
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $mobileError = null;
         
        // keep track post values
        $name = trim($_POST['name']);
        $descricao = trim($_POST['desc']);
        $preco = trim($_POST['price']);
        
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
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO products (prod_nome,prod_desc,prod_preco) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$descricao,$preco));
            Database::disconnect();
            //header("Location: index.php");
            {
		       header( 'HTTP/1.1 303 See Other' );
		       header( 'Location: products.php?message=success' );
		       exit();
		    }
        } else {
    		echo '<div class="alert alert-danger">
			  <strong>Erro:</strong> '.$nameError.' '.$descricaoErrorError.' '.$precoError.'
			</div>';
        }
    }*/
    
    //unset($_POST);
?>

<?php
	@include("header.php");
?>
		<div class="row">
			<h4 class="pull-left">PRODUTOS</h4>
			<p class="text-right"><btn class="btn-sm btn-primary text-right" id="adc-btn" style="cursor: pointer;">ADICIONAR</btn></p>
		</div>
		
		<div class="row" id="row-adc" style="background-color:#EEE; padding:10px 10px;">
			<form class="form-horizontal need-validation" action="data.php" method="post">
			 <input type="hidden" name="ajaxcommand" value="add-product">

			 <div class="form-group col-md-4">
			   <label for="name">NOME</label>
			   <div class="controls">
                    <input id="input_name" name="name" type="text"  placeholder="Nome do produto" value="<?php echo !empty($name)?$name:'';?>"  required="" >
                </div>
			 </div>
			 
			 <div class="form-group col-md-4">
			   <label for="desc">DESCRIÇÃO</label>
			  	<div class="controls">
                    <input id="input_desc" name="desc" type="text" placeholder="Descrição curta" value="<?php echo !empty($email)?$email:'';?>" required="" >
                </div>
			 </div>
			 
			 <div class="form-group col-md-4">
			   <label for="price">PREÇO</label>
			   <div class="controls">
                    <input id="input_price" name="price" type="text"  placeholder="Preço" value="<?php echo !empty($mobile)?$mobile:'';?>" required="" >
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
				  <th>REMOVER</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
			   include "database.php";
			   $pdo = Database::connect();
			   $sql = 'SELECT * FROM products ';
			   foreach ($pdo->query($sql) as $row) {
						echo '<tr>';
						echo '<td class="cust_db_id">'. $row['prod_id'] . '</td>';
						echo '<td class="cust_db_nome"><span class="edit">'. $row['prod_nome'] . '</span></td>';
						echo '<td class="cust_db_email"><span class="edit">'. $row['prod_desc'] . '</span></td>';
						echo '<td class="cust_db_telefone maskpreco"><span class="edit">'. $row['prod_preco'] . '</span></td>';
						echo '<td>'. "." . '</td>';
						echo '<td><button title="" data-placement="top" data-toggle="tooltip" class="btn btn-default btn-customer-delete" type="button" data-original-title="REMOVER PRODUTO" rel="tooltip"><i class="glyphicon glyphicon-remove-circle"></i></button></td>';
						echo '</tr>';
			   }
			   Database::disconnect();
			  ?>
			  </tbody>
			</table>
		</div>

<?php
	@include("footer.php");
?>
  
