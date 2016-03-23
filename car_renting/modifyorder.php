<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<h1>请在对比再修改您的订单</h1>
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
    }else{
        echo"<li><a href='login.php' target='_blank'>请登录</a></li>";
    }
echo"<br>";
echo"<br>";
@$sql = "select * from renting WHERE username= '$loginname'";
@$result = mysqli_query($conn,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
while($row=mysqli_fetch_array($result))
{
    echo " 你的订单号：";   echo $row["orderid"]; echo"&nbsp;&nbsp;" ;
    $id = $row["orderid"];
    echo " 你的手机号：";echo $row["phone"];echo"&nbsp;&nbsp;" ; echo " 你租的车：";echo $row["name"];echo"&nbsp;&nbsp;" ;
    echo " 你的拿车日期：";echo $row["gettime"];echo"&nbsp;&nbsp;" ; echo " 你的还车日期：";echo $row["backtime"];  echo"&nbsp;&nbsp;" ;
    echo "您的租车数量：";echo $row["number"];echo"&nbsp;&nbsp;" ;
    echo"<a href='modify.php'><button>修改</button></a>"; echo"&nbsp;&nbsp;" ;echo"<a href='delete.php?id=$id'><button>取消订单</button></a>";
    echo"<br>";
    $_SESSION['$orderid'] = $id;
}



?>