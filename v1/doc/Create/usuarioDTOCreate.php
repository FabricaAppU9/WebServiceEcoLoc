<html lang="PT-BR">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
    
    <div
        <p>Este exemplo é para criar  um cadastro</p>
         
        <form method='POST' action='usuarioDTOCreate.php'>
            <label>Chave de acesso: </label>
            <input type="text" name='CHAVE' value='12345'>
            <label> Nome: </label>
            <input type="text" name='NOME' value='' placeholder="">
            <label> Login: </label>
            <input type="text" name='LOGIN' value='' placeholder="">
            <label>Senha: </label>
            <input type="text" name='SENHA' value='' placeholder="">
            <input type='submit' name='btnGravar' value='Gravar usuario'></>
        </form>
    </div>
    <div style="border: 1px solid black;height: 300px">
        <?php
            if (isset($_POST['btnGravar'])){
                //Consumindo meu web service                    
                $arr['CHAVE']=$_POST['CHAVE'];                 
                $arr['CHAMADA']='CRIARUSUARIODTO'; 
                $arr["NOME"] = $_POST["NOME"]; 
                $arr['LOGIN'] = $_POST['LOGIN'];                
                $arr['SENHA'] = $_POST['SENHA'];                
                $json = json_encode($arr);                    
                $json= str_replace(' ','+',$json);
               
                $url= "http://devjan.esy.es/ws_app/v1/?action=$json";
                echo "     EXEMPO DE LINK PARA REQUISIÇÃO <br>".$url;
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