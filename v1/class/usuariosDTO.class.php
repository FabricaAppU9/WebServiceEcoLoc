<?php
include_once 'conexao.class.php';

class usuariosDTO {
    private $param ="";
    public $id;
    private $nome="";
    private $login="";
    private $senha ="";
    private $cnn="";
    private $SQL = "";
    
    public function __construct($ID = "") {
        $this->cnn = new conexao();

        $this->SQL = "SELECT * FROM UsuarioDTO WHERE id = ".$ID."";
       // echo $this->SQL;
        $result = $this->cnn->Conexao()->prepare($this->SQL);
        $result->execute();
        if($result->rowCount()>=1){
            $this->id= $ID;
           /* while ($row =$result->fetch(PDO::FETCH_OBJ)){
                $this->login = $row->lOGIN;
                $this->senha = $row->SENHA;
                $this->nome = $row->NOME;
                $this->id= $row-ID;
            }*/
        }else{
            $this->id= '-1';
        }
    }
    
    function setLogin($login) {
        $this->login = $login;
    }
    public function setnome($Nome){
      $this->nome=$Nome;
    }
    public function setSenha($Senha){
        $this->senha=$Senha;
    }

    public function getusuariosDTO() {        
        $in='';
        if($this->param <>''){          
            foreach ($this->param as $key => $value) {
            $in.= "'$value'," ; 
            }            
            $size = strlen($in);
            $in = substr($in, 0,-1);   
            $where = " WHERE id IN($in)";    
        }else
            $where='';        
         
        $result= $this->cnn->Conexao()->prepare("SELECT * FROM UsuarioDTO ".$where);
		 $result->execute();
		 
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $tr[] = $row;
        }
        return json_encode($tr, true);
    }
    public function setParam($param){
        if ($param<>'')
            $this->param = explode(',',$param);
        else
            $this->param = '';
    }
    
    public function salvar() {
        if ($this->id == '-1'){           
            $this->SQL = "INSERT INTO UsuarioDTO(id,nome,login,senha) VALUES('-1','$this->nome','$this->login','$this->senha')";
            //echo $this->SQL;
            $result = $this->cnn->Conexao()->prepare($this->SQL);
            $result->execute();            
        }else{
            $this->SQL = "UPDATE  UsuarioDTO SET NOME = '$this->nome', SENHA='$this->senha', LOGIN='$this->login' WHERE ID='$this->id'";
            //echo $this->SQL;
            $result = $this->cnn->Conexao()->prepare($this->SQL);
            $result->execute();
        }        
            return $result->rowCount();
    }
    public function getIDUsuario(){
         $result= $this->cnn->Conexao()->prepare("SELECT ID FROM UsuarioDTO  ORDER BY id DESC LIMIT 1");
		 $result->execute();
		 
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_OBJ)){
            $codigo= $row;
        }    
       return  $codigo->ID;    
    }

    public function deletarUsuario($idUsuario) {
        $result= $this->cnn->Conexao()->prepare("DELETE FROM UsuarioDTO WHERE id = ".$idUsuario);
        $result->execute();
        if ($result->rowCount()>0)
            return true;
        else        
             return false;
        
    }
    
}
