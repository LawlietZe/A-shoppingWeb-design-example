<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
@$conn=mysqli_connect("localhost","root","123","car_renting");
mysqli_query($conn,"SET NAMES 'utf8'");

if(@mysqli_connect_errno()){
    echo"无法连上数据库";
}
$rentingid = $_SESSION['$rentingid'];
echo "订单号: $rentingid";
echo"<br>";
if(isset($_SESSION['username'])) {
    $loginname = $_SESSION['username'];
    echo "$loginname 欢迎您";
    @setcookie("Cookiename", $loginname, time());
}
$number=$_POST['carnum'];
echo"<br>";
echo "您订车的数量： $number";
echo"<br>";
$_SESSION['$number'] = $number;


$sql ="select * from car WHERE id='$rentingid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

echo"<br>";
$quantity = $row["quantity"];
$left=$quantity - $number;
$_SESSION['$left']=$left;  //session 设置剩下的车辆数，在下一个页面再插入car表同步。

echo "剩下的车有 $left 辆";
echo"<br>";
if ($left < 0){
    echo "抱歉，车库里没车了！";
    echo "<a href=index.php >返回首页</a>";
    die();
}
?>
<br>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<a href="index.php">返回首页</a>
<form action="cart_in.php" method="post">
    <h1>请完善您的租赁信息</h1>
    请输入您的身份证号：<input type="text" name="cardID"><br><br>
    请输入您的手机号：<input type="text" name="phone"><br><br>
    请输入您要借出日期：<input type="date" name="gettime"> 格式如右：2000-01-01<br><br>
    请输入您的归还日期：<input type="date" name="backtime"><br><br>
    请输入您的地址：<input type="text" name="address"><br><br>
    是否投保？<input type="radio" name="R1" value="是" checked>是 &nbsp; &nbsp; &nbsp;
           <input type="radio" name="R1" value="否" >否<br><br>
   <!-- 是否注册会员？享受7折优惠<input type="radio" name="R2" value="是" checked>是 &nbsp; &nbsp; &nbsp;
    <input type="radio" name="R2" value="否" >否<br><br>-->
    <button  type="submit" id="login-button"">提交</button>
</form>
