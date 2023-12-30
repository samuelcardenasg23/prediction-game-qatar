<?php

function cmp($a, $b)
{
    return $b['points'] <=> $a['points'];
}

session_start();

if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
}

$mysqli = require __DIR__ . "/database.php";
    

    $sqlUsersFalcon = "SELECT id, user_name, user_last_name FROM user WHERE money_participants = 1"; 

    $resultsUsersFalcon = $mysqli->query($sqlUsersFalcon);
    $usersFalcon = $resultsUsersFalcon->fetch_all(MYSQLI_ASSOC);

    $sqlUsers = "SELECT id, user_name, user_last_name FROM user WHERE money_participants = 0";

    $resultsUsers = $mysqli->query($sqlUsers);
    $users = $resultsUsers->fetch_all(MYSQLI_ASSOC);
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
            <!-- <img src="images/qatarlogo.png" alt=""> -->
            <!-- <a href="https://falconfarmsonline.com/" target="_blank"><img src="images/FFLogo.png" alt=""></a> -->
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="marcador.php">Ingresar Resultados</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>Tabla de Posiciones</h1>
        </div>
    </section>

    <div class="match">
        <div class="container">

<?php

foreach($usersFalcon as $user){
    $sqlScores = "SELECT us.goals_a, us.goals_b, us.winner, m.team_a, m.team_b, m.goals_a AS final_goals_a, m.goals_b AS final_goals_b, m.winner AS final_winner, u.user_name, u.user_last_name
    FROM user_scores us 
    JOIN matches m ON us.match_id = m.id 
    JOIN  user u ON u.id = us.user_id
    WHERE us.user_id = {$user["id"]}";

    $resultScores = $mysqli->query($sqlScores);
    $scores = $resultScores->fetch_all(MYSQLI_ASSOC);

    $sqlQualifiers = "SELECT uq.pot, uq.first, uq.second, qr.first AS final_first, qr.second AS final_second, u.user_name, u.user_last_name
    FROM user_qualifiers uq 
    JOIN qualifiers_reales qr ON uq.pot = qr.pot 
    JOIN  user u ON u.id = uq.user_id
    WHERE uq.user_id = {$user["id"]}";

    $resultQualifiers = $mysqli->query($sqlQualifiers);
    $qualifiers = $resultQualifiers->fetch_all(MYSQLI_ASSOC);

    $points = 0;

    foreach($scores as $score){
        $isGoalsACorrect = false;
        $isGoalsBCorrect = false;
        $isWinnerCorrect = false;

        if($score["goals_a"] === $score["final_goals_a"]){
            $points++;
            $isGoalsACorrect = true;
        }

        if($score["goals_b"] === $score["final_goals_b"]){
            $points++;
            $isGoalsBCorrect = true;
        }

        if($score["winner"] === $score["final_winner"]){
            $points = $points + 2;
            $isWinnerCorrect = true;
        }

        if($isGoalsACorrect && $isGoalsBCorrect && $isWinnerCorrect){
            $points++;
        }

     }

    $pointsQualifiers = 0;

    foreach($qualifiers as $qualifier){
        $isFirstCorrect = false;
        $isSecondcorrect = false;

        if($qualifier["first"] === $qualifier["final_first"]){
            $pointsQualifiers = $pointsQualifiers + 10;
            $isFirstCorrect = true;
        }

        if($qualifier["second"] === $qualifier["final_second"]){
            $pointsQualifiers = $pointsQualifiers + 10;
            $isSecondcorrect = true;
        }
    }
        
        $rankingsFalcon[] = ['user_name' => $user["user_name"], 'user_last_name' => $user["user_last_name"], 'points' => $points];

        $rankingsFalconQualifiers[] = ['user_name' => $user["user_name"], 'user_last_name' => $user["user_last_name"], 'points' => $pointsQualifiers];

        $totalPoints = $points + $pointsQualifiers;

        $rankingsFalconTotals[$totalPoints][] = ['user_name' => $user["user_name"], 'user_last_name' => $user["user_last_name"], 'points' => $totalPoints];
}

krsort($rankingsFalconTotals);

foreach($users as $user){
    $sqlScores = "SELECT us.goals_a, us.goals_b, us.winner, m.team_a, m.team_b, m.goals_a AS final_goals_a, m.goals_b AS final_goals_b, m.winner AS final_winner, u.user_name, u.user_last_name
    FROM user_scores us 
    JOIN matches m ON us.match_id = m.id 
    JOIN  user u ON u.id = us.user_id
    WHERE us.user_id = {$user["id"]}";

    $resultScores = $mysqli->query($sqlScores);
    $scores = $resultScores->fetch_all(MYSQLI_ASSOC);

    $sqlQualifiers = "SELECT uq.pot, uq.first, uq.second, qr.first AS final_first, qr.second AS final_second, u.user_name, u.user_last_name
    FROM user_qualifiers uq 
    JOIN qualifiers_reales qr ON uq.pot = qr.pot 
    JOIN  user u ON u.id = uq.user_id
    WHERE uq.user_id = {$user["id"]}";

    $resultQualifiers = $mysqli->query($sqlQualifiers);
    $qualifiers = $resultQualifiers->fetch_all(MYSQLI_ASSOC);

    $points = 0;

    foreach($scores as $score){
        $isGoalsACorrect = false;
        $isGoalsBCorrect = false;
        $isWinnerCorrect = false;

        if($score["goals_a"] == $score["final_goals_a"]){
            $points++;
            $isGoalsACorrect = true;
        }

        if($score["goals_b"] == $score["final_goals_b"]){
            $points++;
            $isGoalsBCorrect = true;
        }

        if($score["winner"] == $score["final_winner"]){
            $points = $points + 2;
            $isWinnerCorrect = true;
        }

        if($isGoalsACorrect && $isGoalsBCorrect && $isWinnerCorrect){
            $points++;
        }

    }

    $pointsQualifiers = 0;

    foreach($qualifiers as $qualifier){
        $isFirstCorrect = false;
        $isSecondcorrect = false;

        if($qualifier["first"] === $qualifier["final_first"]){
            $pointsQualifiers = $pointsQualifiers + 10;
            $isFirstCorrect = true;
        }

        if($qualifier["second"] === $qualifier["final_second"]){
            $pointsQualifiers = $pointsQualifiers + 10;
            $isSecondcorrect = true;
        }
    }
    
    $rankings[] = ['user_name' => $user["user_name"], 'user_last_name' => $user["user_last_name"], 'points' => $points];

    $rankingsQualifiers[] = ['user_name' => $user["user_name"], 'user_last_name' => $user["user_last_name"], 'points' => $pointsQualifiers];

    $totalPoints = $points + $pointsQualifiers;

    $rankingsTotals[$totalPoints][] = ['user_name' => $user["user_name"], 'user_last_name' => $user["user_last_name"], 'points' => $totalPoints];

    $rankingsTotalsNames[$user["user_name"]][] = ['user_name' => $user["user_name"], 'user_last_name' => $user["user_last_name"], 'points' => $totalPoints];
}

// echo('<pre>');
// print_r($rankingsTotalsNames);
// echo('</pre>');

// sort($rankingsTotalsNames);

// echo('<pre>');
// print_r($rankingsTotalsNames);
// echo('</pre>');

krsort($rankingsTotals);

?>
<div class="row">
    <!-- <div class="column"></div> -->
    <div class="contact-col">
        <table class="content-table">
            <thead>
                <tr>
                    <th></th>
                    <th class="comoFunciona">Tabla de Posiciones DINERO: </th>
                    <th></th>
                </tr>
                <tr>
                    <th>Posicion</th>
                    <th>Nombre</th>
                    <th>Puntos</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $position = 1;
            foreach($rankingsFalconTotals as $ranking){
                foreach($ranking as $rank){
                    echo('
                    <tr>
                        <td>' . $position . '</td>
                        <td>' . $rank["user_name"] . ' ' . $rank["user_last_name"] . '</td>
                        <td>' . $rank["points"] . '</td>
                    </tr>');
                }
                $position++;
            }
            ?>
            </tbody>
        </table>        
    </div>
    <!-- <div class="column"></div> -->
    <div class="contact-col">
        <table class="content-table">
            <thead>
                <tr>
                    <th></th>
                    <th class="comoFunciona">Tabla de Posiciones: </th>
                    <th></th>
                </tr>
                <tr>
                    <th>Posicion</th>
                    <th>Nombre</th>
                    <th>Puntos</th>
                </tr>
            </thead>
            <tbody>
            <?php
             $position = 1;
             foreach($rankingsTotals as $ranking){
                 foreach($ranking as $rank){
                     echo('
                     <tr>
                         <td>' . $position . '</td>
                         <td>' . $rank["user_name"] . ' ' . $rank["user_last_name"] . '</td>
                         <td>' . $rank["points"] . '</td>
                     </tr>');
                 }
                 $position++;
             }
            ?>
            </tbody>
        </table>        
    </div>                        
</div>

<div class="match-content">
    <div class="column"></div>
    <div class="column">
        <table class="content-table">
            <thead>
                <tr>
                    <th></th>
                    <th class="comoFunciona">Tabla de Posiciones: </th>
                    <th></th>
                </tr>
                <tr>
                    <th>Posicion</th>
                    <th>Nombre</th>
                    <th>Puntos</th>
                </tr>
            </thead>
            <tbody>
            <?php
             $position = 1;
             foreach($rankingsTotals as $ranking){
                 foreach($ranking as $rank){
                     echo('
                     <tr>
                         <td>' . $position . '</td>
                         <td>' . $rank["user_name"] . ' ' . $rank["user_last_name"] . '</td>
                         <td>' . $rank["points"] . '</td>
                     </tr>');
                 }
                 $position++;
             }
            ?>
            </tbody>
        </table>        
    </div>            
</div>

    <!-- !--JavaScript for Toggle Menu-- -->
    <script>
        var navLinks = document.getElementById("navLinks")
        var span_visitante = document.getElementById("span-visitante")
        var span_local = document.getElementById("span-local")
        function showMenu() {
            navLinks.style.right = "0"
        }
        function hideMenu() {
            navLinks.style.right = "-200px"
        }
    </script>
</body>
</html>

