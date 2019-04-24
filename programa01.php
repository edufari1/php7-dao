<?php

class veiculos{

public $marca;
private $modelo;
private $cor;
private $km_acum;

public function descricao(){


	return "dados do veículo: marca- ".$this->marca;

}

}
$palio-new veiculos();
$palio->$marca = "Fiate Palio";
echo $palio->descricao();


?>