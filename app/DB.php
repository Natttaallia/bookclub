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

	public function setValue($ColumnName=array(), $TableName, $Values=array()){
	
		$sql=$this->slicesql('INSERT INTO '.$TableName.'(',$ColumnName,', ',-2);
		$sql.=$this->slicesql(') VALUES(',$Values,', ',-2);
		$sql.=')';
		$sth=$this->db->query($sql);
		return $result;
	}



	public function getValue($ColumnName, $TableName, $Condition=array()){
		$sql=$this->slicesqlcondition('SELECT '.$ColumnName.' FROM '.$TableName.' WHERE ',$Condition,' AND ',-5);
		$sth=$this->db->query($sql);		
		$result= $sth->fetchAll();
		return $result;
	}

	public function getData($Column_names=array(), $Condition=array(),$TableName, $start,$end){
		$sql=$this->slicesql('SELECT ',$Column_names,', ',-2);
		$sql.=' FROM '.$TableName;
		if(count($Condition)>0)
		$sql=$this->slicesqlcondition($sql.' WHERE ',$Condition,' AND ',-5);
		if(!is_null($start))$sql.=" LIMIT $start";
		if(!is_null($end))$sql.=", $end";
		$sth=$this->db->query($sql);		
		$result= $sth->fetchAll();
		
		return $result;

	}
	private function slicesql($sql,$arr,$str,$count){
		foreach ($arr as $value ) {
		$sql.=$value . $str;		
		}
		$sql=substr($sql, 0, $count);
		return $sql;
	}
	private function slicesqlcondition($sql,$arr,$str,$count){
		foreach ($arr as $key => $value ) {
		$sql.=$key.' = '.$value. $str;	
		}
		$sql=substr($sql, 0, $count);
		return $sql;
	}



}

 ?>