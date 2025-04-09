<?php
include('../mymethods.php');
$reg_id= $_GET['reg_id'];
$result = deleteUserData($reg_id);
if($result==1)
{
    echo"data deleted";
}
else{

    echo"data is not deleted";
}
?>