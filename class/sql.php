<?php 

class Sql extends PDO {

	private $conn;

	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7","root","");
	}

	private function setParams ($statement,$parameters=array()){
		/*print_r($parameters);
		echo'<br>';
		var_dump($statement);
		echo'<br>';
		var_dump($parameters);*/
		foreach ($parameters as $key => $value){
			//echo "função setParams  ";
			//echo $key;
			//echo $value;

			$this->setParam($statement,$key,$value);

		} 

	}

	private function setParam($statement, $key, $value){
		/*echo "função setParam";
		echo $key;
		echo $value;*/      
		$statement->bindParam($key, $value); 


	}

	public function query($rawQuery, $params= array()){

		$stmt = $this->conn->prepare($rawQuery);
		var_dump($stmt);
		echo "<br>";
		var_dump($params);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;
		
	}

	public function select($rawQuery, $params=array()):array
	{
		//print_r ($params);
		$stmt =$this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);


	}

}


 ?>
