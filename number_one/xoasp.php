<?php
    include"ham.php";
    $conn=ketnoidataba();
    
    if(isset($_GET['mahang']))
    {
        $mahang=$_GET['mahang'];
    }
?>
<?php
   $sql="DELETE  FROM tbthemsp WHERE mahang='$mahang'";
   $qr=mysqli_query($conn,$sql);
   header("location:thongtinsp.php");
   $conn->close(); 
?>