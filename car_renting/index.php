<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <style>
        #logo-{
            position: absolute;
            top: 5px;
            left: 15px;
        }
        #search{
            position: absolute;
            top: 0px;
            right: 5px;
        }
    </style>
</head>
<body>
<!-- Header Starts Here -->
<div id="logo-">
    <?php
    session_start();
    if(isset($_SESSION['username'])) {
        $loginname = $_SESSION['username'];
        @setcookie("Cookiename",$loginname,time());
        echo "<li><a style='color:white;'> $loginname 欢迎您 </a></li><li>
        <a href='member.php' style='color:white;'>注册会员</a>
        <a a style='color:white;'href='login.php'>退出</a></li>";
    }/*else{
        echo"<li><a href='login.php' target='_blank'>请登录</a></li>";
    }*/
    ?>
    <form action="login.php">
        <input type="submit" value="登录" />
        <a href="register.php" ><input type="button" value="注册" /></a>
        
    </form>
</div>
<!-- <div id="search"><form action="search.php" method="post">
    <p style="color: white;display: inline-block;">站内搜索：</p> <input type="text" />
    <input type="submit" value="查询" /></form>
</div> -->
<div class="header">
    <div class="container">
        <div class="header-top">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png"></a>
            </div>
            <span class="menu"></span>
            <div class="clear"></div>
            <div class="navigation">
                <h2 style="color:white;text-align:center;">课设专用汽车销售系统</h2>
                <ul class="navig">
                    <li><a href="bikes.html">热门车型</a></li>
                    <!--<li><a href="bikes.html">租赁</a></li>
                    <li><a href=#>型号</a></li>-->
                    <li><a href="contact.html">联系方式</a></li>
                    <li><a href="about.html">关于我们</a></li>
                    <li><a href="modifyorder.php">订单查询</a></li>
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
        <!-- Banner Slide Starts Here -->
        <div class="slider">
            <!-- Slideshow 3 -->
            <script src="js/responsiveslides.min.js"></script>
            <script>
                // You can also use "$(window).load(function() {"
                $(function () {
                    // Slideshow 3
                    $("#slider3").responsiveSlides({
                        manualControls: '#slider3-pager',
                    });
                });
            </script>
            <ul class="rslides" id="slider3">
                <li>
                    <div class="banner">
                        <h1 style="color:black">户外运动车型</h1>
                    </div>
                </li>
                <li>
                    <div class="banner banner2">
                        <h1>都市商务车型</h1>

                    </div>
                </li>
                <li>
                    <div class="banner banner1">
                        <h1>运动越野车型</h1>

                    </div>
                </li>
            </ul>

            <div class="clearfix"> </div>
        </div>
        <!-- Banner Slide Ends Here -->
        <!-- Best Seller Starts Here -->
        <div class="best-seller">
            <div class="best-seller-row">
                <div class="seller-column">
                    <div class="sale-box">
                        <span class="on_sale title_shop">bestseller</span>
                    </div>
                    <img src="images/suv.jpg" alt=""  class="seller-img">
                </div>
                <div class="seller-column1">
                    <h3>Sale</h3>
                    <span class="sale-nip"></span>
                    <h4>热门车型：雪弗兰suburan</h4>
                    <small>分类:SUV</small>
                    <p>350yuan</p>
                    <div class="price">
                        <a href="single.php?id=1">查看详情</a>
                        <span class="rating">星级<i class="ratings"></i></span>
                    </div>
                    <p class="customer">询问客服</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="biseller-info">
                <ul id="flexiselDemo3">
                    <li>
                        <div class="biseller-column">
                            <img src="images/falari.jpg" alt="" class="veiw-img">

                            <div class="biseller-name">
                                <h4>法拉利F12</h4>
                                <small>分类:Sports Car</small>
                            </div>
                            <div class="biseller-name1">
                                <p>800 yuan</p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="price-s">
                                <a href="single.php?id=2">查看详情</a>
                            </div>

                        </div>
                    </li>
                    <li>
                        <div class="biseller-column">
                            <img src="images/audi.jpg" alt="" class="veiw-img">

                            <div class="biseller-name">
                                <h4>奥迪TT </h4>
                                <small>分类:cars</small>
                            </div>
                            <div class="biseller-name1">
                                <p>121yuan</p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="price-s">
                                <a href="single.php?id=3">查看详情</a>
                            </div>

                        </div>
                    </li>
                    <li>
                        <div class="biseller-column">
                            <img src="images/gtr.jpg" alt="" class="veiw-img">

                            <div class="biseller-name">
                                <h4>日产GTR</h4>
                                <small>分类:sports car</small>
                            </div>
                            <div class="biseller-name1">
                                <p>899yuan</p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="price-s">
                                <a href="single.php?id=4">查看详情</a>
                            </div>

                        </div>
                    </li>
                    <li>
                        <div  class="biseller-column">
                            <img src="images/suv.jpg" alt="" class="veiw-img">

                            <div class="biseller-name">
                                <h4>雪弗兰Suburan</h4>
                                <small>分类：SUV</small>
                            </div>
                            <div class="biseller-name1">
                                <p>1 219yuan</p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="price-s">
                                <a href="single.php?id=1">查看详情</a>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>
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
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    </div>
</div>
<!--- fOOTER Starts Here --->
<div class="container">
    <div class="footer">
        <a href="">更多车型敬请期待</a>
    </div>
    <div class="footer-top">
        <ul class="bottom-list">
            <li><a href="#">车型分类</a></li>
            <li><a href="#">租赁流程</a></li>
            <li><a href="#">付款方式</a></li>
            <li><a href="#">联系我们</a></li>
        </ul>
    </div>
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
