<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>关于我们</title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link rel="stylesheet" href="css/etalage.css">
    <script src="js/jquery.etalage.min.js"></script>
    <!-- Include the Etalage files -->
    <script>
        jQuery(document).ready(function($){

            $('#etalage').etalage({
                thumb_image_width: 400,
                thumb_image_height: 250,

                show_hint: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });
            // This is for the dropdown list example:
            $('.dropdownlist').change(function(){
                etalage_show( $(this).find('option:selected').attr('class') );
            });

        });
    </script>
    <!----//details-product-slider--->
</head>
<body>
<!-- Header Starts Here -->
<div class="header">
    <div class="container">
        <div class="header-top">
            <div class="logo">

                <a href="index.php"><img src="images/logo.png"></a>
                <?php
                session_start(); //调用session_start()函数，声明session
                if(isset($_SESSION['username'])) {
                    $loginname = $_SESSION['username'];
                    @setcookie("Cookiename",$loginname,time());
                    echo "<li><a style='color:white;'> $loginname 欢迎您 </a></li><li><a a style='color:white;'href='login.php'>退出</a></li>";
                }else{
                    echo"<li><a href='login.php' target='_blank'>请登录</a></li>";
                }
                ?>
            </div>
            <span class="menu"></span>
            <div class="clear"></div>
            <div class="navigation">
                <ul class="navig">
                    <li><a href="bikes.html">热门车型</a></li>
                    <li><a href="bikes.html">租赁</a></li>
                    <li><a href="bikes.html">型号</a></li>
                    <li><a href="contact.html">联系方式</a></li>
                    <li><a href="about.html">关于我们</a></li>
                </ul>
                <script>
                    $( "span.menu" ).click(function() {
                        $( ".navigation ul.navig" ).slideToggle( "slow", function() {
                            // Animation complete.
                        });
                    });
                </script>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="about">
            <div class="product">
                <div class="product-listy">
                    <h3>汽车租赁分类</h3>
                    <ul class="product-list">
                        <li><a href="">SUV车型</a></li>
                        <li><a href="">商务使用车型</a></li>
                        <li><a href="">自驾车型</a></li>
                        <li><a href="">跑车车型</a></li>
                        <li><a href="login.php">登录</a></li>
                        <li><a href="register.php">注册</a></li>
                    </ul>
                </div>
                <div class="latest-bis">

                    <div class="offer">

                    </div>
                </div>
                <div class="">

                </div>

            </div>
            <div class="new-product">
                <div class="new-product-top">
                    <ul class="product-top-list">
                        <li><a href="index.php">主页</a>&nbsp;<span>&gt;</span></li>
                        <li><a href="#">租赁</a>&nbsp;<span>&gt;</span></li>
                        <li><a href="bikes.html">详细</a>&nbsp;<span>&gt;</span></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="singel_right">
                    <div class="labout span_1_of_a1">
                        <!-- start product_slider -->
                        <ul id="etalage">
                            <li>
                                <a href="#">
                                    <!--<img class="etalage_source_image" src="images/falari.jpg" class="img-responsive">-->
                                    <!--<img class="etalage_thumb_image" src="images/suv.jpg" class="img-responsive" />-->
                                    <?php
                                   @ header("content-type:text/html;charset=utf-8");			//设置文件编码
                                    @$conn = mysqli_connect("localhost", "root","123","car_renting");
                                    @mysqli_query($conn,"SET NAMES 'utf8'");
                                    $id = $_GET['id'];
                                    $_SESSION['$rentingid'] = $_GET['id'];
                                   @ $sql = "select * from car WHERE id = $id";
                                   $result = mysqli_query($conn,$sql);
                                    $car = mysqli_fetch_array($result);
                                    switch($id){
                                        case 1:
                                            echo"<img class=etalage_source_image src=images/suv.jpg class=img-responsive>";
                                        case 2:
                                            echo"<img class=etalage_source_image src=images/falari.jpg class=img-responsive>";
                                        case 3:
                                            echo"<img class=etalage_source_image src=images/audi.jpg class=img-responsive>";
                                        case 4:
                                            echo"<img class=etalage_source_image src=images/gtr.jpg class=img-responsive>";
                                        case 5:
                                            echo"<img class=etalage_source_image src=images/jeep.jpg class=img-responsive>";
                                        case 6:
                                            echo"<img class=etalage_source_image src=images/benz.jpg class=img-responsive>";
                                        case 7:
                                            echo"<img class=etalage_source_image src=images/fengtian.png class=img-responsive>";
                                        case 8:
                                            echo"<img class=etalage_source_image src=images/bmw.jpg class=img-responsive>";
                                    }

                 ?>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="cont1 span_2_of_al">
                        <h3><?php echo $car['name'] ?></h3>

                        <li>
                            <a href="">
                                <i class="ratings rating-ed"></i>
                            </a>
                        </li>
                        </ul>
                        <div class="price_single">
                            <span class="actual"> <?php echo $car['price'] ?>元</span>
                        </div>
                        <p class="quick_desc"> <?php echo $car['state'];
                            echo"<br>";
                            echo $car['color'];
                            echo"<br>";
                            echo $car['type'];
                            ?></p>
                      <form action="cart.php" method="post">    
                        <ul class="product-qty">
                            <span>租用数量</span>
                            <select name="carnum">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>

                        </ul>    
                        <div class="btn_form">                           
                                <?php
                                if(isset($_SESSION['username'])) {
                                    $loginname = $_SESSION['username'];
                                    @setcookie("Cookiename",$loginname,time());
                                    echo"<input type='submit' value=加入租赁单 >";
                                }else{
                                    echo"<li><a href='login.php' target='_blank'>请登录再加入租赁单</a></li>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <script type="text/javascript">
                    $(window).load(function() {
                        $("#flexiselDemo3").flexisel({
                            visibleItems: 3,
                            animationSpeed: 1000,
                            autoPlay: true,
                            autoPlaySpeed: 3000,
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint:480,
                                    visibleItems: 1
                                },
                                landscape: {
                                    changePoint:640,
                                    visibleItems: 2
                                },
                                tablet: {
                                    changePoint:768,
                                    visibleItems: 3
                                }
                            }
                        });

                    });
                </script>

                <script type="text/javascript">
                    $(window).load(function() {
                        $("#flexiselDemo1").flexisel({
                            visibleItems: 3,
                            animationSpeed: 1000,
                            autoPlay: true,
                            autoPlaySpeed: 3000,
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint:480,
                                    visibleItems: 1
                                },
                                landscape: {
                                    changePoint:640,
                                    visibleItems: 2
                                },
                                tablet: {
                                    changePoint:768,
                                    visibleItems: 3
                                }
                            }
                        });

                    });
                </script>
                <script type="text/javascript" src="js/jquery.flexisel.js"></script>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--- fOOTER Starts Here --->

        <ul class="payment-list">
            <li><i class="paypal"></i></li>
            <li><i class="wi"></i></li>
            <li><i class="visa"></i></li>
            <li><i class="amazon"></i></li>
            <li><i class="sm"></i></li>
        </ul>
    </div>
    <!--- fOOTER Starts Here --->
    <div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>