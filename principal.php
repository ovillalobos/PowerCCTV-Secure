<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CCTVCenters</title>
		<?php 
			if( !isset($_GET["mod"]) ){
				header("Location: index.php");
				exit();
			} 
			include("include/head.php"); 
		?>
	</head>
	<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">
		<header class="main-header">
			<?php include("include/main_menu.php"); ?>
		</header>		
		<aside class="main-sidebar">
			<?php include("include/sidebar.php"); ?>
		</aside>
		
		<div class="content-wrapper">
			<?php
				//SHOW THE MAIN INFORMATION	
				$modulo = $_GET["mod"];
				
				switch($modulo){
					case "well": 	include( "mod/well.php" ); 		break;
					case "user": 	include( "mod/user.php" ); 		break;
					default: 		include( "mod/error.php" ); 	break;
				}
			?>
		</div>
		
		<footer class="main-footer" style="font-size: 12px;" >
			Copyright &copy; 2014-2015 <a target="_blank" href="http://powercctv.com/">PowerCCTV Center</a>. All rights reserved.
			<div class="pull-right hidden-xs"><b>Version</b> 1.0.0</div>
		</footer>
    </div>

    <?php include("include/footer_jquery.php"); ?>
	</body>
</html>