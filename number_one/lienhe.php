<?php
if(isset($_GET['tk'])){
           $taikhoan=$_GET['tk'];
       }
    ?>
<html lang="en">
    <?php 
    
            include"ham.php";
            $conn=ketnoidataba();
      ?>      
<head>
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" integrity="" crossorigin="anonymous">
    <link rel="stylesheet" href="css/lienhe.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
         #menu1{
            list-style:none;
        }
        #menu1 ul.sub-menu1{
            position: absolute;
            background-color: white;
            padding: 15px 10px 10px;
            list-style:none;
            width:200px;
            display:none;    
        }
        #menu1 li:hover ul.sub-menu1{
            display:block;
        }
        #menu2{
            display:flex;
        }
        #menu1 ul.sub-menu1 li:hover a{
            background-color: lightblue;
        }
        #menu1 ul.sub-menu1 a{
            color:#1f60a1;
            padding: 8px 20px;
        }
        #menu{
            list-style:none;
        }
        #menu ul.sub-menu{
            position: absolute;
            background-color: #EEEEEE;
            list-style:none;
            width:220px;
            display:none; 
            z-index:2;
            left:450px;   
        }
        #menu li:hover ul.sub-menu{
            display:block;
        }
        #menu{
            display:flex;
        }
        #menu ul.sub-menu li:hover a{
            background-color: lightblue;
        }
        #menu ul.sub-menu a{
            color:#1f60a1;
            padding: 0px 0px;
        }
    </style>
</head>
<body>
    <div id="container">
    <div id="header" style="height:90;border:1px solid gray">
         <img src="image/entraitim.jpg" id="icon" style=" margin-left:20px;margin-top:10;border:1px solid black" height="70" width=70>
            <div id="ten" style="line-height: 30px;margin-left: 20px;margin-right:-100">
            <h2 style="color:red;font-size: 35px;font-family:'Comic Scans'">FOOD</h2>
            <H3 style="color:red;font-size: 35px;font-family:'Comic Scans'">NUMBER ONE</H3>
            </div>
            <form action="TkMonAn.php?tk=<?php echo $taikhoan ?>" method="POST">
                <input type="text" style="width:500;margin-top:30;margin-right:10px;margin-left:230px" name="txt" placeholder="Địa điểm,món ăn,loại hình...">
                <input type="submit" value="Tìm kiếm">
            </form>
            <div id="menu2" style="margin-top:30">
            <?php
            $sqlten="SELECT hovaten FROM tbtaikhoan WHERE taikhoan='$taikhoan'";
            $result = $conn->query($sqlten);
            $row8 = $result->fetch_assoc();
            ?>
            <ul id="menu1">
                <li><a style="margin-left:40px;font-size:20;color:#1f60a1;margin-top:5px;position: relative;"  class="fa fa-user"> <?php echo $row8['hovaten'] ?></a>
                <ul class="sub-menu1" style="text-align:center;margin-left:20px">
                <li><a href="doimatkhau.php?tk=<?php echo $taikhoan ?>">Đổi mật khẩu</a></li>
                <li><a href="dangnhap.php?delete=1" style="margin-top:5px;font-size:14px;color:#1f60a1;">Đăng xuất</a></li>
                </ul>
            </li>
            </ul>
            <a href="giohang.php?tk=<?php echo $taikhoan ?>"><img style="margin-left:50;margin-right:10px" src="image/giohang.png" alt="" width=30></a>
            <a href="giohang.php?tk=<?php echo $taikhoan ?>" style="font-size:20;color:#1f60a1;margin-right:10">Giỏ hàng</a>
            
            </div>
           
         </div>
        <!-- end header -->
        <!--begin #menu-->
        <div id="menu">
            <ul>
                <li style="margin-left: 200px;"><a href="trangchu.php?tk=<?php echo $taikhoan ?>"><span class="fa fa-home"> Trang chủ</span></a></li>
                <li style="margin-left: 200px;"><a href=""><span class="fa fa-percent"> Sản Phẩm</span></a>
                <ul class="sub-menu" style="z-index:10">
                <li><a href="sanphamchon.php?tim=NU&tk=<?php echo $taikhoan ?>">Nước uống</a></li>
                <li><a href="sanphamchon.php?tim=TD&tk=<?php echo $taikhoan ?>" style="margin-left:25">Trà</a></li>
                <li><a href="sanphamchon.php?tim=MNH&tk=<?php echo $taikhoan ?>">Đồ ăn vặt</a></li>
                <li><a href="sanphamchon.php?tim=COM&tk=<?php echo $taikhoan ?>" >Cơm Ngon</a></li>
            </ul>
                </li>
                <li style="margin-left: 200px;"><a href="trangchu.php?tk=<?php echo $taikhoan ?>"><span class="fa fa-rss"> Tin tức</span></a></li>
                <li style="margin-left: 200px;"><a href="gioithieu.php?tk=<?php echo $taikhoan ?>"><span class="fa fa-address-card"> Giới thiệu</span></a></li>
                <li style="margin-left: 200px;"><a href="lienhe.php?tk=<?php echo $taikhoan ?>"><span class="fa fa-phone"> Liên hệ</span></a></li>
            </ul>
        </div>
        <h1 style="margin-left:42%;margin-top:30">Liên hệ với chúng tôi</h1>  
        <div class="thongtinlh" style="font-size:14;display:flex;margin-top:50">
        <div style="margin-left:250 ">
        <h2 style="color:red">NUMBER ONE FOOD TP.HCM</h2>
        <p>Tầng 10, tòa nhà Sonatus, số 15 Lê Thánh Tôn, phường Bến Nghé, Quận 1, TPHCM</p>
        <p><b>Điện thoại:</b>1900 2042  </p>
        <p><b>Email:</b>duongvantuan372@gmail.com</p>
        <p><b>Website:</b>Sắp có</p>
        <p><b>Giờ làm việc:</b>9:00 AM - 6:00 PM từ Thứ 2 - Thứ 6</p>
    </div>
        <div style="margin-left:200">
            <h2 style="color:red">NUMBER ONE FOOD Hà Nội</h2>
        <p>Tầng 3, Tòa nhà 101 Láng Hạ, 101 Láng Hạ, Đống Đa, Hà Nội</p>
        <p><b>Điện thoại:</b> (024) 3201 1228</p>
        <p><b>Email:</b>duongvantuan372@gmail.com</p>
        <p><b>Website:</b>Sắp có</p>
        <p><b>Giờ làm việc:</b>9:00 AM - 6:00 PM từ Thứ 2 - Thứ 6</p>
    </div>
        
        </div>
        </div>
        <div class="thongtinlh" style="font-size:14;display:flex;margin-top:50">
        <div style="margin-left:250 ">
        <h2 style="color:red">NUMBER ONE FOOD Đà Nẵng</h2>
        <p>155 Nguyễn Văn Linh, P. Vĩnh Trung, Q. Thanh Khê, Đà Nẵng</p>
        <p><b>Điện thoại:</b>(0236) 3 651968 </p>
        <p><b>Email:</b>duongvantuan372@gmail.com</p>
        <p><b>Website:</b>Sắp có</p>
        <p><b>Giờ làm việc:</b>9:00 AM - 6:00 PM từ Thứ 2 - Thứ 6</p>
    </div>
        <div style="margin-left:360">
            <h2 style="color:red">NUMBER ONE FOOD Cần Thơ</h2>
        <p>183 Võ Văn Kiệt, An Thới, Bình Thủy, Cần Thơ</p>
        <p><b>Điện thoại:</b>  (0292) 3739 500</p>
        <p><b>Email:</b>duongvantuan372@gmail.com</p>
        <p><b>Website:</b>Sắp có</p>
        <p><b>Giờ làm việc:</b>9:00 AM - 6:00 PM từ Thứ 2 - Thứ 6</p>
    </div>
        
        </div>
        <div class="thongtinlh" style="font-size:14;display:flex;margin-top:50">
        <div style="margin-left:250 ">
        <h2 style="color:red">NUMBER ONE FOOD Huế</h2>
        <p>Tầng 7, tòa nhà HCC, 28 Lý Thường Kiệt, TP. Huế</p>
        <p><b>Điện thoại:</b>(0234) 6.526.868 </p>
        <p><b>Email:</b>duongvantuan372@gmail.com</p>
        <p><b>Website:</b>Sắp có</p>
        <p><b>Giờ làm việc:</b>9:00 AM - 6:00 PM từ Thứ 2 - Thứ 6</p>
    </div>
        <div style="margin-left:400">
            <h2 style="color:red">NUMBER ONE FOOD Hải Phòng</h2>
        <p>Tầng 6, 152 Hoàng Văn Thụ, Hồng Bàng, Hải Phòng</p>
        <p><b>Điện thoại:</b>(0225) 6.584.999</p>
        <p><b>Email:</b>duongvantuan372@gmail.com</p>
        <p><b>Website:</b>Sắp có</p>
        <p><b>Giờ làm việc:</b>9:00 AM - 6:00 PM từ Thứ 2 - Thứ 6</p>
    </div>
        
        </div>
        <!-- footer -->
        <div class="footer">
            <div id="top-footer">
                <h3>Top thành viên</h3>
                <ul>
                <?php
                $sqlTOP = "SELECT hovaten FROM tbtaikhoan ORDER BY hovaten LIMIT 6";
                $result3 = $conn->query($sqlTOP);
                while($row9 = $result3->fetch_assoc()) {
                ?>
                    <li>
                        <img style="margin-left:35px;border:1px solid orange" src="image/én chu mỏ.jpg" alt="" width=80 height=80>
                        <p ><?php echo $row9['hovaten'] ?></p>
                    </li>
                    <?php 
                    }
                    ?>
                </ul>

            </div>
            <hr style="margin-top:160;background-color:orange;border:1px solid orange">
            <font><marquee direction="left" style="background:orange;margin-top:5">Sự hài lòng của quý khách là niềm vinh hạnh đối với shop của chúng tôi. Xin trân trọng cảm ơn và hẹn gặp lại quý khách!</marquee></font>
            <div id= bot-footer>
                <ul>
                    <li>
                        <p><b>Khám phá</b></p>
                        <p>Ứng dụng mobile</p>
                        <p>Viết bình luận</p>
                        <p>Tạo bộ sưu tập</p>
                        <p>Phần thưởng</p>
                        <p>Bảo mật thông tin</p>
                        <p>Quy định</p>
                    </li>
                </ul>
                <ul>
                    <li>
                        <p><b>Công ty</b></p>
                        <p>Giới thiệu</p>
                        <p>Trợ giúp</p>
                        <p>Làm việc</p>
                        <p>Nhà Đầu Tư</p>
                        <p>Góp ý</p>
                        <p>Thỏa thuận và sử dụng dịch vụ</p>
                    </li>
                </ul>
                <ul>
                    <li>
                        <p></p><b>Tham gia trên</b></p>
                        <p>Facebook</p>
                        <p>YouTuber</p>
                        <p>Instagram</p>
                        <p>Shopee</p>
                    </li>
                </ul>
                <ul>
                    <li>
                        <p><b>Giấy phép đăng kí số</b></p>
                        <p>MXH 363/GP-BTTTT</p>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end footer -->
    </div>
    <?php $conn->close(); ?>

</body>
</html>