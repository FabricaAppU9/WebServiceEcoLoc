<?php

if (isset($_GET['CHAVE'])){
    if ($_GET['CHAVE'] == '12345'){
       if ($_GET['CHAMADA']=='CRIARPONTO'){
            include_once './class/Pontos.class.php';
                $ponto = new Pontos(); 
                $ponto->setDescricao($_GET['DESCRICAO']);              
                $ponto->setLatitude($_GET['LATITUDE']);
                $ponto->setLongitude($_GET['LONGETUDE']);
                $ponto->setIdUsuario($_GET['IDUSUARIODTO']);
                if ($ponto->salvar()){
                    echo '{"RETORNO":"SUCESSO", "CODIGO":"'.$ponto->getIDPonto().'"}';
                }else{
                    echo '{"RETORNO":"NÃO CADASTADO"}';
                }           
       }elseif ($_GET['CHAMADA']=='UPDATEPONTO') {
            include_once './class/Pontos.class.php';
            $ponto = new Pontos($_GET['IDPONTO']); 
            $ponto->setDescricao($_GET['DESCRICAO']);            
            $ponto->setLatitude($_GET['LATITUDE']);
            $ponto->setLongitude($_GET['LONGITUDE']);
            $ponto->setIdUsuario($_GET['IDUSUARIODTO']);
            if ($ponto->salvar())            
                echo '{"RETORNO":"ATUALIZADO COM SUCESSO"}';
            else
                echo '{"RETORNO":"NãO ATUALIZADO"}';
            
       }elseif ($_GET['CHAMADA']=='GETPONTOS') {             
          include_once './class/Pontos.class.php';
          $ponto = new Pontos();  
          if(isset($_GET['PARAM']))
             $ponto->setParam($_GET['PARAM']);   
        
          echo $ponto->getPontos();              
         
       }
       elseif ($_GET['CHAMADA']=='DELETEPONTO') {             
          include_once './class/Pontos.class.php';
          $ponto = new Pontos();  
          if ($ponto->deletarPonto($_GET['IDPONTO']))
            echo '{"RETORNO":"PONTO DELETADO"}';
          else 
            echo '{"RETORNO":"PONTO NÃO DELETADO"}';    
          
        }else
        echo '{"RETORNO":"CHAMADA NÃO ENCONTRADA"}';         
    }else 
       echo '{"RETORNO":"CHAVE DE ACESSO INVALIDO"}';
    
}

