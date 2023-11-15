<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe dados por &_GET</title>
</head>
<body>
    <?php 
        //as variaveis da URL capturada por GET
        $Sensor = test_input($_GET["ss"]);
        $valor  = test_input($_GET["vl"]);
        $tensao = test_input($_GET["ts"]); 
        $valort = test_input($_GET["vt"]); 

        $porc = test_input($_GET['pc']);
        $valorpc = test_input($_GET['vp']);

        $idPlanta = test_input($_GET["idp"]); 
        $valorid = test_input($_GET["vid"]);         
        //$website = test_input($_GET["st"]);
        //$comment = test_input($_GET["co"]);
        //$gender = test_input($_GET["sx"]);
       

        // Parte retirada do link: https://www.w3schools.com/php/php_mysql_insert.asp
            
        
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "piv";
                
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        date_default_timezone_set('America/Sao_Paulo');
        $Hora = date('YmdHis');
       
         $sql = "INSERT INTO read_sensor (leitura,tensao,idPlanta,hora,Porcentagem) VALUES 
                                         ($valor, $valort,$valorid, $Hora,$valorpc)";

        if ($conn->query($sql) === TRUE) {
            echo "Registro Gravado com Sucesso" ." - " .  $Hora;
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    
        //função importantissima para garantir a segurança do envio dos dados e vitar ataques Hacker
        //SEMPRE UTILIZAR
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        
    </body>
    </html>