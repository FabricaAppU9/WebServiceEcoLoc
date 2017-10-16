<?php

if (isset($_GET['CHAVE'])){
    if ($_GET['CHAVE'] == '12345'){
       if ($_GET['CHAMADA']=='CRIARPONTO'){
            include_once './class/Pontos.class.php';
                $ponto = new pontos(); 
                $ponto->setDescricao($_POST[$CALLDecode->DESCICAO]);
                $ponto->setLatitude($_POST[$CALLDecode->LATITUDE]);
                $ponto->setLongitude($_POST[$CALLDecode->LONGITUDE]);
                if ($ponto->salvar()){
                    echo '{"RETORNO":"SUCESSO", "CODIGO":"'.$ponto->getNovoCodigo().'"}';
                }else{
                    echo '{"RETORNO":"N�O CADASTADO"}';
                }           
       }elseif ($_GET['CHAMADA']=='UPDATEPONTO') {
            include_once './class/Pontos.class.php';
            $ponto = new pontos($_GET['IDUSUARIO']); 
            $ponto->setDescricao($_POST[$CALLDecode->DESCICAO]);
            $ponto->setLatitude($_POST[$CALLDecode->LATITUDE]);
            $ponto->setLongitude($_POST[$CALLDecode->LONGITUDE]);
            if ($ponto->salvar())            
                echo '{"RETORNO":"ATUALIZADO COM SUCESSO"}';
            else
                echo '{"RETORNO":"NãO ATUALIZADO"}';
            
       }elseif ($_GET['CHAMADA']=='GETPONTOS') {             
          include_once './class/Pontos.class.php';
          $ponto = new $pontos();            
          echo $ponto->getPontos();              
       }else
        echo '{"RETORNO":"CHAMADA NÃO ENCONTRADA"}';         
    }else 
       echo '{"RETORNO":"CHAVE DE ACESSO INVALIDO"}';
    
}

