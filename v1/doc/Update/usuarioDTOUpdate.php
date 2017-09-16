<html lang="PT-BR">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
    
    <div
        <p>Este exemplo é para atualização de um cadastro por vez, 
            este serviço atualiza apenas um por vez,
            caso não passe o último paramentro não atualizará.
        </p>
         
        <form method='POST' action='usuarioDTOUpdate.php'>
            <label>Chave de acesso: </label>
            <input type="text" name='CHAVE' value='12345'>
            <label> Nome: </label>
            <input type="text" name='NOMEUSUARIO' value='' placeholder="">
             <label>Login: </label>
            <input type="text" name='LOGINUSUARIO' value='' placeholder="">
            <label>Senha: </label>
            <input type="text" name='SENHAUSUARIO' value='' placeholder="">
            <label>ID: </label>
            <input type="text" name='IDUSUARIO' value='' placeholder="">
            <input type='submit' name='updateUsuario' value='Atualizar Usuarios'></>
        </form>
    </div>
    <div style="border: 1px solid black;height: 300px">
        <?php
            if (isset($_POST['updateUsuario'])){
                //Consumindo meu web service                    
                $arr['CHAVE']=$_POST['CHAVE'];                 
                $arr['CHAMADA']='UPDATEUSUARIODTO'; 
                $arr['NOMEUSUARIO'] = $_POST['NOMEUSUARIO']; 
                $arr['LOGINUSUARIO'] = $_POST['LOGINUSUARIO']; 
                $arr['SENHAUSUARIO'] = $_POST['SENHAUSUARIO']; 
                $arr['IDUSUARIO'] = $_POST['IDUSUARIO']; 
                $json = json_encode($arr);                    
                $json= str_replace(' ','+',$json);
                //echo $json;
                $url= "http://www.devjan.esy.es/ws_app/v1/?action=$json";
                echo "     EXEMPO DE LINK PARA REQUISIÇÃO ".$url;
                echo '<br><br>';                 
                
                try {
                   $jsonData = file_get_contents($url);
                     echo $jsonData;
                } catch (Exception $e) {
                    // Deal with it.
                    echo "Error: " . $e->getMessage();
                }                
            }
        ?>
    </div>
    
    
    <a href='../index.php'>Principal</a>   
    </body>
</html>