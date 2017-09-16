<?php
include_once 'conexao.class.php';

class Pontos {
    private $id;
    private $descricao;
    private $latitude;
    private $longitude;

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    public function Salvar(){
        return true;
    }

    public function getPontos() {
        $cnn = new conexao();
        $result= $cnn->Conexao()->query("SELECT * FROM pontos");
        //resut set alimentado para retornar o json
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $tr[] = $row;
        }
        return json_encode($tr, true);
    }
}
