<?php
//including the database connection file
include_once("../class/Model.php");
$Model = new Model();

if(isset($_REQUEST['model_id']) && isset($_REQUEST['model_count'])) {	
	$model_id = $Model->escape_string($_POST['model_id']);	
	$model_count = $Model->escape_string($_POST['model_count']);	
    $updated_count=$model_count-1;
    $result = $Model->execute_query("UPDATE `models` SET `model_count`='$updated_count' WHERE `model_id`='$model_id' ");
		
    if($result)
		{
		echo "success";
	   }else{
		echo "failed";
	}
	
}
?>