<html lang="PT-BR">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
	<body>
    <div>
        <form method='POST' action='pontosCreate.php'>
        <label>Chave de acesso</label>
        <input type="text" name='CHAVE' value='12345'>
        <label>Descricao:</label>    
        <input type="text" name="DESCRICAO" value="" placeholder="">
        <label>Latitude:</label>
        <input type="text" name="LATITUDE" value="" placeholder="">
        <label>Longetude:</label>
        <input type="text" name="LONGETUDE" value="" placeholder="">
        
        <input type='submit' name='btnSalvar' value='Gravar Ponto'></>
    </form>
    </div>
    <div style="border: 1px solid black;min-height: 300px">
        <?php
                   if (isset($_POST['btnSalvar'])){
               
                    //Consumindo meu web service
                    
                    $arr['CHAVE']=$_POST['CHAVE'];                 
                    $arr['CHAMADA']=$_POST['CRIARPONTO'];                 
                    $arr['DESCRICAO']= 'DESCRICAO';                   
                    $arr['LATITUDE']= 'LATITUDE';                   
                    $arr['LONGETUDE']= 'LONGETUDE';                   
                                
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