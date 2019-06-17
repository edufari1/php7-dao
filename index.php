<?php 
require_once("config.php");

//$sql = new sql();

//$usuarios=$sql->select("SELECT * FROM tb_usuarios");

$root = new usuario();

$root->loadById(2);

//
//echo($root);

 ?>