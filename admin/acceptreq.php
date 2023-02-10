<?php

include('../config/constants.php');


$id = $_GET['id'];





// delete the data
$sql = "UPDATE booking_request SET status = 'accepted' WHERE req_id=$id";

$res = mysqli_query($conn, $sql);

if($res==true)
   {
     header("Location: requests.php");
}
else{
     echo "ERROR...Failed to delete the data";
}
?>