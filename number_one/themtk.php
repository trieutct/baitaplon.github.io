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


        <!-- b???t ?????u ki???m tra th??ng tin ????ng k?? -->
        <?php
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
            $taikhoan=$_POST["username"];
            $matkhau=$_POST['password'];
            $hovaten=$_POST['fullname'];
            $sql1="SELECT taikhoan matkhau FROM tbtaikhoan WHERE taikhoan='$taikhoan'";
         $user=mysqli_query($conn,$sql1);
         $count=mysqli_num_rows($user);
           // h??? v?? t??n
           if(empty($_POST["fullname"]))
           {
               $kiemtrahovaten="Vui l??ng nh???p t??n c???a b???n";
           }
           else if(empty($_POST["username"]))
           {
               $kiemtratk="-----Vui l??ng nh???p t??i kho???n-----";
           }
          
           else if( $count > 0)
                    {
                        $kiemtrahovaten="-----T??i kho???n ???? t???n t???i!-----";
                    }        
           else if(empty($_POST["password"]))
           {
               $kiemtramk="-----Vui l??ng nh???p m???t kh???u-----\n";
           }
           else if(strlen($matkhau)<4)
              {
                 $kiemtramk="-----M???t kh???u ph???i tr??n 8 k?? t???-----";
            }else{
            
            $kiemtrahovaten="*";
            $kiemtratk="*";
            $kiemtramk="*";

           }
        }
            if($kiemtratk=="*" && $kiemtramk=="*" && $kiemtrahovaten=="*")
            {
                $sql="INSERT INTO tbtaikhoan (hovaten,taikhoan,matkhau) VALUES ('$hovaten','$taikhoan','$matkhau')";
                $matkhau=MD5($matkhau);
                 if ($conn->query($sql) === TRUE) {
                    header("location:thongtintk.php");
                   } else {
                   echo "L???i: " . $sql . "<br>" . $conn->error;
                   }
            }

        ?>
        <!-- k???t th??c ki???m tra th??ng tin ????ng k?? -->
    <body>
    <div class="form">
      <h2>Th??m t??i kho???n</h2><br>
      <span style="color:#FFFFFF"><?php echo $kiemtrahovaten ?></span><br>
      <span style="color:#FFFFFF"><?php echo $kiemtratk ?></span><br>
      <span style="color:#FFFFFF"><?php echo $kiemtramk ?></span>
        <form action="" method="POST" name="dang-ky">
        <input type="text" name="fullname" placeholder="H??? v?? t??n" />
        <input type="text" name="username" placeholder="T??i kho???n" />
        <input type="text" name="password" placeholder="M???t kh???u"/>
        <input type="submit" name="dangky" value="Th??m" />
        </form>
    </div>
    </body>
    <?php $conn->close(); ?>

</html>