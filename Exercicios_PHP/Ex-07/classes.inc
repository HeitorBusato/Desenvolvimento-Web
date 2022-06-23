<?php
class Usuario{
	var $nome;
	var $email;
	var $senha;
	var $dataLogin;
	
	function getNome(){
		return $this->nome;
	}
	
	function getSenha(){
		return $this->senha;
	}
	function getdata(){
		return  $this->dataLogin;
	}
	
	function setData($data){
		$this->dataLogin = $data;
	}
	
	function Usuario ($nome, $email, $senha) {
	$this.nome = $nome;
	$this.email = $email;
	$this.senha = $senha;
	}
	function validarSenha($senha){
		if(strlen(trim($senha)) != 6){
			echo "A Senha deve conter seis caracteres!";
		}
	}
	function validarLogin($login){
		$x = after('.com.',$login);
		$y = after('.',$login);
		$z = before('@',$login);
		if((strcmp($x,"br") == 0) && (strcmp($y,"br") == 0) && ($z != "") && (data('m',$dataLogin) != NULL)){
			return 1;
		}else{
			return 0;
		}
	}
	function efetuarLogin($login, $senha){
		$pass = getSenha();
		if((validarLogin($login) == 1) && (strcmp($pass,$senha) == 0){
			$dataLogin = data('d/m/Y');
			setData($dataLogin);
			echo "Bem Vindo!"." ". "Login realizado em: " ." ". $dataLogin;
		}else{
			echo "Login Incorreto! Tente Novamente...";
		}
	}
	
}
?>