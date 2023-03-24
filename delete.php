<?php

require('connect.php');

if(isset($_GET['Id'])){
    $id=$_GET['Id'];
    $sql="DELETE FROM bdf WHERE Id ='$id'";
    if (!empty($conn)) {
        $del=mysqli_query($conn,$sql);
    }
    if(!$del){
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    header("location:views.php");
    die();
}


