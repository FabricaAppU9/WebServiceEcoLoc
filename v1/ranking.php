<?php

if (isset($_GET['CHAVE'])){
    if ($_GET['CHAVE'] == '12345'){
       if ($_GET['CHAMADA']=='CRIARRANKING'){
            include_once './class/ranking.class.php';
               
            if ($usuarioDTO->salvar()>0)
                echo '{"RETORNO":"SUCESSO", "ID":"'.$usuarioDTO->getIDUsuario().'"}';
            else
                echo '{"RETORNO":"NÃO CADASTADO"}';
           
       }elseif ($_GET['CHAMADA']=='UPDATERANKING') {
           include_once './class/ranking.class.php';
            
            if ($usuarioDTO->salvar()>0)
                echo '{"RETORNO":"ATUALIZADO COM SUCESSO"}';
            else
                echo '{"RETORNO":"NãO ATUALIZADO"}';
            
       }elseif ($_GET['CHAMADA']=='GETRANKING') {             
             include_once './class/ranking.class.php';
                $ranking = new ranking();
                echo $ranking->getRanking();
       }else{
        echo '{"RETORNO":"CHAMADA NÃO ENCONTRADA"}';   
       }
    } else {
        echo '{"RETORNO":"CHAVE DE ACESSO INVALIDO"}';
    }
}

