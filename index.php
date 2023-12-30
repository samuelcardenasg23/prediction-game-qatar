<?php

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
            <h1>Mundial Qatar 2022</h1>
            <br><p><strong>PARA VER LA TABLA DE POSICIONES CLICK <a href="ranking-copy2.php">AQUI</a></strong></p><br>
        </div>
    </section>
    <section class="funcionamiento">
        <h1>¿Como funciona?</h1>
        <p class="comoFunciona">
            <br>En cada Partido usted deberá colocar 3 datos.<br>
            <br><strong>1)</strong> El número de goles anotados en el partido por el equipo A <strong>(Marcador A)</strong> Que le dará 1 punto si lo acierta<br>
            <br><strong>2)</strong> El número de goles anotados en el partido por el equipo B <strong>(Marcador B)</strong> Que le dará 1 punto si lo acierta<br>
            <br><strong>3)</strong> Deberá especificar el ganador del partido o si empatan <strong>(Elegir Ganador)</strong> Que le dará 2 puntos.<br>
            <br>Si usted acierta los dos marcadores y el resultado tendrá un punto de bonificación extra para un total de 5 puntos (1 punto por el Marcador A, 1 Punto por el Marcador B, 2 puntos por el Resultado y 1 punto de bonificación).<br>
            <br><strong>Ejemplo: </strong><br>
            <br><strong>PRONOSTICO: </strong><br>
            <img src="images/marcador.png" alt="">
            <br><strong>Resultado FINAL</strong><br>
            <img src="images/resultadoFinal.png" alt="">
            <br><br>
            <br><strong>PUNTAJE:</strong> 3 Puntos Así:<br>
        </p>
            <br><li>0 puntos por el marcador del equipo A</li><br>
            <br><li>1 punto por el Marcador del Equipo B</li><br>
            <br><li>2 puntos por el resultado ganador equipo A</li><br>
        <p class="comoFunciona">
            <br>Es totalmente valido el siguiente ejemplo<br>
            <br><img src="images/marcador2.png" alt=""><br>
            <br><strong>Resultado FINAL</strong><br>
            <br><img src="images/resultadoFinal2.png" alt=""><br>
            <br><strong>PUNTAJE:</strong> 3 Puntos Así: <br>
        </p>
            <br><li>1 punto por el marcador del equipo A</li><br>
            <br><li>0 puntos por el Marcador del Equipo B</li><br>
            <br><li>2 puntos por el resultado ganador equipo A</li><br>
        <p class="comoFunciona">
            <br><strong>Ejemplo de puntaje perfecto:</strong><br>
            <br><strong>PRONOSTICO: </strong><br>
            <br><img src="images/resultadoFinal2.png" alt=""><br>
            <br><strong>Resultado FINAL</strong><br>
            <br><img src="images/resultadoFinal2.png" alt=""><br>
            <br><strong>PUNTAJE:</strong> 5 Puntos Así: <br>
        </p>
            <br><li>1 punto por el marcador del equipo A</li><br>
            <br><li>1 punto por el Marcador del Equipo B</li><br>
            <br><li>2 puntos por el resultado ganador equipo A</li><br>
            <br><li>1 punto como bono por acertar los dos marcadores y el resultado</li><br>
        <p class="comoFunciona">
           <br>Cada equipo clasificado a <strong>OCTAVOS</strong> de Final en la posición del grupo correcta, es decir que se debe predecir cual equipo queda de <strong>primero</strong> para ganar los <strong>10 puntos</strong> y cual equipo queda de <strong>segundo </strong> para recibir otros <strong>10 puntos</strong>.  Hay que predecir los 16 equipos que pasan a Octavos de final y colocar los resultados de sus llaves. <br>
        </p>
    </section>
    <section class="pasos_a_seguir">
        <h1>Pasos a Seguir</h1>
        <p class="comoFunciona">
            <br><strong>1)</strong> Usted deberá registrarse, en la parte superior derecha deberá ingresar a <a href="login.php">Iniciar sesión/Registro</a> allí podrá hacer el registro para acceder a la porra.<br>
            <br><strong>2)</strong> Una vez se haya registrado será redirigido al login para acceder y poder <a href="marcador.php">Ingresar sus resultados</a>.<br>
            <br><strong>3)</strong> Los partidos aparecerán ordenados por fecha, comenzando el 20 Noviembre con Qatar vs Ecuador, usted deberá ingresar el Marcador de ambos equipos y elegir el ganador: Equipo A, Equipo B o Empate.
            Al final podrá hacer su predicción de que equipo pasa primero y segundo de cada grupo para luego enviar sus resultados. Tenga en cuenta de que una vez envíe sus resultados no podrá modificarlos luego, solo podrá visualizarlos.<br>
            <br><strong>4)</strong> Al final de cada día, una vez finalicen los partidos se darán los puntos correspondientes a cada persona. Para visualizar la tabla de posiciones con los puntos de los usuarios usted podrá hacerlo una vez haya iniciado sesión en <a href="ranking.php">Tabla de posiciones</a>.<br>
            <br><br>
        </p>
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