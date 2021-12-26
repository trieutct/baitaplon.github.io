<html>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" integrity="" crossorigin="anonymous">
<link rel="stylesheet" href="css/thongke.css">
<?php
       include"ham.php";
       $conn=ketnoidataba();
        $sql = "SELECT * FROM thongtindathang";  
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $tonggiaodich=0;$tongdoanhthu=0;
            while($row = $result->fetch_assoc()) {
               $tonggiaodich++;
               $tongdoanhthu+=$row["TongTien"];
            }
        }
        
        $sql1 = "SELECT * FROM tbthemsp";  
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0){
           $demsanpham=0;
            while($row1 = $result1->fetch_assoc()) {
               $demsanpham++;
            }
        }

        $sql2 = "SELECT * FROM chitietdonhang";  
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0){
           $soluongdaban=0;
            while($row2 = $result2->fetch_assoc()) {
               $soluongdaban+=$row2["SoLuong"];
            }
        }
                

    //hiển thị header của bảng
?>

    <body>
        <div class="container">
           <div class="left">
               <h3>ADMIN</h3>
               <ul>
                <a href="thongke.php"><li  style="background-color:lightskyblue;">Thống kê<i  class="fa fa-angle-down"></i></li></a>
                  <a href="thongtinsp.php"><li> Sản Phẩm<i  class="fa fa-angle-down"></i></li></a>
                  <a href="thongtintk.php"><li> Thông tin tài khoản<i  class="fa fa-angle-down"></i></li></a>
                  
               </ul>
               <a style="margin-left:60px" href="dangnhap.php">Đăng xuất</a>
           </div>
           <div class="right">
               <div class="top">
                   <h2>THỐNG KÊ</h2>
               </div>
               <br>
               <br>
               <div class="container1">
               <table id="table">
                   <tr>
                       <th style="height:45px; background-color: lightskyblue;border:1px solid black;">Thống kê dữ liệu</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Dữ liệu</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Doanh thu</th>
                    
                   </tr>
                                <tr id="thongtin"> 
                                    <td class="td" style="width:300px;margin-right:300px;">Tổng số giao dịch:<b><?php echo  $tonggiaodich ?></b></td>
                                    <td class="td" style="width:300px">Tổng số sản phẩm: <b><?php echo $demsanpham ?></b>
                                    <br><br>Số lượng đã bán: <b><?php echo $soluongdaban ?></b></td>
                                    <td class="td" style="width:300px" >Đã thanh toán: <b><?php echo $tongdoanhthu ?> VND</b></td>
                            
                                </tr>
                                          
                            <?php
                    ?>
               </table> 
               
                </div>
                <br>
                <?php
                 
                        $sql4 = "SELECT * FROM thongtindathang";  
                        $result4 = $conn->query($sql4);
                        if ($result4->num_rows > 0) {
                            //hiển thị header của bảng
                ?>
                <h1>Danh sách giao dịch</h1>
                <br>
                <table id="table">
                   <tr>
                       <th style="height:50px; background-color: lightskyblue;border:1px solid black;">Mã đơn hàng</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Người nhận</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Số điện thoại</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Địa chỉ</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;">Tổng tiền</th>
                       <th style=" background-color: lightskyblue;border:1px solid black;"></th>
                    <?php
                        // hiển thị từng dòng dữ liệu
                        while($row4 = $result4->fetch_assoc()) {
                    ?>
                   </tr>
                                <tr id="thongtin">
                                    <td class="td" style="width:100px;height:40px;border:1px solid black;text-align:center;"><?php echo $row4["MaDonHang"] ?></td>
                                    <td class="" style="width:300px;height:40px;border:1px solid black;text-align:center;"><?php echo $row4["NguoiNhan"] ?></td>
                                    <td class="" style="width:300px;height:40px;border:1px solid black;text-align:center;" ><?php echo $row4["sdt"] ?></td>
                                    <td class="" style="width:300px;height:40px;border:1px solid black;text-align:center;" ><?php echo $row4["DiaChi"] ?></td>
                                    <td class="" style="width:300px;height:40px;border:1px solid black;text-align:center;" ><?php echo $row4["TongTien"].' VNĐ' ?></td>
                                    <td class="" style="width:50px;height:40px;border:1px solid black;text-align:center;" ><a  style=" color:red;" href="xem.php?madonhang=<?php echo $row4["MaDonHang"] ?>">Xem</a></td>
                                </tr>
                    <?php } ?>            
               </table> 
               <?php
                } else {
                    echo "không có dữ liệu";
                } 
                $conn->close();
                ?>
           </div>
        </div>
    </body>
</html>