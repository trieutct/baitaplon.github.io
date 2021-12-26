
<?php
include"ham.php";
$conn=ketnoidataba();
if ($conn->connect_error) {
die("Kết nối thất bại: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" integrity="" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sanpham.css">
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
        .themgio{
            background-color:#1f60a1;
        }
        .themgio:hover{
            background-color: orange;
        }
        img:hover {
        transform: scale(1.1);
        }
        #dangnhap{
            display:flex;
        }
    </style>
    <script>
        
        var i =1;
        function giamsl(){  
            document.getElementById('sl').value=--i;
            if(i>1){
            document.getElementById('gia').value=parseInt(document.getElementById('gia').value) - parseInt(document.getElementById('giagoc').value);
            }else{
            document.getElementById('gia').value=parseInt(document.getElementById('gia').value) / 2;
            i =2;
            document.getElementById('gia').value=document.getElementById('giagoc').value;
            }
            document.getElementById('sltruyen').value=document.getElementById('sl').value;
            }
        function tangsl(){
            
            document.getElementById('sl').value=++i;
            document.getElementById('gia').value=parseInt(document.getElementById('giagoc').value) * i;
            document.getElementById('sltruyen').value=document.getElementById('sl').value;
            
            
        }

        
    </script>
</head>
<?php 

    
    if(isset($_GET["ma"])){
        $mahang=$_GET["ma"];
        $taikhoan=$_GET["ten"];
    }
           
           $sql1 = "SELECT * FROM tbthemsp where mahang='$mahang'";   
           $result = $conn->query($sql1);
            if ($result->num_rows > 0) {
            $row = $result->fetch_assoc()
                
           ?>
<body>
    <div id="container">
        <!-- header -->
        <div id="header" style="display: flex;">
            <img src="image/entraitim.jpg" id="icon" height="70" width="70">
            <div id="ten">
            <h2>FOOD</h2>
            <H3>NUMBER ONE</H3>
            </div>
            <div id="tctimkiem">
            <form action="TkMonAn.php?tk=<?php echo $taikhoan ?>" method="POST">
                <input  style="width:500px;margin-left:170px;margin-top:15px" type="text" id="timkiem" name="txt" placeholder="Địa điểm,món ăn,loại hình...">
                <input id="tim" type="submit" value="Tìm kiếm">
            </form>
            </div>
            <div id="dangnhap">
            <?php
            $sqlten="SELECT hovaten FROM tbtaikhoan WHERE taikhoan='$taikhoan'";
            $result = $conn->query($sqlten);
            $row8 = $result->fetch_assoc()
            ?>
            <ul id="menu1">
                <li><a style="margin-left:40px;font-size:20;color:#1f60a1;margin-top:5px;position: relative;"  class="fa fa-user"> <?php echo $row8['hovaten'] ?></a>
                <ul class="sub-menu1" style="text-align:center;margin-left:20px">
                <li><a href="doimatkhau.php?tk=<?php echo $taikhoan ?>">Đổi mật khẩu</a></li>
                <li><a href="dangnhap.php?delete=1" style="margin-top:5px;font-size:14px;color:#1f60a1;">Đăng xuất</a></li>
                </ul>
            </li>
            </ul>
            <a href="giohang.php?tk=<?php echo $taikhoan ?>"><img style="margin-left:100;margin-right:10px" src="image/giohang.png" alt="" width=30></a>
            <a href="giohang.php?tk=<?php echo $taikhoan ?>" style="font-size:20;color:#1f60a1;margin-left:10">Giỏ hàng</a>

            </div>
            
            
         </div>
        <!-- end header -->
        <!--begin #menu-->
        <div id="menu">
            <ul>
                <li><a href="trangchu.php?tk=<?php echo $taikhoan ?>"><span class="fa fa-home"> Trang chủ</span></a></li>
                <li><a href=""><span class="fa fa-percent">Sản Phẩm</span></a></li>
                <li><a href=""><span class="fa fa-rss"> Tin tức</span></a></li>
                <li><a href="gioithieu.php?tk=<?php echo $taikhoan ?>"><span class="fa fa-address-card"> Giới thiệu</span></a></li>
                <li><a href="lienhe.php?tk=<?php echo $taikhoan ?>"><span class="fa fa-phone"> Liên hệ</span></a></li>
            </ul>
        </div>
        <div id="thongtin">
            <img id="anhto" src="image/<?php echo $row['anh'] ?>  " >
        </div>
        <div id="chucai">
            <b><h1><?php echo $row['tensp'] ?></h1></b>
            <b>
                <p>Mô tả:</b><?php echo $row['mota'] ?></p>
            <b>
                <p>Địa chỉ:</b><?php echo $row['diachi'] ?></p>
            <b>
                <p>Nguyên liệu:</b><?php echo $row['nguyenlieu'] ?></p>
            <b>
                <p>Đánh giá:</b></p>
            
        </div>
        <div id="dathang">
        <form action="giohang.php?tk=<?php echo $taikhoan?>" method="POST">
            <b><p id="chuso">Số lượng:</p></b>
            <div id="nutbam">
                <b><input onclick="giamsl()" class="tanggiam" type="button" value="-"></b>
                <b><input id="sl" type="button" value="1" min="1" ></b>
                <b><input onclick="tangsl()" class="tanggiam" type="button" value="+"></b>
            </div>
            <b>
                    <input id="gia" name="gia" type="button" value="<?php echo $row['gia'] ?>"> 
                    <input type="hidden" name="gia" id="giagoc" value="<?php echo $row['gia'] ?>"><a>Đồng</a>
                    <input id="nut"  type="submit" name="giohang"  value="Thêm món">
                    <input type="hidden" name="mahang" value="<?php echo $row["mahang"]?>">
                    <input type="hidden" name="tensp" value="<?php echo $row["tensp"]?>">
                    <input type="hidden" name="anh" value="<?php echo $row["anh"]?>">
                    <input type="hidden" name="mota" value="<?php echo $row["mota"]?>">
                    <input type="hidden" name="nguyenlieu" value="<?php echo $row["nguyenlieu"]?>">
                    <input id="sltruyen" type="hidden" name="soluong" value=1>
                   </form>
                <p id="vat">Giá trên chưa bao gồm 10% VAT</p>
            </b>
            <?php
            
            }
        ?>
        </div>
        <div id="danhgia">
            <h2 id="bl">Bình luận</h2>
            <div id="binhluan">
                <?php
                $sql3 ="SELECT * FROM tbdanhgia WHERE mahang = '$mahang' ";
                $result = $conn->query($sql3);
                if ($result->num_rows > 0) {
                while($row1 = $result->fetch_assoc()) {
                ?>
                <div class="dep">
                <b><p><?php echo $row1['taikhoan'] ?></p></b>
                <p><?php echo $row1['danhgia'] ?><hr>
                </div>
                <?php
                }
            }
                ?>
            </div>
            <div id="cmt"> 
            <form action=""  method="POST">
        <input type="text" placeholder="Viết đánh giá..." name="txtcmt" id="txtcmt" value="">
        <input type="hidden" value="<?php echo $mahang ?>" name="txtma">
        <input type="hidden" value="<?php echo $taikhoan ?>" name="txttk">
        <input type="hidden" value="<?php echo $taikhoan ?>" name="txttk">
        <input type="submit"  value="Gửi" name="gui">
            </form>
            </div>  
            <?php 
            if (isset($_POST['gui'])) {
                $taikhoan1=$_POST['txttk'];
                $danhgia1=$_POST["txtcmt"];
                $mahang1=$_POST["txtma"];
                if($danhgia1 == ""){
                }else{
                $sqlInsert ="INSERT INTO tbdanhgia (mahang,taikhoan,danhgia) VALUES ('$mahang1','$taikhoan1','$danhgia1')";
                if ($conn->query($sqlInsert) === TRUE) {
                    
                    error_reporting(0); 
                   }
            }
            
            
        }
            ?>
 
        </div>
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
            <font><marquee direction="left" style="background:orange">Sự hài lòng của quý khách là niềm vinh hạnh đối với shop của chúng tôi. Xin trân trọng cảm ơn và hẹn gặp lại quý khách!</marquee></font>
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
<?php $conn->close(); ?>       
</body>
</html>