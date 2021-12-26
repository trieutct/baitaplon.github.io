<?php
    ///show giỏ hàng
    function list_giohang(){

        if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang'])))
        {
            if(sizeof($_SESSION['giohang'])>0){
                $tongtien=0;
            for($i=0;$i<sizeof($_SESSION['giohang']);$i++)
            {
                $thanhtien=$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3];
                $tongtien+=$thanhtien;
                echo '
                <tr>
                    <td>'.($i+1).'</td>
                    <td>'.$_SESSION['giohang'][$i][0].'</td>
                    <td><img src="image/'.$_SESSION['giohang'][$i][1].'" alt="" width=200 height=100></td>
                    <td>'.$_SESSION['giohang'][$i][2].' VND'.'</td>
                    <td><a style="margin:10px;font-size:20px;" href="editgiohang.php?abc='.$i.'&tk='.$_SESSION['giohang'][$i][4].'&type=tru">-</a>'.$_SESSION['giohang'][$i][3].'<a style="margin:10px;font-size:20px;" href="editgiohang.php?abc='.$i.'&tk='.$_SESSION['giohang'][$i][4].'&type=cong">+</a></td>
                    <td>'.$thanhtien.' VND'.'</td>
                    <td><a href="giohang.php?xoa='.$i.'&tk='.$_SESSION['giohang'][$i][4].'">Xóa</a></td>
                </tr>';
            }
               echo'<tr>
                         <th style="text-align:center" colspan="5" >Tổng số tiền</th>
                         <th>'.$tongtien.' VND'.'</th>
                         <th><a href="giohang.php?delete=1&tk='.$_SESSION['giohang'][0][4].'">xóa giỏ hàng</a></th>
                    </tr>
                    </tbody>
			</table>';
                
                echo '<div id="dathang" >
                <div class="container col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <caption> 
                                <h2>Thông tin nhận hàng</h2>
                            </caption>
                            <fieldset class="form-group">
                                    <label>Người nhận</label> 
                                    <input type="text" id="NguoiNhan" value="" class="form-control" name="NguoiNhan">
                                    <label>Số điện thoại</label> 
                                    <input type="text" id="SoDienThoai" value="" class="form-control" name="SoDienThoai">
                                    <label>Địa chỉ</label> 
                                    <input type="text" id="DiaChi" value="" class="form-control" name="DiaChi">
                            </fieldset>                
                                    <input type="submit" onclick="return alert("Bạn đặt hàng thành công");" style="padding:5px;background-color:#1f60a1;border-radius:2px;color:white;border:1px solid #1f60a1" name="dathang" value="Đặt Hàng" >
                            </form>
                        </div>
                    </div>
                </div>
                </div>';    
            }else{
                echo '<h3 style="color:#FF9900; text-align:center;">Giỏ hàng rỗng</h3>';
            }
        }
    }
    
    //tổng đơn hàng
    function tongdonhang(){
        if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang'])))
        {
            $tongtien=0;
            if(sizeof($_SESSION['giohang'])>0){
            for($i=0;$i<sizeof($_SESSION['giohang']);$i++)
            {
                $thanhtien=$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][3];
                $tongtien+=$thanhtien;
            }
            }
        }
        return $tongtien;
    }

    //kết nối databa
    function ketnoidataba(){
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "dbbaitaplon";
        // Khởi tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);
            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }  
            return $conn;
    }

    //tao thông tin người đăng kí
    function taodonhang($NguoiNhan,$sdt,$DiaChi,$TongTine){
        $conn=ketnoidataba();
        $sql = "INSERT INTO thongtindathang (NguoiNhan, sdt,DiaChi,Tongtien)  VALUES ('$NguoiNhan','$sdt','$DiaChi','$TongTine')";

        if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        return $last_id;
        
    }

    // tạo thông tin giỏ hàng khi khách đăng kí
    function taothongtingiohang($taikhoan,$mahang,$tensp,$anh,$dongia,$soluong,$thanhtien,$madonhang){
        $conn=ketnoidataba();
        $sql="INSERT INTO chitietdonhang (TaiKhoan,MaHang,TenSP,Anh,DonGia,SoLuong,ThanhTien,MaDonHang) 
        VALUE('$taikhoan','$mahang','$tensp','$anh','$dongia','$soluong','$thanhtien','$madonhang')";
        if ($conn->query($sql) === TRUE) {
            header("location:trangchu.php?tk=$taikhoan&delete=1");
           } else {
           echo "Lỗi: " . $sql . "<br>" . $conn->error;
           }   
           $conn->close();
    }
?>