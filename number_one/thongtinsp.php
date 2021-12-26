<html>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" integrity="" crossorigin="anonymous">
<link rel="stylesheet" href="css/thongtinsp.css">
<?php
include"ham.php";
$conn=ketnoidataba();
$sql = "SELECT * FROM tbthemsp";  
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //hiển thị header của bảng
?>
    <body>
        <div class="container">
           <div class="left">
               <h3>ADMIN</h3>
               <ul>
               <a  href="thongke.php"><li >Thống kê<i  class="fa fa-angle-down"></i></li></a>
                  <a href="thongtinsp.php"><li style="background-color:lightskyblue"> Sản Phẩm<i  class="fa fa-angle-down"></i></li></a>
                  <a href="thongtintk.php"><li> Thông tin tài khoản<i  class="fa fa-angle-down"></i></li></a>
                  
               </ul>
               <a id="dx" style="margin-left:60px" href="dangnhap.php">Đăng xuất</a>
           </div>
           <div class="right">
               <div class="top">
                   <h2>Thông tin sản phẩm</h2>
                   <a style="float:right;margin-right:30px" href="themsp.php"><input type="button" value="Thêm sản phẩm"></a>
               </div>
               <br>
               <br>
               <div class="table">
               <form action="timkiemsanpham.php" method="POST">
               <input name="timkiemsanpham" style="margin:2px" type="text" placeholder="Tìm kiếm">
               <input type="submit" value="Tìm kiếm">
               </form>
               <table>
                   <tr>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Mã Hàng</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Tên sản phẩm</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Ảnh</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Giá</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Địa Chỉ</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Mô tả</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Nguyên liệu</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Ngày Tạo</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;"></th>
                       <th style=" background-color: lightskyblue;border:1px solid black;width:50"></th>
                    
                   </tr>
                   <?php
                        // hiển thị từng dòng dữ liệu
                        while($row = $result->fetch_assoc()) {
                            ?>
                                <tr> 
                                     <td style="width:50px;" class="td"><?php echo $row["mahang"] ?></td>
                                    <td style="width:60px;" class="td"><?php echo $row["tensp"]?></td>
                                    <td style="width:100px;" class="td"><img style="width:100px;height:80px" src="image/<?php echo $row["anh"]?>" alt=""></td>
                                    <td style="width:60px;" class="td"><?php echo $row["gia"]?></td>
                                    <td style="width:60px;" class="td"><?php echo $row["diachi"]?></td>
                                    <td style="width:260px;" class="td"><?php echo $row["mota"]?></td>
                                    <td style="width:260px;" class="td"><?php echo $row["nguyenlieu"]?></td>
                                    <td style="width:100px;" class="td"><?php echo $row["ngaytao"]?></td>
                                    <td class="td" style="width:3%;font-weight:600"><a href="suasp.php?mahang=<?php echo $row["mahang"]?>" id="thongtin">Sửa</a></td>
                                    <td class="td" style="width:3%;font-weight:600"><a href="xoasp.php?mahang=<?php echo $row["mahang"]?>" id="thongtin">Xóa</a></td>
                                </tr>            
                            <?php
                        }
                    ?>
               </table>
               <?php
} else {
    echo "không có dữ liệu";
} 
$conn->close();
?>
                </div>
           </div>
        </div>
    </body>
</html>