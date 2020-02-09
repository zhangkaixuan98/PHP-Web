<!DOCTYPE html>
<html>
<head>
<title>KaiX_Login</title>
<link href="css/style.css" rel='stylesheet' type='text/css'/>
    <script>$(document).ready(function(c) {
            $('.close').on('click', function(c){
                $('.login-form').fadeOut('slow', function(c){
                    $('.login-form').remove();
                });
            });
        });
    </script>
</head>
<body>
<!--SIGN UP-->
<h1>KaiX Login</h1>
<div class="login-form">
	<div class="close"> </div>
		<div class="head-info">
			<label class="lbl-1"> </label>
			<label class="lbl-2"> </label>
			<label class="lbl-3"> </label>
		</div>
			<div class="clear"> </div>
	<div class="avtar">
		<img src="images/avtar.png" />
	</div>
			<form method="post" action="php/login.php">
                <input type="text" class="text" name="username" id="username" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" -->
                <!--input type="text" class="text" id="username"-->
                <div class="key">
                            <input type="password" name="password" id="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                </div>
                <div class="signin">
                    <input type="submit" name="submit" value="登录" >
                </div>
			</form>
</div>
<div class="copy-rights">
    <p>Copyright &copy; 2018.KaiX</a></p>
</div>
</body>
</html>
