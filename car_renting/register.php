<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="htmleaf-container">
    <div class="wrapper">
        <div class="container">
            <h1>Welcome</h1>
            <!--   <form action="" method="post" name="form">
                   用户名：<input type="text" name="username" style="width: 80px" />
                   密码：<input type="text" name="password" style="width: 80px" />
                   <input type="button" name="login" value="提交"  onClick="sub()"  />
               </form>
                -->
<?php
session_start();
$conn = @mysqli_connect("localhost", "root","123","car_renting");
@mysqli_query($conn,"SET NAMES 'utf8'");
if(@mysqli_connect_errno()){
    echo"无法连上数据库";
}
$zhuce =@$_POST['zhuce'];
if($zhuce=='注册')
{
    $username = $_POST['username'];
    $query = "select username from USER WHERE username='$username'";
    $ret = @mysqli_query($conn, $query);
    if (@mysqli_num_rows($ret) != 0) {
        echo "==您注册的用户名已经存在，请选择其他用户名注册！==";
    } else {
        @$password = $_POST['password'];
        @$cardID = $_POST['cardID'];
        @$repassword = $_POST['repassword'];
        if(!$password || !$username){
            echo"用户名或密码不能为空";
            echo" <script>location.href='register.php';</script>";
            exit;
        }
        if ($password != $repassword) {
            echo "==您输入的的密码不匹配，请重新输入！==";
        } else {
            $today = date("Y-m-d H:i:s");
            $q = "insert into USER (username, password,cardID) values ( '$username','$password','$cardID')";
            if (@!mysqli_query($conn, $q)) {
                echo "注册失败，可能用户名已经存在！";
            }else{
                echo "===恭喜您，注册成功！===<script>location.href='index.php';</script>";
                $register_tag = 1;
                 @$_SESSION['username']=$_POST['username'];
            }
        }
    }
}
if(@$register_tag != 1 ){
?>
    <form name="form" method="post" action="" >
        <div><input name="username" id="username" type="text" placeholder="用户名" class="required"></div>
        <div><input name="cardID" id="cardID" type="text" placeholder="身份证号" class="required"></div>
        <div><input name="password" id="password" type="password" placeholder="密码" class="required"></div>
        <div><input name="repassword" id="repassword" type="password" placeholder="再输入一次密码"class="required"></div>
        <div><input name="zhuce"  value="注册" type="submit" id="login-button" ></div>
    </form>
    <script type="text/javascript">
       $("form").click(function(){
        var $parent = $(this).parent();
        if($(this).is("#username")){
            if(this.value=="" || this.value.length > 6){
                var errorMsg = '请至多输入六位';
                console.log("ewrer");
                $parent.append('<span  class="">'+errorMsg+'</span>');
            }else{
                var okMsg ='输入正确';
                $parent.append('<span  class="">'+okMsg+'</span>')
            }
        }
       });
    </script>
            <?php
            }
              ?>
        </div>

        <ul class="bg-bubbles">
            <li>周卓成是爱滑轮</li>
            <li>王俊辉允晨</li>
            <li>王皓宇满天精</li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script><script>
    /*  $('#login-button').click(function (event) {
     event.preventDefault();
     $('form').fadeOut(500);
     $('.wrapper').addClass('form-success');
     $('form').action;
     });*/

</script>

</body>
<script type="text/javascript">
    $(function(){
        $("form :input.required").each(function(){
            var $required = $("<strong class='high'> *</strong>"); //创建元素
            $(this).parent().append($required); //然后将它追加到文档中
        });

        $('form :input').blur(function(){
            var $parent = $(this).parent();
            $parent.find(".formtips").remove();
            if($(this).is("#username")){
                if(this.value=="" || this.value.length > 6){
                    var errorMsg = '请至多输入6位';
                    $parent.append('<span  class="formtips onError">'+errorMsg+ '</span>');
                }else{
                    var okMsg ='输入正确';
                    $parent.append('<span  class="formtips onSuccess">'+okMsg+ '</span>');
                }
            }
            if ($(this).is("#password")) {
                if(this.value=="" || this.value.length < 6){
                    var errorMsg = '请至少输入6位';
                    $parent.append('<span  class="formtips onError">'+errorMsg+ '</span>');
                }else{
                    var okMsg ='输入正确';
                    $parent.append('<span  class="formtips onSuccess">'+okMsg+ '</span>');
                    password = this.value;
                }
            }
            if ($(this).is("#repassword")) {
                if (this.value != password) {
                    var errorMsg = '两次输入的不同';
                    $parent.append('<span  class="formtips onError">'+errorMsg+ '</span>');
                }else{
                    var okMsg ='输入正确';
                    $parent.append('<span  class="formtips onSuccess">'+okMsg+ '</span>');
                }
            }
        }).keyup(function(){
            $(this).triggerHandler("blur");
        }).focus(function(){
            $(this).triggerHandler("blur");
        });

        $('#login-button').click(function(){
            $("form :input.required").trigger('blur');
            var numError = $('form .onError').length;
            if(numError){
                return false;
            }
            alert("注册成功");
        });

        /*$("#login-button").click(function(){
         $(".formtips").remove();
         });*/
    })

</script>
</html>