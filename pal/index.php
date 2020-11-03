<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..::: ADMINISTRATOR PT.PAL :::..</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/index.js"></script>

<link rel="shortcut icon" href="images/images_admin/favicon.ico" />

<script type="text/javascript">
function validasi(form){
if (form.username.value == ""){
alert("Anda belum mengisikan Username");
form.username.focus();
return (false);
}
     
if (form.password.value == ""){
alert("Anda belum mengisikan Password");
form.password.focus();
return (false);
}
return (true);
}
</script>

</head>

<body class="loginpage">

	<div class="loginbox">
    	<div class="loginboxinner">
        	
            <div class="logo">
            	<h1><span>KONTRAK PEGAWAI PT.PAL</span></h1>
            </div><!--logo-->
            

<!-- Middle -->
<div id="middle">
	<form id="form-login" name="login" method="post" action="cek_login.php" onSubmit="return validasi(this)">
  
    <div class="username">
    <div class="usernameinner">
    <input type="text" name="username" size="29" id="username" />
    </div>
    </div>
	
    <div class="password">
    <div class="passwordinner">
    <input type="password" name="password" size="29" id="password" />
    </div>
    </div>
  
 <button>LOGIN</button>
</form>
</div>
 </div><!--loginboxinner-->
    </div><!--loginbox-->
</body>
</html>
