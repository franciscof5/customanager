<?php
include "database.php";
if ( !empty($_POST)) {
	if($_POST["ajaxcommand"]=="single_edit") {
		echo $_POST["value"];
		die;
	} elseif ($_POST["ajaxcommand"]=="add-costumer") {
        // keep track post values
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $mobile = trim($_POST['mobile']);
        
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO customers (clien_nome,clien_email,clien_telefone) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name,$email,$mobile));
        Database::disconnect();
        //            
        {
	       header( 'HTTP/1.1 303 See Other' );
	       header( 'Location: customers.php?message=success' );
	       exit();
	    }
        /*} else {
        	echo '<div class="alert alert-danger">
				  <strong>Erro:</strong> '.$nameError.' '.$emailError.' '.$mobileError.'
				</div>';
        }		*/
	} elseif ($_POST["ajaxcommand"]=="add-product") {
        
        // keep track post values
        $name = trim($_POST['name']);
        $descricao = trim($_POST['desc']);
        $preco = trim($_POST['price']);
        
        $new_post = array(
            'post_title'    => $name,
            'post_content'   => $descricao,
            'post_type' 	=> $_POST['post_type'],
            'post_status' 	=> "publish"
        );
        
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
        /*} else {
	       header( 'HTTP/1.1 303 See Other' );
	       header( 'Location: products?message=error' );
	       exit();
	    }*/
    }
}