<?php

include('../config/constants.php');


$id = $_GET['id'];





// delete the data
$sql = "UPDATE addvehicle_req SET status = 'accepted' WHERE id=$id";

$res = mysqli_query($conn, $sql);

if($res==true)
   {
     header("Location: vehicleaddreq.php");
}
else{
     echo "ERROR...Failed to delete the data";
}
?>