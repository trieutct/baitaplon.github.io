<html>
        <!-- css -->
        <style>
             * {
                    margin: 0;
                    padding: 0;
                }
                .form {
                    margin:2% auto;
                    width: 400px;
                    border-radius: 10px;
                    overflow: hidden;
                    padding: 55px 55px 37px;
                    background: #9152f8;
                    background: -webkit-linear-gradient(top,#7579ff,#b224ef);
                    background: -o-linear-gradient(top,#7579ff,#b224ef);
                    background: -moz-linear-gradient(top,#7579ff,#b224ef);
                    background: linear-gradient(top,#7579ff,#b224ef);
                    text-align: center;
                }
                .form h2 {
                    font-size: 30px;
                    color: #fff;
                    line-height: 1.2;
                    text-align: center;
                    text-transform: uppercase;
                    display: block;
                    margin-bottom: 30px;
                }
                .form input[type=text], .form input[type=password],.form input[type=password_1] {
                    font-family: Poppins-Regular;
                    font-size: 16px;
                    color: #fff;
                    line-height: 1.2;
                    display: block;
                    width: calc(100% - 10px);
                    height: 45px;
                    background: 0 0;
                    padding: 10px 0;
                    border-bottom: 2px solid rgba(255,255,255,.24)!important;
                    border: 0;
                    outline: 0;
                }
                .form input[type=text]::focus, .form input[type=password]::focus,form input[type=password]::focus {
                    color: red;
                }
                .form input[type=password], {
                    margin-bottom: 20px;
                }
                .form input::placeholder {
                    color: #fff;
                }
                .form input[type=submit] {
                    font-size: 16px;
                    color: #555;
                    line-height: 1.2;
                    padding: 0 20px;
                    min-width: 120px;
                    height: 50px;
                    border-radius: 25px;
                    background: #fff;
                    position: relative;
                    z-index: 1;
                    border: 0;
                    outline: 0;
                    display: block;
                    margin: 30px auto;
                }
        </style>
        <!-- css -->


        <!-- bắt đầu kiểm tra thông tin đăng ký -->
        <?php
         if(isset($_GET['ID']))
         {
             $id=$_GET['ID'];
         }

        include"ham.php";
        $conn=ketnoidataba();
         
        $kiemtrahovaten="";
        $kiemtratk="";
        $kiemtramk="";
        $taikhoan="";
        $matkhau="";
        $hovaten="";
        $rmatkhau="";
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $matkhau=$_POST['password'];
            $hovaten=$_POST['fullname'];
            $rmatkhau=$_POST['rpassword'];
           // họ và tên
           if(empty($_POST["fullname"]))
           {
               $kiemtrahovaten="Vui lòng nhập tên của bạn";
           }  
           else if(empty($_POST["password"]))
           {
               $kiemtramk="Vui lòng nhập mật khẩu\n";
           }
           else if(empty($_POST["rpassword"]))
           {
               $kiemtramk="Vui lòng nhập lại mật khẩu";
           }else if(strlen($matkhau)<4)
              {
                 $kiemtramk="Mật khẩu phải trên 8 kí tự";
            }else if($matkhau!=$rmatkhau)
                   {
                        $kiemtramk="Mật khẩu không giống nhau";
           }else{
            
            $kiemtrahovaten="*";
            $kiemtratk="*";
            $kiemtramk="*";

           }
        }
            if($kiemtratk=="*" && $kiemtramk=="*" && $kiemtrahovaten=="*")
            {
                $matkhau=md5($matkhau);
                $sql="UPDATE tbtaikhoan SET hovaten='$hovaten', matkhau='$matkhau' WHERE id='$id'";
                 if ($conn->query($sql) === TRUE) {
                    header("location:thongtintk.php");
                   } else {
                   echo "Lỗi: " . $sql . "<br>" . $conn->error;
                   }
            }

        ?>
        <?php
        $sql = "SELECT * FROM tbtaikhoan where ID='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
        ?>
        <!-- kết thúc kiểm tra thông tin đăng kí -->
    <body>
    <div class="form">
      <h2>Sửa thông tin đăng ký</h2><br>
      <span style="color:#FFFFFF"><?php echo $kiemtrahovaten ?></span><br>
      <span style="color:#FFFFFF"><?php echo $kiemtratk ?></span><br>
      <span style="color:#FFFFFF"><?php echo $kiemtramk ?></span>
        <form action="" method="POST" name="dang-ky">
        <input type="text" name="fullname" placeholder="Họ và tên" value="<?php echo $row['hovaten'] ?> "/>
        <input type="text" name="password" placeholder="Mật khẩu mới" value=""/>
        <input type="text" name="rpassword" placeholder="Nhập lại mật khẩu" value="" />
        <input type="submit" name="dangky" value="Sửa" />
        </form>
    </div>
    </body>
    <?php 
            }
        }
    ?>
<?php $conn->close(); ?>

</html>