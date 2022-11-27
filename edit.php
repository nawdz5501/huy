<?php
include "connect.php";
if(isset($_POST['edit'])){
    $id=$_POST['id'];
    $IDHouse=$_POST['IDHouse'];
    $HName=$_POST['HName'];
    $Area=$_POST['Area'];
    $Hrooms=$_POST['Hrooms'];
    $Price=$_POST['Price'];
    $edit_SQL="UPDATE House SET 
         IDHouse='$IDHouse',
         HName='$HName',
         Area='$Area',
         Hrooms='$Hrooms',
         Price='$Price'
         where IDHouse='$id'    
    ";
    $edit=mysqli_query($conn,$edit_SQL);
    if($edit){
        header('location:index.php'); 
    }else{
        echo "<script>alert('Failed to edit,check your syntax')</script>";
    }

}