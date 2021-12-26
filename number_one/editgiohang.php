<?php 
    session_start();
    if(isset($_GET["abc"])){
         $abc=$_GET["abc"];
    }
    if(isset($_GET["tk"])){
        $tk=$_GET["tk"];
   }
   if(isset($_GET["type"])){
    $type=$_GET["type"];
}

//    echo $tk;
//    echo $abc;
    if($type=='tru'){
        if($_SESSION['giohang'][$abc][3]>1){
            $_SESSION['giohang'][$abc][3]--;
        } else{
            array_splice($_SESSION['giohang'],$_GET['abc'],1);
        }
    }else{
        $_SESSION['giohang'][$abc][3]++;
    }    
   header("location:giohang.php?tk=$tk");
?>