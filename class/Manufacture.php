<?php
include_once 'Database.php';
class Manufacture extends Database
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_manufacture_data($query)
	{		
		$result = $this->connection->query($query);
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
		
	public function execute_query($query) 
	{
		$result = $this->connection->query($query);
		
		if ($result == false) {
			echo 'Error: cannot execute the command';
			return false;
		} else {
			return true;
		}		
	}
	
	public function delete_manufacture($id, $table) 
	{ 
		$query = "DELETE FROM $table WHERE manufacture_id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			return false;
		} else {
			return true;
		}
	}
	


	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}
}
?>