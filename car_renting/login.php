<!doctype html>
<html lang="zh" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<div class="htmleaf-container">
	<div class="wrapper">
		<div class="container">
			<h1>Welcome</h1>
			<form name="form"  class="form" method="post" action="login-ok.php">
				<input name="username" type="text" placeholder="用户名">
				<input name="password" type="password" placeholder="密码">
				<button name="denglu"  type="submit" id="login-button">登录</button><br><br>
				<a href="register.php" ><input name="zhuce" type="text" value="没有账号？点我注册"></a>
			</form>

		</div>

	</div>
</div>

<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>

</body>
</html>