<?php
//including the database connection file
include_once("../class/Manufacture.php");
$Manufacture = new Manufacture();

if(isset($_REQUEST['Manufacture'])) {	
	$manufacture_name = $Manufacture->escape_string($_POST['Manufacture']);	
	
	$result = $Manufacture->execute_query("INSERT INTO manufactures(manufacture_name) VALUES('$manufacture_name')");
		
    if($result)
		{
		echo "success";
	   }else{
		echo "failed";
	}
	
}
?>