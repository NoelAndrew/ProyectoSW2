<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEMANTIC UI -->
    <link rel="stylesheet" href="../css/semantic.css">
    <link rel="stylesheet" href="../js/jquery-3.5.1.min.js">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/semantic.min.css">
    <script src="../js/semantic.min.js"></script>
    <!-- FIn -->
    <link rel="stylesheet" href="../css/style.css">
    <title>updateUser | UH</title>
</head>
<body>
    <!-- MENU -->
    <div class="ui inverted menu">
        <a class="item" href="../index.html">
            <img src="../img/UH-Logo.png" alt="UH">
            Los Condenados UH
        </a>
        <!-- <a class="item">Submit</a> -->
        <div class="right menu">
            <a class="item" href="../index.html">Inicio</a>
            <a class="item" href="setUser.php">SetUser</a>
            <a class="blue active item" href="updateUser.php">UpdateUser</a>
            <a class="item" href="getUsers.php">GetUsers</a>
            <a class="item" href="setUserinfo.php">SetUserinfo</a>
            <a class="item" href="updateUserinfo.php">UpdateUserinfo</a>
            <a class="item" href="getUserinfo.php">GetUserinfo</a>
        </div>
      </div>
    <!-- FIN DEL MENU -->

    <!-- body -->
    <div class="titulo_estas">
        <h1>Estas en updateUser</h1>
    </div>
       <!--Formulario-->
       <div class="contForm">
        <div class="contForm2">
            <div class="sigInContainer">
                <center><h1>Formulario</h1></center><br>
                <form name ="formularioUpdateUser" action= "./php/.php" method="POST">
                <!-- Renglon superior -->
                        <div class="ui equal width form">
                            <div class="fields">
                            <div class="field">
                                <label>User</label>
                                <input type="text" placeholder="User" name="user">
                            </div>
                            <div class="field">
                                <label>Pass</label>
                                <input type="password" placeholder="Pass" name="pass">
                            </div>                
                        </div>
                    <br>
                    <!-- fin renglon superior -->
                    
                    <!--nueva horchata Old User-->
                    <div class="ui equal width form">
                            <div class="fields">
                            <div class="field">
                                <label>Old User</label>
                                <input type="text" placeholder="Old User" name="Olduser">
                            </div>               
                        </div>
                    <br>
                    <!--fin de la nueva horchata-->
                      <!-- Nuevo user y pass -->
                      <div class="ui equal width form">
                            <div class="fields">
                            <div class="field">
                                <label>Nuevo User</label>
                                <input type="text" placeholder="Nuevo User" name="NewUser">
                            </div>
                            <div class="field">
                                <label>Nueva Pass</label>
                                <input type="password" placeholder="Nueva Pass" name="NewPass">
                            </div>                
                        </div>
                    <br>
                    <!-- Fin nuevo user y pass -->
                    <!-- fin renglones bajos -->

                    <!-- boton -->
                    <div class="ui large buttons">
                        <button class="ui blue button" name="boton" type="submit">Enviar</button>
                    </div>
                    
                    
                    <!-- <a href="formulario.html">No tienes cuenta? Registrate</a> -->
                </form>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer id="main-footer">
        <p>LOS CONDENADOS UH &copy; 2021, DERECHOS RESERVADOS</p>
    </footer>
</body>
</html>
