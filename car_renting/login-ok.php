<?php
session_start();		//调用session_start()函数，声明session
header("content-type:text/html;charset=utf-8");			//设置文件编码
$conn = mysqli_connect("localhost", "root","123","car_renting");
@mysqli_query($conn,"SET NAMES 'utf8'");
if(@mysqli_connect_errno()){
    echo"无法连上数据库";
}
@mysqli_query("set names utf8");

if(isset($_POST['username']) and isset($_POST['password'])){				//判断用户名和密码是否存在
    if($_POST['username']!=null and $_POST['password']!=null){			//判断用户名和密码是否为空
        $query ="select * from USER where username='".$_POST['username']."' and password='".$_POST['password']."'";
       @ $select=mysqli_query($conn,$query);	//查询用户名和密码
        if(@mysqli_num_rows($select)== 1){							//判断查询结果是否为1
            echo "
            <script>window.location.href ='index.php';</script>";		//输出登录成功提示
            @$_SESSION['username']=$_POST['username'];				//定义session变量
        }else{
            echo "<script>alert('用户名和密码不正确！');window.location.href='login.php';</script>";	//输出用户名和密码不正确提示
        }
    }else{
        echo "<script>alert('请输入用户名和密码！');window.location.href='login.php';</script>";		//输出请输入用户名和密码提示
    }
}
