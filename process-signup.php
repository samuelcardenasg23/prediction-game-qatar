<?php

$isFFemployee = 0;
$moneyParticipant = 0;

if(strlen($_POST["password"]) < 8){
    die("Password must be at least 8 characters");
}

if( ! preg_match("/[a-z]/i", $_POST["password"])){
    die("Password must contain at least one letter");
}

if( ! preg_match("/[0-9]/i", $_POST["password"])){
    die("Password must contain at least one number");
}

if($_POST["password"] !== $_POST["password_confirmation"]){
    die("Password must match");
}

// if(isset($_POST["ff_employee"])){
//     $isFFemployee = 1;
// }

if(isset($_POST["money_participants"])){
    $moneyParticipant = 1;
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (user_name, user_last_name, email, password_hash, ff_employee) 
        VALUES (?,?,?,?,?)";
$stmt = $mysqli->stmt_init();

if( ! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssssi", $_POST["user_name"], $_POST["user_last_name"], $_POST["email"], $password_hash, $isFFemployee);

if($stmt->execute()){
    session_start();

    session_regenerate_id();

    $_SESSION["user_id"] = $user["id"];

    header("Location: marcador.php");
    exit;

} else{

    if($mysqli->errno === 1062){

        die("Email already registered");

    } else{
        die($mysqli->error . "" . $mysqli->errno);
    }
}
?>