<?php

session_start();
$realMatches=[];
$stage=1;

if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    $sqlMatches = "SELECT * FROM real_result WHERE stage = $stage";
    $resultMatches = $mysqli->query($sqlMatches);
    $realMatches = $resultMatches->fetch_all(MYSQLI_ASSOC);
    
    $sqlTeams = "SELECT pot, team_a 
    FROM real_result  
    WHERE pot <> 'x'
    GROUP BY pot, team_a";
    $resultTeams = $mysqli->query($sqlTeams);
    $teams = $resultTeams->fetch_all(MYSQLI_ASSOC);

    $sqlQualifiers = "SELECT * FROM qualifiers_reales";
    $resultQualifiers = $mysqli->query($sqlQualifiers);
    $realQualifiers = $resultQualifiers->fetch_all(MYSQLI_ASSOC);
}
else{
    header("Location: login.php");
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Descrpcion para cuando se busque en google" />
    <title>Mundial Qatar 2022</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css"
        integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b1b45aac00.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="header">
        <nav>
            <a href="https://falconfarmsonline.com/" target="_blank"><img src="images/FFLogo.png" alt=""></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="marcador.php">Ingresar Resultados</a></li>
                    <li><a href="ranking.php">Tabla de Posiciones</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
        <?php
            echo('<h1>Marcadores Reales</h1>');
        ?>
        </div>
    </section>
    <div class="match">
        <div class="container">
        <?php
            echo('<div class="match-content">
                        <div class="column"></div>
                        <div class="column">
                            <br><p><strong>AQUI PUEDEN ENCONTRAR LOS RESULTADOS REALES DE LOS PARTIDOS</strong></p><br>
                        </div>
                </div>');
            foreach($realMatches as $realMatch){
                if($realMatch["pot"] !== 'x'){
                    echo('<div class="match-content">
                        <div class="column">
                            <div class="team team--home">
                                <div class="team-logo">
                                <img src="images/' . $realMatch["team_a"] . '.png" alt="' . $realMatch["team_a"] . '" height="100" width="140">
                                </div>
                                <h2 class="team-name">' . $realMatch["team_a"] . '</h2>
                            </div>
                        </div>
        
                        <div class="column">
                            <div class="match-details">
                                <div class="match-date">
                                        <strong>' . $realMatch["date"] . '</strong>
                                </div>
                                <div class="match-score">
                                    ' . $realMatch["goals_a"] . '
                                    <span class="match-score-divider">:</span>
                                    ' . $realMatch["goals_b"] . '
                                </div>
                                        
                                            <div>
                                            ' . $realMatch["winner"] . '
                                            </div>
                                        
                            </div>
                        </div>
                        <div class="column">
                            <div class="team team--away">
                                <div class="team-logo">
                                    <img src="images/' . $realMatch["team_b"] . '.png" alt="' . $realMatch["team_b"] . '" height="100" width="140">
                                </div>
                                <h2 class="team-name">' . $realMatch["team_b"] . '</h2>
                            </div>
                        </div>
                    </div>');
                }
            }
        
            foreach($realQualifiers as $realQualifier){

    
                echo('<div class="match-content">
                        <div class="column">
                            <strong>Grupo ' . $realQualifier["pot"] . ':' . '</strong>
                        </div>
        
                        <div class="column">
                            <div>
                                <strong>Primer puesto: '  . $realQualifier["first"] . '</strong>
                            </div>
                        </div>

                        <div class="column">
                            <div>
                                <strong>Segundo puesto: '  . $realQualifier["second"] . '</strong>
                            </div>
                        </div>
                    </div>');
            }

            foreach($realMatches as $realMatch){
                if($realMatch["pot"] === 'x'){
                    echo('<div class="match-content">
                        <div class="column">
                            <div class="team team--home">
                                <div class="team-logo">
                                <img src="images/' . $realMatch["team_a"] . '.png" alt="' . $realMatch["team_a"] . '" height="100" width="140">
                                </div>
                                <h2 class="team-name">' . $realMatch["team_a"] . '</h2>
                            </div>
                        </div>
        
                        <div class="column">
                            <div class="match-details">
                                <div class="match-date">
                                        <strong>' . $realMatch["date"] . '</strong>
                                </div>
                                <div class="match-score">
                                    ' . $realMatch["goals_a"] . '
                                    <span class="match-score-divider">:</span>
                                    ' . $realMatch["goals_b"] . '
                                </div>
                                        
                                            <div>
                                            ' . $realMatch["winner"] . '
                                            </div>
                                        
                            </div>
                        </div>
                        <div class="column">
                            <div class="team team--away">
                                <div class="team-logo">
                                    <img src="images/' . $realMatch["team_b"] . '.png" alt="' . $realMatch["team_b"] . '" height="100" width="140">
                                </div>
                                <h2 class="team-name">' . $realMatch["team_b"] . '</h2>
                            </div>
                        </div>
                    </div>');
                }
            }
?>
    
    </div>
    
    <!-- !--JavaScript for Toggle Menu-- -->
    <script>
        var navLinks = document.getElementById("navLinks")
        var span_visitante = document.getElementById("span-visitante")
        var span_local = document.getElementById("span-local")
        function showMenu() {
            navLinks.style.right = "100px"
        }
        function hideMenu() {
            navLinks.style.right = "-200px"
        }
    </script>
</body>
</html>