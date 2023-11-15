<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>

    <header>

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
            
            
            
            $sql = "Select idPlanta, nome, hora, S.Porcentagem from read_sensor as S, cadplanta as P 
                   where S.idPlanta = P.id 
                   order by S.hora desc
                   limit 8";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result) > 0) {

                echo "<form id='register' style='max-width:450px; padding:1px;
                       margin: 5px'>";
                echo "<p style=padding:1px; margin:1px >Registros</p>";
                //echo '<input type="number" name="numero" id="numero">';


                echo "<table  style='font-size:12px'>";
                echo "<tr><th>Id</th><th>Nome</th><th>Hora</th><th>Umid.</th></tr>";
            
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["idPlanta"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    $datetime = $row["hora"];
                    $hora_formatada = date("d/m/Y H:i:s", strtotime($datetime));
                    echo "<td>" . $hora_formatada . "</td>";
                    echo "<td>" . $row["Porcentagem"] . '%' . "</td>";
                    echo "</tr>";
                }
            
                   echo "</table>";
                echo "</form>";

               } else {
                echo "Nenhum resultado encontrado.";
            }

             $conn->close();
    
             
        ?>


    
        <div class="bg-gradient">

            <div class="header-border">

                <div id="logo">
                    Univesp 
                </div>

                <nav class="menu">
                    <button type="button" class="open-menu"><i class="fas fa-bars"></i></button>
                    <div class="backdrop"></div>
                    <ul>
                        <li class="close-menu"><button type="button"><i class="fas fa-times"></i></button></li>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="cadastro.html">Cadastro</a></li>                        
                        <li><a href="registro.php">Registro</a></li>
                        <!--<li><a href="about.html">About</a></li> -->
                    </ul>
                </nav>

            </div>

        </div>

    </header>
    
    <section class="home">

        <main class="container">

            <div class="title">
                <h1>Lista de Registros</h1>
            </div>

        </main>

    </section>

    <footer>

        <div class="container">

            <p>Todos os direitos reservados</p>

            <nav class="menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="cadastro.html">Cadastro</a></li>                        
                    <li><a href="registro.php">Registro</a></li>
             
                </ul>
            </nav>

        </div>

    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>