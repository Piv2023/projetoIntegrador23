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
        $porcentagem = $_POST['porcentagem'];
        $nomePlanta  = $_POST['nome'];
        $sql = "INSERT INTO cadplanta (nome,porcentagem) VALUES ('$nomePlanta', '$porcentagem')";
        if ($conn->query($sql) === TRUE) {
           // echo "Registro Gravado com Sucesso" ." - ";
           echo  '<meta http-equiv="refresh" content="0;url=cadok.html">';
            // header('Location: cadok.html');
            exit;
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        ?>
        
    </body>
    </html>