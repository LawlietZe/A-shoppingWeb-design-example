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
echo"<br>";
$anniu=$_POST['R2'];
echo $anniu;
if($anniu=="是"){
$sql ="update user set member='$anniu' WHERE username='$loginname'";
mysqli_query($conn,$sql);
}else{
    $sql ="update user set member='$anniu' WHERE username='$loginname'";
    mysqli_query($conn,$sql);
}