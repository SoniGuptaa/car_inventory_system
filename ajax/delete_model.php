<?php
//including the database connection file
include_once("../class/Model.php");
$Model = new Model();
//getting id of the data from url
$model_id = $Model->escape_string($_REQUEST['model_id']);
//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $Model->delete_model($model_id, 'models');
		
    if($result)
		{
		echo "success";
	   }else{
		echo "failed";
	}
	
?>
