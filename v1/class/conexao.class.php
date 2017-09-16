<?php

class conexao {
    private $user= 'u787190517_app';
    private $pass= '123456';
    private $dbname ='u787190517_app';
    private $servidor='localhost';
    private $dns = '';
    public function Conexao() {
		try {
			$pdo = new PDO("mysql:host=$this->servidor;dbname=$this->dbname;charset=UTF8;",  $this->user,  $this->pass);
			return $pdo;
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}       
	}
}
