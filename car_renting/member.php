<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
session_start();

header('Content-Type:text/html;charset=utf-8');
$conn=mysqli_connect("localhost","root","123","car_renting");
mysqli_query($conn,"SET NAMES 'utf8'");
if(@mysqli_connect_errno()){
    echo"无法连上数据库";
}
if(isset($_SESSION['username'])) {
    $loginname = $_SESSION['username'];
    @setcookie("Cookiename",$loginname,time());
    echo "<li><a style='color:black;'> $loginname 欢迎您 </a></li><li><a a style='color:black;'href='index.php'>返回首页</a></li>";
}
echo"<br>";
echo"<br>";?>

 <form method="post" action="member_ok.php">
 是否注册会员？享受7折优惠<input type="radio" name="R2" value="是" checked>是 &nbsp; &nbsp; &nbsp;
    <input type="radio" name="R2" value="否" >否<br><br>
    <button  type="submit" id="login-button"">提交</button>
    </form>