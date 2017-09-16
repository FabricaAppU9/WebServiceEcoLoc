<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <div>
            <form method='POST' action='usuarioDTORead.php'>
                <label>Chave de acesso: </label>
                <input type="text" name='CHAVE' value='12345'>
                <label>informe um ID: </label>
                <input type="text" name='PARAM' value='' placeholder="1,2,3">
                <input type='submit' name='getUsuarios' value='Lista de Usuarios'></>
            </form>
        </div>
        <div style="border: 1px solid black;min-height: 300px">
            <?php
                if (isset($_POST['getUsuarios'])){
                    //Consumindo meu web service                    
                    $arr['CHAVE']=$_POST['CHAVE'];                 
                    $arr['CHAMADA']='GETUSUARIOSDTO'; 
                    $arr['PARAM'] = $_POST['PARAM']; 
                    $json = json_encode($arr);                    

                    //echo $json;
                    $url= "http://www.devjan.esy.es/ws_app/v1/?action=$json";
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