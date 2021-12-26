<html>
<link rel="stylesheet" href="css/suasp.css">
    <!-- begin php -->
    <?php 
    if(isset($_GET["mahang"]))
        $mahang=$_GET["mahang"];
     ?>
    <?php
          include"ham.php";
          $conn=ketnoidataba();
          $ktra="";
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
            $tensp=$_POST['tensp'];
            $gia=$_POST['gia'];
            $diachi=$_POST['diachi'];
            $mota=$_POST['mota'];
            $nguyenlieu=$_POST['nguyenlieu'];
            $ngaytao=$_POST['ngaytao'];

            if(empty($_POST['tensp']))
            {
                $ktra="Bạn chưa điền tên sản phẩm";
            }
            else if($anh=="")
            {
                $ktra="Bạn chưa cho ảnh minh họa";
            }
            else if(empty($_POST['gia']))
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
                
                    $sql= "UPDATE tbthemsp SET tensp='$tensp', anh='$anh', gia='$gia', diachi='$diachi', mota='$mota',nguyenlieu='$nguyenlieu', 
                    ngaytao='$ngaytao' WHERE mahang='$mahang'";
                     $qr1 = mysqli_query($conn,$sql);
                     if($qr1>0)
                     header("location:thongtinsp.php");
                     else
                     echo "Lỗi: " . $sql . "<br>" . $conn->error;
                     $conn->close(); 
            }
         }
    ?>        
    <!-- end PHP -->
    <body>
        <div id="container">
            <div class="top">
                <p>Sửa sản phẩm</p>
                <span style="color:red;"><?php echo $ktra ?></span>
            </div>
            <br>
            <div class="mid">
                <?php
                       $sql1 = "SELECT * FROM tbthemsp where mahang='$mahang'";
                       $result = $conn->query($sql1);
                       if ($result->num_rows > 0) {
                       while($row = $result->fetch_assoc()) {
                ?>
                <form action="" method="POST" enctype="multipart/form-data" >
                    <table> 
                  
                    <tr>
                    
                        <td class="td">Tên sản phẩm:</td>
                        <td><input name="tensp" type="text" value="<?php echo $row['tensp']?>"></td>
                    </tr>
                    <tr>    
                        <td class="td">Ảnh:</td>
                        
                        <td style="border:0px solid #777777;width:23%;"><input style="font-size:13px" name="anh" type="file"></td>
                        
                    </tr>
                    <tr>
                        <td class="td">Giá:</td>
                        <td><input name="gia" type="text" value="<?php echo $row['gia'] ?>"></td>
                    </tr>
                    <tr>
                        <td class="td">Địa chỉ:</td>
                        <td><input name="diachi" type="text" value="<?php echo $row['diachi'] ?>"></td>
                    </tr>
                    <tr>
                        <td class="td">Mô tả:</td>
                        <td><input name="mota" type="text" value="<?php echo $row['mota'] ?>"></td>
                    </tr>
                    <tr>
                        <td class="td">Nguyên liệu:</td>
                        <td><input name="nguyenlieu" type="text" value="<?php echo $row['nguyenlieu'] ?>"></td>
                    </tr>
                    <tr>
                        <td class="td">Ngày tạo:</td>
                        <td><input name="ngaytao" type="date" value="<?php echo $row['ngaytao'] ?>"></td>
                    </tr>
                    <tr>
                        <td class="td"></td>
                        
                    </tr>
                    
                    </table>
                    <input id="btnsua" type="submit" value="Sửa"><br><br>
                    <a href="thongtinsp.php" style="color:black">Trở về</a>
                </form>
            </div>
            <div class="footer">

            </div>
        </div>
    </body>
    <?php 
            }
        }
    ?>
<?php $conn->close(); ?>

</html>