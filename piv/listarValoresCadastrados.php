<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso IoT com ESP32 e PHP - Listagem</title>
</head>

<body>
    <h1>Listagem da Tabela dadosLED</h1>
    <?php
    //Código retirado de: https://www.w3schools.com/php/php_mysql_select.asp
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "minhaiot";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //comando select na ordem decrescente pelo id
    $sql = "SELECT * FROM dadosled order by id desc";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - Tempo LED: " . $row["valorled"] . ", Data: " . $row["data"] .  ", Hora: " . $row["data"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>

</html>