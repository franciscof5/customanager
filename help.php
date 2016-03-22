<?php @include("header.php"); ?>
 
<?php include "navbar.php"; ?>

<div id="main" class="row col-md-10 col-md-offset-1">
	<?php
		@include("php/Parsedown.php");
		$contents = file_get_contents('README.md');
		$Parsedown = new Parsedown();
		echo $Parsedown->text($contents);
	?>
</div>
<?php
	@include("footer.php");
?>
  
