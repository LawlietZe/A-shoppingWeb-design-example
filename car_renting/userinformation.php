<?php
header('Content-Type:text/html;charset=utf-8');
$conn=mysqli_connect("localhost","root","123","car_renting");
mysqli_query($conn,"SET NAMES 'utf8'");
if(@mysqli_connect_errno()){
    echo"�޷��������ݿ�";
}
$username = $_POST['username'];
$cardID = $_POST['cardID'];
$phone = $_POST['phone'];
$address = $_POST['address'];
/*$sql= "select username from USER WHERE username='$username'";
    $ret = @mysqli_query($conn, $sql);
    if (@mysqli_num_rows($ret) != 0) {
        echo "==��ע����û����Ѿ����ڣ���ѡ�������û���ע�ᣡ==";
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
