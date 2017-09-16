<html lang="PT-BR">
	 <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
	<body>
    <div>
        <form method='POST' action='rankingCreate.php'>
        <label>Chave de acesso</label>
        <input type="text" name='CHAVE' value='12345'>
            
        <label>idUsuario</label>
		<input type='text' name='IDUSUARIO' value='' placeholder="">
		<label> Pontuacao: </label>
        <input type="text" name='PONTUACAO' value='' placeholder="">
        <input type='submit' name='getPontuacao' value='Lista de Ranking'></>
    </form>
    </div>
    <div style="border: 1px solid black;min-height: 300px">
        <?php          

            if (isset($_POST['getPontuacao'])){
               
                //Consumindo meu web service
                    
                $arr['CHAVE']=$_POST['CHAVE'];                 
                $arr['CHAMADA']= 'CRIARRANKING'; 
		$arr['IDUSUARIO']= 'IDUSUARIO';
		$arr['PONTUACAO']= 'PONTUACAO';
		
                $json = json_encode($arr);
                    
                    
                //echo $json;
                $url= "http://devjan.ddns.net:1234/ws_app/v1/?action=$json";
                echo "     EXEMPO DE LINK PARA REQUISIÇÃO ".$url;
                echo '<br><br>';                 

                try {
                   $jsonData = file_get_contents($url);
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