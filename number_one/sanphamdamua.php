<?php
       if(isset($_GET['tk'])){
           $taikhoan=$_GET['tk'];
       }
    ?>
<?php 
    include"ham.php";
?>
<html>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" integrity="" crossorigin="anonymous">
    <link rel="stylesheet" href="css/trangchu.css">
    <body>
    <!-- header -->
    <div id="header" style="display: flex;">
            <img src="image/entraitim.jpg" id="icon" style="margin-left:20;margin-top:-10px" height="70" width="70">
            <div id="ten" style="margin-left:20px;margin-top:10">
            <h2 style="color:red;line-height:10px">FOOD</h2>
            <H3 style="color:red">NUMBER ONE</H3>
            </div>
            <div id="tctimkiem">
            <form action="TkMonAn.php?tk=<?php echo $taikhoan ?>" method="POST">
                <input type="text" style="width:400px;margin-left:160px;margin-top:15px" id="timkiem"  name="txt" placeholder="Địa điểm,món ăn,loại hình...">
                <input id="tim"  type="submit" value="Tìm kiếm">
            </form>
            </div>
            <div id="dangnhap" style="margin-top:15px">
            <?php
            $conn=ketnoidataba();
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
            <a href="giohang.php?tk=<?php echo $taikhoan ?>"><img style="margin-left:50;margin-right:10px" src="image/giohang.png" alt="" width=30></a>
            <a href="giohang.php?tk=<?php echo $taikhoan ?>" style="font-size:20;color:#1f60a1;margin-right:10">Giỏ hàng</a>
            </div>
            
            
         </div>
        <!-- end header -->
        <!--begin #menu-->
        <div id="menu">
            <ul>
                <li style="margin-left: 170px;"><a href="trangchu.php?tk=<?php echo $taikhoan ?>"><span class="fa fa-home"> Trang chủ</span></a></li>
                <li style="margin-left: 170px;"><a href=""><span class="fa fa-percent">Sản Phẩm</span></a></li>
                <li style="margin-left: 170px;"><a href=""><span class="fa fa-rss"> Tin tức</span></a></li>
                <li style="margin-left: 170px;"><a href=""><span class="fa fa-address-card"> Giới thiệu</span></a></li>
                <li style="margin-left: 170px;"><a href="lienhe.php?tk=<?php echo $taikhoan ?>"><span class="fa fa-phone"> Liên hệ</span></a></li>
            </ul>
        </div>
        <!--end #menu-->   
        <br> 
        <?php
        $sql1 = "SELECT * FROM chitietdonhang where TaiKhoan='$taikhoan'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            $stt=0;
            //hiển thị header của bảng
        ?>

	<div class="row">
		<div class="container">
			<h3 class="text-center" style="color:#1f60a1">Sẩn phẩm đã mua</h3>
            <br>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="text-align:center">STT</th>
						<th style="text-align:center">Tên sản phẩm</th>
						<th style="text-align:center">Ảnh</th>
                        <th style="text-align:center">Đơn giá</th>
                        <th style="text-align:center">Số lượng</th>
                        <th style="text-align:center">Thành tiền</th>
                        <th style="text-align:center">Acction</th>
					</tr>
				</thead>
                <?php
                        // hiển thị từng dòng dữ liệu
                        while($row1 = $result1->fetch_assoc()) {$stt++;
                            ?>
				<tbody>  
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $row1["TenSP"] ?></td>
                        <td><img style="border:2px solid gray" src="image/<?php echo $row1["Anh"] ?>" alt="" width=200 height=100></td>
                        <td><?php echo $row1["DonGia"] ?></td>
                        <td><?php echo $row1["SoLuong"] ?></td>
                        <td><?php echo $row1["ThanhTien"] ?></td>
                        <td><a href="sanpham.php?ten=<?php echo $taikhoan ?>&ma=<?php echo$row1["MaHang"] ?> ">Mua Lại</a></td>

                    </tr>        
				</tbody>
                <?php }?>
			</table>
		</div><br>
	</div>
<?php } else{
                       echo '<h1 style="text-align:center;color:orange">Bạn chưa mua gì ở shop Tôi</h1>';
                   } ?> 
<?php $conn->close(); ?>

</body>
</html>