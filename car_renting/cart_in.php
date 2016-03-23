
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
    echo "亲爱的 $loginname 欢迎您";
    echo"<br>";
    @setcookie("Cookiename", $loginname, time());
}
$rentingid = $_SESSION['$rentingid'];
echo "您汽车的id：$rentingid";
echo"<br>";
echo "<a href=index.php >返回首页</a>";
echo "<br>";
echo "<br>";
$number=$_SESSION['$number'];
//       echo $number;   显示订车数量。
$left = $_SESSION['$left'];
$sql = " update car set quantity='$left'WHERE id='$rentingid'";
mysqli_query($conn,$sql);                                              //更新car中数量


$sql1 = "select * from car WHERE id = $rentingid";
$result1 = mysqli_query($conn,$sql1);
$sql = mysqli_fetch_array($result1);
$name= $sql['name'];
$type = $sql['type'];
function GetRandStr($len)
{
    $chars = array(
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
        "3", "4", "5", "6", "7", "8", "9"
    );
    $charsLen = count($chars) - 1;
    shuffle($chars);
    $output = "";
    for ($i=0; $i<$len; $i++)
    {
        $output .= $chars[mt_rand(0, $charsLen)];
    }
    return $output;
}
$orderid = GetRandStr(4);
/*
 * Created by PhpStorm.
 * User: RBow
 * Date: 2015/12/30
 * Time: 22:24
 */
$cardID = $_POST['cardID'];
$phone = $_POST['phone'];
$gettime = $_POST['gettime'];
$backtime = $_POST['backtime'];
$address = $_POST['address'];
$insurance = $_POST['R1'];
$query =" select * from USER WHERE username='$loginname'";
$resu =mysqli_query($conn,$query);
$re = mysqli_fetch_array($resu);

$vip = $re['member'];
if($vip=="是"){
    $discount = 0.7;
    $price =$sql["price"];
    $vipprice = $discount * $price ;
}else{
    $vipprice = $sql["price"];
}



@$q = "insert into renting (orderid,id,cardID,username,phone,name,type,gettime,backtime,address,ifinsurance,price,number) VALUES ('$orderid','$rentingid','$cardID','$loginname','$phone','$name','$type','$gettime','$backtime','$address','$insurance','$vipprice','$number')";
mysqli_query($conn,$q);
$sql = "select * from renting where orderid ='$orderid'";
$result = mysqli_query($conn,$sql);
$sql = mysqli_fetch_array($result);

echo"<br>";
echo "车名:";
echo $sql['name'];
echo"<br>";
echo "类型：";
echo $sql['type'];
echo"<br>";
echo"取车时间：";
echo $sql["gettime"];
echo"<br>";
echo"还车时间：";
echo $sql["backtime"];
echo"<br>";
echo"请确认您的地址：";
echo $sql["address"];
echo"<br>";
echo"是否投保：";
echo $sql["ifinsurance"];
echo"<br>";
if($vip=="否"){
    echo"这是日租价格：";
    echo $sql["price"];
    echo "元";
}else{
    echo"这是会员价：";
    echo $vipprice ;
    echo "元";
}
echo"<h1>请在30分钟内通过支付宝提交定金，不然订单失效。</h1>";
echo "<a href='#'>点我支付 </a>";