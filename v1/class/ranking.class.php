<?php
include_once 'conexao.class.php';

class ranking {
    private $idUsuario;
    private $pontuacao;
    private $param;
    private $SQL;
    private $cnn;
    public function setparam(){
        
    }
    
   
    public function getRanking() {
        $cnn = new conexao();
        $result= $cnn->Conexao()->query("SELECT * FROM ranking");
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $tr[] = $row;
        }
        return json_encode($tr, true);
    }
    public function salvar() {
        if ($this->idUsuario=='-1'){
            $this->getCodigoCurso();
            $this->SQL = "INSERT INTO ranking values('$this->idUsuario', '$this->$pontuacao')";
            $result = $this->cnn->Conexao()->prepare($this->SQL);
            if ($result->execute()>0){
                return true;
            }else{
                return false;
            }
        }
        
    }

	private function getPontuacao() {
        $result= $this->cnn->Conexao()->prepare("SELECT * FROM cursos ORDER BY ranking DESC LIMIT 1");
	$result->execute();
		 
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_OBJ)){
            $codigo= $row;
        }
       // $this->$idUsuario = 'C'.str_pad((int)substr($idUsuario->CODCURSO,1)+1, 4, '0', STR_PAD_LEFT);        
    }
    public function getNovoCodigo(){
    return $this->codCurso;
    }
}
