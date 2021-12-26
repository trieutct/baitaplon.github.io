<?php
    include"ham.php";
    $conn=ketnoidataba();
    
    if(isset($_GET['ID']))
    {
        $id=$_GET['ID'];
    }
?>
<?php
   $sql="DELETE  FROM tbtaikhoan WHERE id='$id'";
   $qr=mysqli_query($conn,$sql);
   header("location:thongtintk.php");
   $conn->close(); 
?>