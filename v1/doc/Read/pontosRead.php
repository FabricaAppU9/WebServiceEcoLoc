<html lang="PT-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <div>
            <form method='POST' action='pontosRead.php'>
                <label>Chave de acesso</label>
                <input type="text" name='CHAVE' value='12345'>				
                <label>informe um ID: </label>
                <input type="text" name='PARAM' value='' placeholder="A0001,A0002">
                <input type='submit' name='getPontos' value='Listar pontos'></>
            </form>
        </div>
        <div style="border: 1px solid black;height: 300px">
            <?php
                if (isset($_POST['getPontos'])){

                    //Consumindo meu web service

                
                    $url = 'CHAVE='.$_POST['CHAVE'];                 
                    $url = $url.'&CHAMADA='.'GETPONTOS'; 
                    $url = $url.'&PARAM=' . $_POST['PARAM']; 

                    //echo $json;
                    $url2= "http://devjan.esy.es/ws_app/v1/ponto.php?$url";
                    echo "     EXEMPO DE LINK PARA REQUISIÇÃO ".$url2;
                    echo '<br><br>';                 

                    try {
                       $jsonData = file_get_contents($url2);
                       echo $jsonData;
                    } catch (Exception $e) {
                            // Deal with it.
                            echo "Error: " , $e->getMessage();
                    }                
                }
                ?>
        </div>
        <a href='../index.php'>Principal</a>  
	</body>		
</html>