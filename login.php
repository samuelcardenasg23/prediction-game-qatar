<?php

$is_invalid = false;


if($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__ . "/database.php";
    $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if($user){
        if(password_verify($_POST["password"], $user["password_hash"])) {
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: marcador.php");
            exit;
        }
    }

    $is_invalid = true;
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
    <link rel="stylesheet" href="style2.css">
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="ranking-copy2.php">Tabla de Posiciones</a></li>
                    <li><a href="login.php">Iniciar sesion/Registro</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Login</button>
                    <button type="button" class="toggle-btn" onclick="register()">Registro</button>
                </div>
                <form id="login" class="input-group" method="post">
                    <input type="email" class="input-field" name="email" placeholder="Email" required>
                    <input type="password" class="input-field" name="password" placeholder="Contraseña" required>
                    <?php if ($is_invalid): ?>
                        <p>Email y/o password incorrectas</p> 
                    <?php endif; ?>
                    <button type="submit" class="submit-btn">Ingresar</button>
                </form>
                <form id="register" class="input-group2" action="process-signup.php" method="post">
                    <input type="text" class="input-field" name="user_name" placeholder="Nombre" required>
                    <input type="text" class="input-field" name="user_last_name" placeholder="Apellido" required>
                    <input type="email" class="input-field" name="email" placeholder="Email" required>
                    <input type="password" class="input-field" name="password" placeholder="Contraseña" required>
                    <input type="password" class="input-field" name="password_confirmation" placeholder="Confirmar contraseña" required>
                    <input type="checkbox" class="check-box" name="ff_employee" value="1"><span><strong> Empleado de Falcon Farms</strong></span>
                    <!-- <input type="checkbox" class="check-box" name="money_participants" value="1"><span><strong> Participar con dinero</strong></span> -->
                    <button type="submit" class="submit-btn">Registrarse</button>
                </form>
            </div>
        </div>
        <!-- !--JavaScript for Toggle Login/Register -- -->
        <script>
            var x = document.getElementById("login");
            var y = document.getElementById("register");
            var z = document.getElementById("btn");

            function login() {
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0";
            }

            function register() {
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }
        </script>
    </section>
    <!-- !--JavaScript for Toggle Menu-- -->
    <script>
        var navLinks = document.getElementById("navLinks")
        function showMenu() {
            navLinks.style.right = "0"
        }
        function hideMenu() {
            navLinks.style.right = "-200px"
        }
    </script>
</body>
</html>