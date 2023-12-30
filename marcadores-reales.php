<?php

session_start();
// $hasSubmittedStage=false;
$realMatches=[];
$stage=1;
// $submittedStageScoresFlag="submitted_stage_1_scores";

if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    $sqlMatches = "SELECT * FROM matches WHERE stage = $stage";
    $resultMatches = $mysqli->query($sqlMatches);
    $realMatches = $resultMatches->fetch_all(MYSQLI_ASSOC);

    // $hasSubmittedStage = $user[$submittedStageScoresFlag];
    
    $sqlTeams = "SELECT pot, team_a 
    FROM matches  
    WHERE pot <> 'x'
    GROUP BY pot, team_a";
    $resultTeams = $mysqli->query($sqlTeams);
    $teams = $resultTeams->fetch_all(MYSQLI_ASSOC);

    $sqlQualifiers = "SELECT * FROM qualifiers_reales";
    $resultQualifiers = $mysqli->query($sqlQualifiers);
    $realQualifiers = $resultQualifiers->fetch_all(MYSQLI_ASSOC);

    // if($hasSubmittedStage){
    //     $sqlScores = "SELECT us.goals_a, us.goals_b, us.winner, m.date, m.team_a, m.team_b, m.pot
    //     FROM user_scores us 
    //     JOIN matches m ON us.match_id = m.id 
    //     WHERE m.stage = $stage AND us.user_id = {$_SESSION["user_id"]}";
    //     $resultScores = $mysqli->query($sqlScores);
    //     $scores = $resultScores->fetch_all(MYSQLI_ASSOC);

    //     $sqlQualifiers = "SELECT * FROM user_qualifiers WHERE user_id = {$_SESSION["user_id"]}";
    //     $resultQualifiers = $mysqli->query($sqlQualifiers);
    //     $userQualifiers = $resultQualifiers->fetch_all(MYSQLI_ASSOC);
    // }
}
else{
    header("Location: login.php");
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);
    $hasSubmittedStage = $user[$submittedStageScoresFlag];

//     if(!$hasSubmittedStage){
//         foreach($_POST["result"] as $result){
//             $sql = "INSERT INTO user_scores (match_id, user_id, goals_a, goals_b, winner)
//                     VALUES (?,?,?,?,?)";
    
//             $stmt = $mysqli->stmt_init();
    
//             if( ! $stmt->prepare($sql)){
//                 die("SQL error: " . $mysqli->error);
//             }
    
//             $stmt->bind_param("iiiis", $result["match_id"], $_SESSION["user_id"], $result["goals_a"], $result["goals_b"], $result["winner"]);
    
//             if(!$stmt->execute()){
//                 die($mysqli->error . "" . $mysqli->errno);
//             }
//         }

//         foreach($_POST["qualifiers"] as $qualifier){
//             $sql = "INSERT INTO user_qualifiers (user_id, pot, first, second)
//                     VALUES (?,?,?,?)";
//             $stmt = $mysqli->stmt_init();
    
//             if( ! $stmt->prepare($sql)){
//                 die("SQL error: " . $mysqli->error);
//             }
            

//             $stmt->bind_param("isss", $_SESSION["user_id"], $qualifier["pot"], $qualifier["first"], $qualifier["second"]);
    
//             if(!$stmt->execute()){
//                 die($mysqli->error . "" . $mysqli->errno);
//             }
//         }

//         $sql = "UPDATE user SET submitted_stage_1_scores=1 WHERE id = ?";
    
//         $stmt = $mysqli->stmt_init();

//         if( ! $stmt->prepare($sql)){
//             die("SQL error: " . $mysqli->error);
//         }
//         $stmt->bind_param("i", $_SESSION["user_id"]);

//         if($stmt->execute()){
//             $hasSubmittedStage = true;
//             $sqlScores = "SELECT us.goals_a, us.goals_b, us.winner, m.date, m.team_a, m.team_b, m.pot
//             FROM user_scores us 
//             JOIN matches m ON us.match_id = m.id 
//             WHERE m.stage = $stage AND us.user_id = {$_SESSION["user_id"]}";
//             $resultScores = $mysqli->query($sqlScores);
//             $scores = $resultScores->fetch_all(MYSQLI_ASSOC);

//             $sqlQualifiers = "SELECT * FROM user_qualifiers WHERE user_id = {$_SESSION["user_id"]}";
//             $resultQualifiers = $mysqli->query($sqlQualifiers);
//             $userQualifiers = $resultQualifiers->fetch_all(MYSQLI_ASSOC);
//         } else{
//                 die($mysqli->error . "" . $mysqli->errno);
//         }
//     }
// }
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
            <!-- <a href="https://falconfarmsonline.com/" target="_blank"><img src="images/FFLogo.png" alt=""></a> -->
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="marcador.php">Ingresar Marcador</a></li>
                    <li><a href="ranking.php">Tabla de Posiciones</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
        <!-- aqui hay un tag opening php -->
        <!-- if(!$hasSubmittedStage){
            echo('<h1>Marcadores Reales</h1>');
         }else{
             echo('<h1>Esta es tu prediccion</h1>');
        } -->
        <!-- cerrar tag php -->
        </div>
    </section>
    <div class="match">
        <div class="container">
        <?php
        // if(!$hasSubmittedStage){
            // echo('<div class="match-content">
            //             <div class="column"></div>
            //             <div class="column">
            //                 <br><p><strong>Cerradas las incripciones!!</strong></p><br>
            //             </div>
            //     </div>');
            // echo('<form action="#" method="POST">');
        //     foreach($matches as $match){
        //         if($match["pot"] !== 'x'){
        //             echo('<div class="match-content">
        //             <div class="column">
        //                 <div class="team team--home">
        //                     <div class="team-logo">
        //                     <img src="images/' . $match["team_a"] . '.png" alt="' . $match["team_a"] . '" height="100" width="140">
        //                     </div>
        //                     <h2 class="team-name">' . $match["team_a"] . '</h2>
        //                 </div>
        //             </div>

        //             <div class="column">
        //                 <div class="match-details">
        //                     <div class="match-date">
        //                         <strong>' . $match["date"] . '</strong>
        //                     </div>
        //                     <div class="match-score">
        //                         <input name="result[' . $match["id"] . '][goals_a]" value=0 class="input-score" id ="input-numeric"  type="number" min=0 required>
        //                         <span class="match-score-divider">:</span>
        //                         <input name="result[' . $match["id"] . '][goals_b]" value=0 class="input-score" id ="input-numeric" type="number" min=0 required>
        //                         <input name="result[' . $match["id"] . '][match_id]" value="' . $match["id"] . '"  type="hidden">
        //                         <input name="result[' . $match["id"] . '][user_id]" value="' . $user["id"] . '"  type="hidden">
        //                     </div>
        //                             <!-- url aqui -->
                                    
        //                                 <div class="select">
        //                                     <select name="result[' . $match["id"] . '][winner]" class="select__field" required>
        //                                         <option value="" selected>Elegir Ganador</option>
        //                                         <option value="' . $match["team_a"] . '">' . $match["team_a"] . '</option>
        //                                         <option value="' . $match["team_b"] . '">' . $match["team_b"] . '</option>
        //                                         <option value="Empate">Empate</option>
        //                                     </select>
        //                                 </div>

                                    
        //                 </div>
        //             </div>
        //             <div class="column">
        //                 <div class="team team--away">
        //                     <div class="team-logo">
        //                         <img src="images/' . $match["team_b"] . '.png" alt="' . $match["team_b"] . '" height="100" width="140">
        //                     </div>
        //                     <h2 class="team-name">' . $match["team_b"] . '</h2>
        //                 </div>
        //             </div>
        //         </div>');
        //         }
        // }

        // foreach($teams as $team){
            
        //     $organizedTeams[$team['pot']][] = $team['team_a'];
        // }

        // foreach($organizedTeams as $pot => $members){
        //     echo('<div class="match-content">
        //         <div class="column">
        //         </div>

        //         <div class="column">
        //             <div class="match-details">
        //                 <div class="match-date">
        //                      <strong>Grupo ' . $pot . '</strong>
        //                 </div>
                                
        //                 <div class="select">
        //                     <select name="qualifiers[' . $pot . '][first]" class="select__field" required>
        //                         <option value="" selected>Elegir Primer Puesto</option>
        //                         <option value="' . $members[0] . '">' . $members[0]  . '</option>
        //                         <option value="' . $members[1] . '">' . $members[1]  . '</option>
        //                         <option value="' . $members[2] . '">' . $members[2]  . '</option>
        //                         <option value="' . $members[3] . '">' . $members[3]  . '</option>
        //                     </select>
        //                 </div>
        //                 <div class="select">
        //                     <select name="qualifiers[' . $pot . '][second]" class="select__field" required>
        //                         <option value="" selected>Elegir Segundo Puesto</option>
        //                         <option value="' . $members[0] . '">' . $members[0]  . '</option>
        //                         <option value="' . $members[1] . '">' . $members[1]  . '</option>
        //                         <option value="' . $members[2] . '">' . $members[2]  . '</option>
        //                         <option value="' . $members[3] . '">' . $members[3]  . '</option>
        //                     </select>
        //                 </div>
        //                 <input name="qualifiers[' . $pot . '][pot]" value="' . $pot . '"  type="hidden">
                                
        //             </div>
        //         </div>
        //         <div class="column">
        //         </div>
        //     </div>');
        // }

        // foreach($matches as $match){
        //     if($match["pot"] === 'x'){
        //         echo('<div class="match-content">
        //         <div class="column">
        //             <div class="team team--home">
        //                 <div class="team-logo">
        //                 <img src="images/' . $match["team_a"] . '.png" alt="' . $match["team_a"] . '" height="100" width="140">
        //                 </div>
        //                 <h2 class="team-name">' . $match["team_a"] . '</h2>
        //             </div>
        //         </div>

        //         <div class="column">
        //             <div class="match-details">
        //                 <div class="match-date">
        //                      <strong>' . $match["date"] . '</strong>
        //                 </div>
        //                 <div class="match-score">
        //                     <input name="result[' . $match["id"] . '][goals_a]" value=0 class="input-score" id ="input-numeric"  type="number" min=0 required>
        //                     <span class="match-score-divider">:</span>
        //                     <input name="result[' . $match["id"] . '][goals_b]" value=0 class="input-score" id ="input-numeric" type="number" min=0 required>
        //                     <input name="result[' . $match["id"] . '][match_id]" value="' . $match["id"] . '"  type="hidden">
        //                     <input name="result[' . $match["id"] . '][user_id]" value="' . $user["id"] . '"  type="hidden">
        //                 </div>
        //                         <!-- url aqui -->
                                
        //                             <div class="select">
        //                                 <select name="result[' . $match["id"] . '][winner]" class="select__field" required>
        //                                     <option value="" selected>Elegir Ganador</option>
        //                                     <option value="' . $match["team_a"] . '">' . $match["team_a"] . '</option>
        //                                     <option value="' . $match["team_b"] . '">' . $match["team_b"] . '</option>
        //                                     <option value="Empate">Empate</option>
        //                                 </select>
        //                             </div>

                                
        //             </div>
        //         </div>
        //         <div class="column">
        //             <div class="team team--away">
        //                 <div class="team-logo">
        //                     <img src="images/' . $match["team_b"] . '.png" alt="' . $match["team_b"] . '" height="100" width="140">
        //                 </div>
        //                 <h2 class="team-name">' . $match["team_b"] . '</h2>
        //             </div>
        //         </div>
        //     </div>');
        //     }
        // }

        // if(!$hasSubmittedStage){
        //     echo('<button type="submit" class="btn-submit">Enviar Resultados</button>');
        // }

        
        // echo('</form>');
        }else{
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

<!-- 
1. crear un archivo solo para funciones php
2. despues del registro ir a marcadores no funciona
3. sacar un backup de archivos y base de datos
4. investigar como subir el proyecto a github -->
</html>