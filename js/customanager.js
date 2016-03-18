jQuery( document ).ready(function($) {
	//
	$('.need-validation').parsley().on('field:validated', function() {
		var ok = $('.parsley-error').length === 0;
		$('.bs-callout-info').toggleClass('hidden', !ok);
		$('.bs-callout-warning').toggleClass('hidden', ok);
	});
	//
	$('#input_mobile').mask('(00) 000 000 000');
	$('#input_price').mask('000.000.000.000.000,00', {reverse: true});
	
	//
	$("[rel='tooltip']").tooltip();

	//
	$( "#row-adc" ).hide();
	$( "#adc-btn" ).click(function() {
	 $(this).text(function(i, text){
          return text === "ADICIONAR" ? "CANCELAR" : "ADICIONAR";
      });
	 
	 //btn-success
		$( "#row-adc" ).slideToggle( "slow", function() {
		    //for customers
		    $ ( "#input_name" ).val("");
    		$ ( "#input_email" ).val("");
    		$ ( "#input_mobile" ).val("");
    		//for products
    		$ ( "#input_descricao" ).val("");
			$ ( "#input_preco" ).val("");
		});

	});

    //
    $(".btn-customer-delete").click(function(){
        bootbox.confirm("Tem certeza que deseja remover?", function(result) {
		  if(result) {
		  	bootbox.alert("Removido com sucesso!"); 
		  }
		}); 
    });
    $(".btn-customer-edit").click(function(){
    	var nomedb = $(this).parent().parent().parent().parent().parent().parent().find(".cust_db_nome").text();
    	var emaildb = $(this).parent().parent().parent().parent().parent().parent().find(".cust_db_email").text();
    	var telefonedb = $(this).parent().parent().parent().parent().parent().parent().find(".cust_db_telefone").text();
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