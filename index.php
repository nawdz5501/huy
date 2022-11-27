<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">    
    <title>Document</title>
</head>

<body>
    <?php
        error_reporting(0);
        include "connect.php";
if(isset($_GET)){
    $id=$_GET['id'];
    $detail_sql="SELECT *FROM House where IDHouse='$id'";
    $result=mysqli_query($conn,$detail_sql);
    $check=mysqli_num_rows($result);
    $IDHouse="";
    $HName="";
    $Area="";
    $Hrooms="";
    $Price="";
    if($check>0)
    {
     $row=mysqli_fetch_assoc($result);
     $IDHouse=$row['IDHouse'];
     $HName=$row['HName'];
     $Area=$row['Area'];
     $Hrooms=$row['Hrooms'];
     $Price=$row['Price'];
}
}
        $option_SQL="SELECT distinct Hrooms from House order by Hrooms ASC";
        $res=mysqli_query($conn,$option_SQL);
        $valid=mysqli_num_rows($res);
    ?>
    


    <div>
        <form action="edit.php" method="post" name="myForm" id="myForm" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?=$id?> "/>
            <label>IDHouse</label>
            <input type="text" name="IDHouse" value="<?=$IDHouse ?>" />
            
            <label>House Name</label>
            <input type="text" name="HName" value="<?=$HName ?>" />

            <label>Area</label>
            <input type="text" name="Area" value="<?=$Area ?>" />

            <label>Price</label>
            <input type="text" name="Price" value="<?=$Price ?>" />

            <label>House Rooms</label>
            <select name="Hrooms">
        
                <?php

                    
                    if($valid){
                        while($options=mysqli_fetch_assoc($res)){
                            
                            ?>
                            
                            <option value="<?=$options['Hrooms']?>">
                                <span><?=$options['Hrooms']?></span>
                            </option>
                            <?php
                            
                        }
                    }
                    
                ?>

            </select>
            <div id="input-error"></div>
            <button type="submit" name="edit">Edit</button>
        </form>
    </div>
    <table class="container">
	<thead>
		<tr>
			<th><h1>No</h1></th>
			<th><h1>IDHouse</h1></th>
			<th><h1>House Name</h1></th>
			<th><h1>Area</h1></th>
			<th><h1>House Rooms</h1></th>
			<th><h1>Price</h1></th>
			<th><h1>Action</h1></th>

		</tr>
	</thead>
        <?php
           $table_SQL="SELECT * FROM House";
           $result2=mysqli_query($conn,$table_SQL);
           $check=mysqli_num_rows($result2);
           $no=0;
           if($check>0)
            {
                while($row=mysqli_fetch_assoc($result2)){
                ?>
                <tbody>
    <tr>
                    <td>
                        <?=$no?>
                    </td>
                    <td>
                        <?=$row['IDHouse']?>
                    </td>
                    <td>
                        <?=$row['HName']?>
                    </td>
                    <td>
                        <?=$row['Area']?>
                    </td>
                    <td>
                        <?=$row['Hrooms']?>
                    </td>
                    <td>
                        <?=$row['Price']?> $
                    </td>
                    <td><a href="index.php?id=<?=$row['IDHouse']?>">Edit</td>
                </tr>
            </tbody>
                <?php
                $no++;
                }
                
            }

        ?>
</table>
<script>
var form = document.getElementById("myForm");
function validateForm(e) {
  let IDHouse = document.forms["myForm"]["IDHouse"].value;
  let HNAme = document.forms["myForm"]["HNAme"].value;
  let Area = document.forms["myForm"]["Area"].value;
  let Price = document.forms["myForm"]["Price"].value;
  console.log(IDHouse);
  let hasError=false;
  if (IDHouse==="" || HNAme===""|| Area==="" || Price ==="") {
    hasError = true
    document.querySelector("#input-error").innerHTML = "All the field must be filled out,IDHouse & Price must be a number"
  }else{
    return true

  }
  if(!hasError){
    return false
  }
}

form.addEventListener('submit', validateForm);
</script>
</body>

</html>