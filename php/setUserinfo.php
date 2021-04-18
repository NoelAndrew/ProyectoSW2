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
    <title>setUserinfo | UH</title>
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
            <a class="item" href="updateUser.php">UpdateUser</a>
            <a class="item" href="getUsers.php">GetUsers</a>
            <a class="blue active item" href="setUserinfo.php">SetUserinfo</a>
            <a class="item" href="updateUserinfo.php">UpdateUserinfo</a>
            <a class="item" href="getUserinfo.php">GetUserinfo</a>
        </div>
      </div>
    <!-- FIN DEL MENU -->

    <!-- body -->
    <div class="titulo_estas">
        <h1>Estas en setUserinfo</h1>
    </div>
         <!--Formulario-->
     <div class="contForm">
        <div class="contForm2">
            <div class="sigInContainer">
                <center><h1>Formulario</h1></center><br>
                
                <!-- Renglon superior -->
                        <div class="ui equal width form">
                            <div class="fields">
                            <div class="field">
                                <label>User</label>
                                <input type="text" placeholder="User" name="user" id="user">
                            </div>
                            <div class="field">
                                <label>Pass</label>
                                <input type="password" placeholder="Pass" name="pass" id="pass">
                            </div>                
                        </div>
                    <br>
                    <!-- fin renglon superior -->
                    
                    <!-- renglon medio - largo -->
                    <div class="ui equal width form">
                        <div class="field">
                            <label>Searched User</label>
                            <input type="text" placeholder="Searched User" name="AuxUse" id="AuxUse">
                        </div>
                    </div>
                    <br>
                    <!-- fin renglon medio - largo -->

                    <!-- renglones bajos - 1 -->
                    <div class="ui equal width form">
                        <div class="fields">
                            <div class="field">
                                <label>Correo</label>
                                <input type="text" placeholder="correo" name="correo" id="correo">
                            </div>
                            <div class="field">
                                <label>Nombre</label>
                                <input type="text" placeholder="Nombre" name="nombre" id="nombre">
                            </div>                
                        </div>
                    </div>

                    <div class="ui equal width form">
                        <div class="fields">
                            <div class="field">
                                <label>Rol</label>
                                <input type="text" placeholder="rol" name="rol" id="rol">
                            </div>
                            <div class="field">
                                <label>Teléfono</label>
                                <input type="text" placeholder="Teléfono" name="telefono" id="telefono">
                            </div>                
                        </div>
                    <br>
                    <!-- fin renglon superior -->
                    <div class="ui large buttons">
                        <button class="ui blue button" name="boton" type="submit" onclick ="Set_Info()">Enviar</button>
                    </div>
                    
                    
                    <!-- <a href="formulario.html">No tienes cuenta? Registrate</a> -->
            
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer id="main-footer">
        <p>LOS CONDENADOS UH &copy; 2021, DERECHOS RESERVADOS</p>
    </footer>
</body>
<script>
   function Set_Info() {
	jQuery.ajax({
	url: "Clases/set_userInfo.php",
	data: {
        user: $("#user").val(),
        pass:$("#pass").val(),
        correo: $("#correo").val(),
        nombre: $("#nombre").val(),
        rol: $("#rol").val(),
        telefono: $("#telefono").val(),
        AuxUse:$("#AuxUse").val(),
        },
            
	type: "POST",
	success:function(data){
		alert(data);
	},
	error:function (){
        alert("nepe");
    }
	});
}
    </Script>
</html>
