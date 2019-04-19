<?php
//including the database connection file
include_once("../class/Manufacture.php");
$Manufacture = new Manufacture();
//getting id of the data from url
$id = $Manufacture->escape_string($_REQUEST['manufecture_id']);
//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $Manufacture->delete_manufacture($id, 'manufactures');
		
    if($result)
		{
		echo "success";
	   }else{
		echo "failed";
	}
	
?>
