<?php
@include("header.php");
?>
 
	<?php
		include "navbar.php";
		include 'php/Parsedown.php';
		$contents = file_get_contents('readme.md');
		$Parsedown = new Parsedown();
		echo $Parsedown->text($contents);
		//@include("database.php");
		//require 'database.php';
	?>

	</div> <!-- /container -->

	<?php
		include "footer.php";
	?>
  </body>
</html>
