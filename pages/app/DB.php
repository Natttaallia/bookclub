<?php 
namespace App;
include ("config.php");
class DB
{

	public $db;


	function __construct()
	{
		try {
	 $this->db=new \PDO("mysql:dbname=".DB.";host=".HOST, USER, PASSWORD);
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
		$sql='SELECT ';
		foreach ($Column_names as $value ) {
		$sql.=$value. ', ';		
		}
		$sql=substr($sql, 0, -2);
		$sql.=.' FROM '.$TableName.' WHERE ';
		foreach ($Condition as $key => $value ) {
		$sql.=$key.' = '.$value. ' AND ';		
		}
		$sql=substr($sql, 0, -5);
		$sth=$this->db->query($sql);		
		$result= $sth->fetchAll();
		return $result;

	}

}

 ?>