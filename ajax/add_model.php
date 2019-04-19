<?php
//including the database connection file
include_once("../class/Model.php");
$Model = new Model();

if(isset($_REQUEST['Manufacture']) && isset($_REQUEST['Model']) && isset($_REQUEST['Model_count'])) {	
	$Manufacture_id = $Model->escape_string($_POST['Manufacture']);	
	$Models = $Model->escape_string($_POST['Model']);	
	$Model_count = $Model->escape_string($_POST['Model_count']);	
	
	$result = $Model->execute_query("INSERT INTO `models`(`manufacture_id`, `model_name`, `model_count`) VALUES('$Manufacture_id','$Models','$Model_count')");
		
    if($result)
		{
		echo "success";
	   }else{
		echo "failed";
	}
	
}
?>