    <?php
    // echo "Content-Type: text/plain";
    //header("Content-Type: text/plain"); //para responder em texto e não HTML para o ESP32

    $servername = "localhost";
    $username = "";
    $password = "";
    $dbname = "";
    
    // $servername = "localhost";
    //$username = "root";
    //$password = "";
    //$dbname = "piv";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Conexão com o Banco falhou: " . $conn->connect_error);
    }
    //Selecionar a Planta
    $sql = "SELECT * FROM cadplanta where Flag = 'S' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // exibe os dados do banco 
        while ($row = $result->fetch_assoc()) {
            //respondendo apenas o ultimo valor do tempo do LED na tabela dadosled 
            echo "".$row["id"].",";
            echo "".$row["nome"].",";
            echo "".$row["porcentagem"];
        }
    } else {
        //se não tem dados no servidor
        echo "nada";
    }
        $conn->close();
    ?>
