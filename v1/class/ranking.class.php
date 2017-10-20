<?php
include_once 'conexao.class.php';

class ranking {
    private $idUsuario;
    private $pontuacao;
    private $param;
    private $SQL;
    private $cnn;
            
    public function __construct() {
        $this->cnn = new conexao();  
    }
   function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setPontuacao($pontuacao) {
        $this->pontuacao = $pontuacao;
    }
    public function getRanking() {
        $cnn = new conexao();
        $result= $cnn->Conexao()->query("SELECT U.NOME,SUM(R.pontuacao) as PONTUACAO FROM Ranking R
                                        INNER JOIN UsuarioDTO U on U.id = R.idUsuario
                                        group by U.nome");
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $tr[] = $row;
        }
        return json_encode($tr, true);
    }
    public function salvar() {
               
        $this->SQL = "INSERT INTO Ranking(idUsuario,pontuacao) values($this->idUsuario, $this->pontuacao)";
        //echo $this->SQL;
        $result = $this->cnn->Conexao()->prepare($this->SQL);
        if ($result->execute()>0){
            return true;
        }else
            return false;            
                
    }

    private function getPontuacao() {
        $result= $this->cnn->Conexao()->prepare("SELECT * FROM Ranking ORDER BY idUsuario DESC LIMIT 1");
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
