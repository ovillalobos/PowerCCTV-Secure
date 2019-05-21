<script src="js/jQuery-2.1.4.min.js"></script>
<?php
	switch($modulo){
		case "user":
			echo "<script src='mod/model/".$modulo.".js'></script>";
		break;
		default: 
			//DO NOTHING FOR NOW
		break;
	}
	
?>
<link rel="stylesheet" href="mod/table/js/framework/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="mod/table/css/cnf_valida_formulario.css" type="text/css" />
<script type="text/javascript" src="mod/table/js/framework/jqxcore.js"></script>	
<script type="text/javascript" src="mod/table/js/framework/jqxdatatable.js"></script>
<script type="text/javascript" src="mod/table/js/framework/jqxdata.js"></script>         
<script type="text/javascript" src="mod/table/js/framework/jqxdata.export.js"></script> 
<script type="text/javascript" src="mod/table/js/framework/jqxscrollbar.js"></script>
<script type="text/javascript" src="mod/table/js/framework/jqxwindow.js"></script>	
<script type="text/javascript" src="mod/table/js/framework/jqxpanel.js"></script>
<script type="text/javascript" src="mod/table/js/framework/jqxdatetimeinput.js"></script> 
<script type="text/javascript" src="mod/table/js/framework/jqxmaskedinput.js"></script> 
<script type="text/javascript" src="mod/table/js/framework/jqxinput.js"></script> 
<script type="text/javascript" src="mod/table/js/framework/jqxcalendar.js"></script> 
<script type="text/javascript" src="mod/table/js/framework/jqxcheckbox.js"></script>
<script type="text/javascript" src="mod/table/js/framework/jqxbuttons.js"></script>
<script type="text/javascript" src="mod/table/js/framework/jqxlistbox.js"></script>
<script type="text/javascript" src="mod/table/js/framework/jqxdropdownlist.js"></script>	
<script type="text/javascript" src="mod/table/js/framework/jqxtooltip.js"></script>

<script src="js/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/raphael-min.js"></script>

<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/knob/jquery.knob.js"></script>
<script src="js/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.min.js"></script>
<script src="js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
