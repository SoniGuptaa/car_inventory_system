<?php
class Database 
{	
	private $_host = 'localhost';
	private $_username = 'a2zmcj3u_car';
	private $_password = 'a2zmcj3u_invertory';
	private $_database = 'a2zmcj3u_invertory';
	
	protected $connection;
	
	public function __construct()
	{
		if (!isset($this->connection)) {
			
			$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
			
			if (!$this->connection) {
				echo 'Cannot connect to database server';
				exit;
			}			
		}	
		
		return $this->connection;
	}
}
?>