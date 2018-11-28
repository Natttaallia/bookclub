<?php 
include ("config.php");
class DB
{

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



	public function getValue($ColumnName, $TableName, $Condition=array()){
		$result=array();
		foreach ($Condition as $key => $value ) {
		$sql='SELECT '.$ColumnName.' FROM '.$TableName.' WHERE '.$key.' = '.$value;
		$sth=$this->db->query($sql);		
		$b= $sth->fetch();
		array_push($result, $b[$ColumnName]);			
		}
		return $result;
	}

}

 ?>