<?php
include_once 'conexao.class.php';

class Pontos {
    private $id;
    private $descricao;
    private $tipoMaterial;
    private $latitude;
    private $longitude;
    private $param;
    private $SQL;
    
    function getTipoMaterial() {
        return $this->tipoMaterial;
    }

    function setTipoMaterial($tipoMaterial) {
        $this->tipoMaterial = $tipoMaterial;
    }

        public function __construct($ID = "") {
        $this->cnn = new conexao();

        $this->SQL = "SELECT * FROM Pontos WHERE id = ".$ID;
        //echo $this->SQL;
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
    
    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }
    public function getPontos() {
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
         
        $cnn = new conexao();
        $result= $cnn->Conexao()->query("SELECT * FROM Pontos ".$where);
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $tr[] = $row;
        }
        return json_encode($tr, JSON_PRETTY_PRINT);
    }
    
     public function setParam($param){
        if ($param<>'')
            $this->param = explode(',',$param);
        else
            $this->param = '';
    }
    
    public function salvar() {
        if ($this->id == '-1'){           
            $this->SQL = "INSERT INTO Pontos(id,descricao,tipomaterial,latitude,longitude) VALUES('-1','$this->descricao','$this->tipoMaterial','$this->latitude','$this->longitude')";
            //echo $this->SQL;
            $result = $this->cnn->Conexao()->prepare($this->SQL);
            $result->execute();            
        }else{
            $this->SQL = "UPDATE  Pontos SET descricao = '$this->descricao','tipomaterial=$this->tipoMaterial', latitude='$this->longitude', longitude='$this->latitude' WHERE ID='$this->id'";
            //echo $this->SQL;
            $result = $this->cnn->Conexao()->prepare($this->SQL);
            $result->execute();
        }        
            return $result->rowCount();
    }
    public function getIDPonto(){
        $result = $this->cnn->Conexao()->prepare("SELECT ID FROM Pontos  ORDER BY id DESC LIMIT 1");
	$result->execute();		 
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_OBJ)){
            $codigo= $row;
        }    
       return  $codigo->ID;    
    }

    public function deletarPonto($IDPonto) {        
        $result= $this->cnn->Conexao()->prepare("DELETE FROM Pontos WHERE id = ".$IDPonto);
        $result->execute();
        if ($result->rowCount()>0)
            return true;
        else        
             return false;        
    }
}
