<?php
header('Content-Type:text/html;charset=utf-8');
$conn=mysqli_connect("localhost","root","123","car_renting");
mysqli_query($conn,"SET NAMES 'utf8'");
if(@mysqli_connect_errno()){
    echo"无法连上数据库";
}
$username = $_POST['username'];
$cardID = $_POST['cardID'];
$phone = $_POST['phone'];
$address = $_POST['address'];
/*$sql= "select username from USER WHERE username='$username'";
    $ret = @mysqli_query($conn, $sql);
    if (@mysqli_num_rows($ret) != 0) {
        echo "==您注册的用户名已经存在，请选择其他用户名注册！==";
        exit;
    }*/
$q= "insert into USER (username,cardID,phone,address) VALUES ('$username','$cardID','$phone','$address') ";
mysqli_query($conn,$q);
$sql = "select * from USER where username ='$username'";
 $result = mysqli_query($conn,$sql);
$sql = mysqli_fetch_array($result);
$name= $sql["username"];
echo $name;
echo"<br>";
echo $sql["cardID"];
echo"<br>";
echo $sql["phone"];
echo"<br>";
echo $sql["address"];
echo"<br>";
