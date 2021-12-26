<html>
<link rel="stylesheet" href="css/themsp.css">
    <!-- begin php -->
    <?php
           include"ham.php";
           $conn=ketnoidataba();


          $ktra="";
          $mahang="";
          $tensp="";
          $gia="";
          $diachi="";
          $mota="";
          $nguyenlieu="";
          $ngaytao="";
          $anh="";
         if($_SERVER["REQUEST_METHOD"]=="POST")
         {
            $anh=$_FILES['anh']['name'];
            $mahang=$_POST['mahang'];
            $tensp=$_POST['tensp'];
            $gia=$_POST['gia'];
            $diachi=$_POST['diachi'];
            $mota=$_POST['mota'];
            $nguyenlieu=$_POST['nguyenlieu'];
            $ngaytao=$_POST['ngaytao'];

            $sql1="SELECT mahang FROM tbthemsp WHERE mahang='$mahang'";
            $user=mysqli_query($conn,$sql1);
            $count=mysqli_num_rows($user);

            if(empty($_POST['mahang']))
            {
                $ktra="Bạn chưa điền mã hàng";
            }
            else if($count>0)
            {
                $ktra="Mã hàng này đã tồn tại";
            }
            else if(empty($_POST['tensp']))
            {
                $ktra="Bạn chưa điền tên sản phẩm";
            }
            else if($anh=="")
            {
                $ktra="Bạn chưa cho ảnh minh họa";
            }else{
                var_dump($_FILES);
                move_uploaded_file($_FILES['anh']['tmp_name'],'image/'.$_FILES['anh']['name']);
            }
             if(empty($_POST['gia']))
            {
                $ktra="Bạn chưa điền giá tiền";
            }
            else if(empty($_POST['diachi']))
            {
                $ktra="Bạn chưa điền địa chỉ";
            }
            else if(empty($_POST['mota']))
            {
                $ktra="Bạn chưa điền phần mô tả sản phẩm";
            }
            else if(empty($_POST['nguyenlieu']))
            {
                $ktra="Bạn chưa điền nguyên liệu";
            }
            else if(empty($_POST['ngaytao']))
            {
                $ktra="Bạn chưa chọn ngày tạo";
            }
            else{
                
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);}
                    $sql="INSERT INTO tbthemsp (mahang,tensp,anh,gia,diachi,mota,nguyenlieu,ngaytao) VALUES 
                    ('$mahang','$tensp','$anh','$gia','$diachi','$mota','$nguyenlieu','$ngaytao')";
                     if ($conn->query($sql) === TRUE) {
                        header("location:thongtinsp.php");
                       }
                     else {
                       echo "Lỗi: " . $sql . "<br>" . $conn->error;
                       }
                       $conn->close();    
            }

         }
    ?>            
    <!-- end PHP -->
    <body>
        <div id="container">
            <div class="top">
                <p>Thêm sản phẩm</p>
                <span style="color:red;"><?php echo $ktra ?></span>
            </div>
            <br>
            <div class="mid">
                <form action="" method="POST" enctype="multipart/form-data" >
                    <table>
                    <tr>
                        <td class="td">Mã hàng:</td>
                        <td><input name="mahang" type="text"></td>
                    </tr>
                    <tr>
                        <td class="td">Tên sản phẩm:</td>
                        <td><input name="tensp" type="text"></td>
                    </tr>
                    <tr>
                        <td class="td">Ảnh:</td>
                        <td style="border:0px solid #777777;width:23%;"><input style="font-size:13px" name="anh" type="file"></td>
                    </tr>
                    <tr>
                        <td class="td">Giá:</td>
                        <td><input name="gia" type="text"></td>
                    </tr>
                    <tr>
                        <td class="td">Địa chỉ:</td>
                        <td><input name="diachi" type="text"></td>
                    </tr>
                    <tr>
                        <td class="td">Mô tả:</td>
                        <td><input name="mota" type="text"></td>
                    </tr>
                    <tr>
                        <td class="td">Nguyên liệu:</td>
                        <td><input name="nguyenlieu" type="text"></td>
                    </tr>
                    <tr>
                        <td class="td">Ngày tạo:</td>
                        <td><input name="ngaytao" type="date"></td>
                    </tr>
                    <tr>
                        <td class="td"></td>
                        <td><input style="width:28%;margin-left:100px;" type="submit" value="Thêm"></td>
                    </tr>
                    </table>
                    <a href="thongtinsp.php" style="text-decoration: none;">Quay lại</a>
                </form>
            </div>
            <div class="footer">

            </div>
        </div>
    </body>
</html>