<?php
     session_start();
    include"ham.php";
   if(isset($_GET['tk'])){
       $taikhoan=$_GET['tk'];
   }
   if(isset($_POST['dathang'])&& ($_POST['dathang']))
   {
    // lấy thông tin khách hàng
    $hoten=$_POST['NguoiNhan'];
    $sdt=$_POST['SoDienThoai'];
    $diachi=$_POST['DiaChi'];
    $tongdonhang=tongdonhang();


    //tạo thông tin khách đặt hàng// tạo đơn hàng mới
     $MaDonHang=taodonhang($hoten,$sdt,$diachi,$tongdonhang);

    //insert thông tin giỏ hàng
    for( $i=0;$i<sizeof($_SESSION['giohang']);$i++)
    {
        $tensp=$_SESSION['giohang'][$i][0];
        $anh=$_SESSION['giohang'][$i][1];
        $dongia=$_SESSION['giohang'][$i][2];
        $soluong=$_SESSION['giohang'][$i][3];
        $thanhtien=$dongia*$soluong;
        $mahang=$_SESSION['giohang'][$i][5];

        taothongtingiohang($taikhoan,$mahang,$tensp,$anh,$dongia,$soluong,$thanhtien,$MaDonHang);
    }
   }
?>