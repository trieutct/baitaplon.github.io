<html>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" integrity="" crossorigin="anonymous">
<link rel="stylesheet" href="css/thongtintk.css">
<?php
include"ham.php";
$conn=ketnoidataba();
$sql = "SELECT * FROM tbtaikhoan";
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
                  <a href="thongtinsp.php"><li> Sản Phẩm<i  class="fa fa-angle-down"></i></li></a>
                  <a href="thongtintk.php"><li style="background-color:lightskyblue"> Thông tin tài khoản<i  class="fa fa-angle-down"></i></li></a>
                  
               </ul>
               <a href="dangnhap.php" style="margin-left:60px">Đăng xuất</a>
           </div>
           <div class="right">
               <div class="top">
                   <h2>Danh sách tài khoản</h2>
                   <a style="float:right;margin-right:30px" href="themtk.php"><input type="button" value="Thêm tài khoản"></a>
               </div>
               <br>
               <br>
               <div id="table">
               <table id="table1">
                   <tr>
                       <th style="height:40px; background-color: lightskyblue;border:1px solid black;">Id</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Họ và tên</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Tài khoản</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Mật khẩu</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;"></th>
                       <th style=" background-color: lightskyblue;border:1px solid black;"></th>
                   </tr>
                   <?php
                        // hiển thị từng dòng dữ liệu
                        while($row = $result->fetch_assoc()) {
                            ?>
                                <tr> 
                                    <td class="class_1"><?php echo $row["ID"] ?></td>
                                    <td class="class"><?php echo $row["hovaten"]?></td>
                                    <td class="class"><?php echo $row["taikhoan"]?></td>
                                    <td class="class"><?php echo $row["matkhau"]?></td>
                                    <td class="td" style="width:4%"><a href="suatk.php?ID=<?php echo $row['ID'] ?>" id="thongtin">Sửa</a></td>
                                    <td class="td" style="width:4%"><a href="xoatk.php?ID=<?php echo $row['ID'] ?>" id="thongtin">Xóa</a></td>
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