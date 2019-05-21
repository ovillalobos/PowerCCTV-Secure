<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PowerCCTV | Log in</title>
	<link rel="shortcut icon" href="img/icon/favicon.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/square/blue.css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-box-body">
		<div class="login-logo">
			<img src="img/logo-login.png" >
		</div>
		<p id="helpInfo" style="text-align: justify;" >Enter the following infotmation to restart the password.</p>
		<div class="form-group has-feedback">
			<input id="idUser" type="user" class="form-control" placeholder="User"><span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input id="idMail" type="mail" class="form-control" placeholder="Mail"><span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input id="idPass" type="password" class="form-control" placeholder="Password"><span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input id="idPassR" type="password" class="form-control" placeholder="Retype password"><span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<button id="boSign" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				<button id="boSubm" type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
				<button id="boCane" type="submit" class="btn btn-danger btn-block btn-flat">Cancell</button>
			</div>
		</div>
        <br/><a id="boForgot" href="#">I forgot my password</a><br>
      </div>
    </div>

    <script src="js/jQuery-2.1.4.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/iCheck/icheck.min.js"></script>
    <script>
    $(function () {
		starWin();
		cleanInput();
		
        $('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%'
        });
		
		$(".login-box").slideUp(0).slideDown(1500);
		$("#boForgot").click( function (){ showBo(); cleanInput(); });
		$("#boCane").click( function (){ hideBo(); cleanInput(); });
		$("#boSign").click( function (){ location.href = 'principal.php?mod=well'; });

		function starWin(){ $("#helpInfo, #idPassR, #idMail, #boSubm, #boCane, .glyphicon-envelope, .glyphicon-log-in").slideUp(0); }
		function hideBo(){ $("#idPassR, #idMail, #boSubm, #boCane, .glyphicon-envelope, .glyphicon-log-in, #helpInfo").slideUp(500); $("#boSign, #boForgot").delay(600).slideDown(1500); }
		function showBo(){ $("#boSign, #boForgot").slideUp(500); $("#idPassR, #idMail, #boSubm, #boCane, .glyphicon-envelope, .glyphicon-log-in, #helpInfo").delay(600).slideDown(1500); }
		function cleanInput(){ $("#idUser, #idMail, #idPass, #idPassR").val(""); }
	});
    </script>
  </body>
</html>
