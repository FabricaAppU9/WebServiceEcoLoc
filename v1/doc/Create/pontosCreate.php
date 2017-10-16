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
                $url = "CHAVE=" . $_POST['CHAVE'];                 
                $url = $url . "&CHAMADA=". "CRIARPONTO"; 
                $url = $url . "&DESCRICAO=" . $_POST["DESCRICAO"]; 
                $url = $url . "&LATITUDE=" . $_POST["LATITUDE"]; 
                $url = $url . "&LONGETUDE=". $_POST["LONGETUDE"];
            
                $url2= "http://devjan.esy.es/ws_app/v1/ponto.php?".$url;
                echo "     EXEMPO DE LINK PARA REQUISIÇÃO <br>";
                echo $url2;
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