 <?php 

class Usuario{		
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario; 
	}
	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin; 
	}
	public function setDeslogin($value){
		$this->deslogin = $value;
	}
	public function getDessenha(){
		return $this->dessenha; 
	}
	public function setDessenha($value){
		$this->dessenha = $value;
	}
	public function getDtcadastro(){
		return $this->dtcadastro; 
	}
	public function serDtcadastro($value){
		$this->dtcadastro = $value;
	}
	public function loadById($id){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_ususarios WHERE idusuario=:ID", array(":ID",$id));
		//echo('id='.$id);
		//print_r($results);

		if (count($results)>0){

			$row=$results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));


		}

	}

	public static function getLista(){

		$sql=new sql();
		return $sql->select("SELECT * from tb_usuarios order by deslogin");
	}

	public static function search($login){

		$sql= new sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%".$login."%"));
	}

	public function login($login,$password){
		$sql = new sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			':LOGIN'=>$login,
			':PASSWORD'=>$password
		));

		if(count($results)>0){
			$row=$results[0];
			//print_r($results);

			$this->setIdusuario($results['idusuario']);
			$this->setDeslogin($results['deslogin']);
			$this->setDesseha($results['dessenha']);
			$this->setDtcadastro(new DateTime($results['dtcadastro']));
		}else{
			echo "linhas de results: <br>";
			echo(count($results));
			//throw new Exception("Usuaário ou senha inválidos");
		}
	}

	public function __toString(){

		return json_encode(array(
 			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y")

		));
	}
}

 ?>