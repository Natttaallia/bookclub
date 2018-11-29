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

		$sql='SELECT '.$ColumnName.' FROM '.$TableName.' WHERE ';
		foreach ($Condition as $key => $value ) {
		$sql.=$key.' = '.$value. ' AND ';		
		}
		$sql=substr($sql, 0, -5);
		$sth=$this->db->query($sql);		
		$result= $sth->fetchAll();
		return $result;
	}

	public function getData($Column_names=array(), $Condition=array(),$TableName){
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