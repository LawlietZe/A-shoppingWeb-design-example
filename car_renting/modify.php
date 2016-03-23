<?php
session_start();
/**
 * Created by PhpStorm.
 * User: RBow
 * Date: 2016/1/1
 * Time: 17:15
 */
$orderid=$_SESSION['$orderid'];

header('Content-Type:text/html;charset=utf-8');
$conn=mysqli_connect("localhost","root","123","car_renting");
mysqli_query($conn,"SET NAMES 'utf8'");
if(@mysqli_connect_errno()){
    echo"无法连上数据库";
}
echo "<a href=index.php >返回首页</a>";
echo"<br>";
?>
<h1>下面是您可以修改选项的初始数据</h1>
<?php
$sql ="select * from renting WHERE orderid='$orderid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
echo $row["phone"];
$phone =$row["phone"];
echo"<br>";
echo $row["gettime"];
$gettime=$row["gettime"];
echo"<br>";
echo $row["backtime"];
$backtime=$row["backtime"];
echo"<br>";
echo $row["address"];
$address=$row["address"];
echo"<br>";
?>

<br><br>
<h1>请在下面表单进行修改</h1>

<form action="modify_ok.php" method="post">
    手机号：  <?php echo"<input type='text' name='phone' value='$phone'>"?><br><br>
<!-- 借出日期： <?php echo" <input type='date'name='gettime' value='$gettime' > "?><br><br> -->
    归还日期： <?php echo" <input type='date'name='backtime' value='$backtime' > "?><br><br>
    地址：  <?php echo"<input type='text' name='address' value='$address'>"?><br><br>
    <input type="submit" value="确定更改">

</form>
