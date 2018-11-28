<?php 
include ("config.php");
class DB{



	public $db;


	function __construct()
	{
		try {
	 $this->db=new PDO("mysql:dbname=".DB.";host=".HOST, USER, PASSWORD);
			} catch (PDOException $e) {
	 echo 'Подключение не удалось: ' . $e->getMessage();
	return 0;
		}		
	}



	public getValue($ColumnName, $TableName, $Condition=array()){
		$result=array();
		foreach ($Condition as $key => $value ) {		
		$sth=$this->db->prepare('SELECT ? FROM ? WHERE ? = ?');
		$sth->execute(array($ColumnName,$TableName,{$key},{$value}));
		$result+=$sth->fetch();
		}
		return $result;
	}

}

 ?>