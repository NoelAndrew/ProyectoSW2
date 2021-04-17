<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SEMANTIC UI -->
    <link rel="stylesheet" href="../css/semantic.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/semantic.min.css">
    <script src="../js/semantic.min.js"></script>
    <!-- FIn -->
    <link rel="stylesheet" href="../css/style.css">
 
    <title>setUser | UH</title>
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
            <a class="blue active item" href="setUser.php">SetUser</a>
            <a class="item" href="updateUser.php">UpdateUser</a>
            <a class="item" href="getUsers.php">GetUsers</a>
            <a class="item" href="setUserinfo.php">SetUserinfo</a>
            <a class="item" href="updateUserinfo.php">UpdateUserinfo</a>
            <a class="item" href="getUserinfo.php">GetUserinfo</a>
        </div>
      </div>
    <!-- FIN DEL MENU -->

    <!-- body -->
    <div class="titulo_estas">
        <h1>Estas en setUser</h1>
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
                    
                    <!-- Nuevo user y pass -->
                    <div class="ui equal width form">
                            <div class="fields">
                            <div class="field">
                                <label>Nuevo User</label>
                                <input type="text" placeholder="Nuevo User" name="NewUser" id="NewUser">
                            </div>
                            <div class="field">
                                <label>Nueva Pass</label>
                                <input type="password" placeholder="Nueva Pass" name="NewPass" id="NewPass">
                            </div>                
                        </div>
                    <br>
                <div class="ui large buttons">
                <button class="ui blue button" name="boton"  onclick ="Set_user()" >Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer id="main-footer">
        <p>LOS CONDENADOS UH &copy; 2021, DERECHOS RESERVADOS</p>
    </footer>
</body>

<script>
   function Set_user() {
	jQuery.ajax({
	url: "Clases/set_user.php",
	data: {user: $("#user").val(),
        pass:$("#pass").val(),
        NewUser:$("#NewUser").val(),
        NewPass:$("#NewPass").val(),
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
