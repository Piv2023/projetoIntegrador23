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
            
            $sql = "Select * from cadplanta";
            $result = mysqli_query($conn,$sql);
            $idSelecionado = 0;           

            if (mysqli_num_rows($result) > 0) {

                echo "<form id='register' method='post'>";
                
                echo "<table>";
                echo "<tr>
                        <th>
                           <label for='opcoes'>Selecione</label>
                        </th>
                        <th>
                            <select name='idP' id='opcoes'>";  
                                while ($row = mysqli_fetch_assoc($result)) {
                                      echo "<option value= " . $row["id"] . ">" .  $row["nome"] .  "</option>" ;    
                                }
                                
                                
                                
                     }
              
                     
                     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Obtenha o valor selecionado na lista suspensa
                            $idSelecionado = $_POST['idP'];
                            echo "<p>" . $idSelecionado . "</p>";           
                                
                    echo "    </select>
                        </th>
                        <th>
                          <input type='submit' value='Enviar'>
                        </th>
                     </tr>";
                 echo "</table>";
                 
              
                
                // echo "<p>". $idSelecionado. "</p>";
                 
                if ($idSelecionado != 0) {
                  $sql = "UPDATE cadplanta SET Flag = Null";
                 $result = mysqli_query($conn,$sql); 
                 $sql = 'UPDATE cadplanta SET Flag = "S" WHERE ID=' . $idSelecionado;
                 $result = mysqli_query($conn,$sql); 
                }
                 
                $sql = "Select * from cadplanta";
                 
                 
                 

                $result = mysqli_query($conn,$sql);

                echo "<table>";
                echo "<tr><th>Id</th><th>Nome</th><th>Umid.</th><th>Flag</th></tr>";
            
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["porcentagem"] . '%' . "</td>";
                    echo "<td>" . $row["Flag"] . "</td>";
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
                    
                    </ul>
                </nav>

            </div>

        </div>

    </header>
    
    <section class="home">

        <main class="container">

            <div class="title">
                <h1>Lista de Plantas Cadastradas</h1>
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