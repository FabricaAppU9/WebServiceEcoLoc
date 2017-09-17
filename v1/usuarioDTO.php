<?php

if (isset($_GET['CHAVE'])){
    if ($_GET['CHAVE'] == '12345'){
       if ($_GET['CHAMADA']=='CRIARUSUARIODTO'){
            include_once './class/usuariosDTO.class.php';                
            $usuarioDTO = new usuariosDTO('0');                
            $usuarioDTO->setNome($_GET['NOME']); 
            $usuarioDTO->setLogin($_GET['LOGIN']);
            $usuarioDTO->setSenha($_GET['SENHA']);
               
            if ($usuarioDTO->salvar()>0)
                echo '{"RETORNO":"SUCESSO", "ID":"'.$usuarioDTO->getIDUsuario().'"}';
            else
                echo '{"RETORNO":"NÃO CADASTADO"}';
           
       }elseif ($_GET['CHAMADA']=='UPDATEUSUARIODTO') {
             include_once './class/usuariosDTO.class.php'; 
             //echo $_GET['IDUSUARIO'];
            $usuarioDTO = new usuariosDTO($_GET['IDUSUARIO']);
            $usuarioDTO->setNome($_GET['NOME']); 
            $usuarioDTO->setLogin($_GET['LOGIN']);
            $usuarioDTO->setSenha($_GET['SENHA']);
            
            if ($usuarioDTO->salvar()>0)
                echo '{"RETORNO":"ATUALIZADO COM SUCESSO"}';
            else
                echo '{"RETORNO":"NãO ATUALIZADO"}';
            
       }elseif ($_GET['CHAMADA']=='GETUSUARIOSDTO') {             
            include_once './class/usuariosDTO.class.php';
            $usuarioDTO = new usuariosDTO();
            if(isset($_GET['PARAM']))
                $usuarioDTO->setParam($_GET['PARAM']);    
            echo $_GET['PARAM'];
            echo $usuarioDTO->getusuariosDTO();
       }else{
        echo '{"RETORNO":"CHAMADA NÃO ENCONTRADA"}';   
       }
        
        
        
    } else {
        echo '{"RETORNO":"CHAVE DE ACESSO INVALIDO"}';
    }
}

