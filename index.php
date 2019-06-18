<?php 
require_once("config.php");

//$sql = new sql();

//$usuarios=$sql->select("SELECT * FROM tb_usuarios");
// Carrega um único usuário
//$root = new usuario();
//$root->loadById(2);
//echo($root);

//carrega uma lista de usuários
//$root= Usuario::getLista();
//echo json_encode($root);

//carrega uma llista de usuarios buscando pelo login
//$search = Usuario::search("Ja");
//echo json_encode($search);

//carrega um ususário mediante login e senha
 $usuario = new Usuario();
 $usuario->login('Janilton','asdfa');
echo ($usuario);
 ?>