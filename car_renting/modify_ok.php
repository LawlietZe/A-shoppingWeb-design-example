<?php
/**
 * Created by PhpStorm.
 * User: RBow
 * Date: 2016/1/2
 * Time: 21:19
 */
session_start();
header('Content-Type:text/html;charset=utf-8');
$conn=mysqli_connect("localhost","root","123","car_renting");
mysqli_query($conn,"SET NAMES 'utf8'");
if(@mysqli_connect_errno()){
    echo"无法连上数据库";
}


$orderid=$_SESSION['$orderid'];
echo $orderid;
$phone=$_POST['phone'];
$gettime = $_POST['gettime'];
$backtime = $_POST['backtime'];
$address = $_POST['address'];
@$sql="update renting set phone='$phone',backtime='$backtime',address='$address'WHERE orderid='$orderid'";
mysqli_query($conn,$sql);
echo "===恭喜您，删除成功！===<script>location.href='modify.php';</script>";