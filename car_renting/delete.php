<?php
session_start();

header('Content-Type:text/html;charset=utf-8');
$conn=mysqli_connect("localhost","root","123","car_renting");
mysqli_query($conn,"SET NAMES 'utf8'");
if(@mysqli_connect_errno()){
    echo"无法连上数据库";
}
$id = $_GET['id'];
$_SESSION['$rentingid'] = $_GET['id'];
echo $id;
$ifreturn= 'yes';
//$sql="update renting set return='$ifreturn' WHERE orderid ='$id'";
$sql ="delete from renting where orderid ='$id' ";
mysqli_query($conn,$sql);
echo 123;
echo "===恭喜您，取消成功！===<script>location.href='modifyorder.php';</script>";