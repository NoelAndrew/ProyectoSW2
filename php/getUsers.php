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
    <title>getUsers | UH</title>
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
            <a class="blue active item" href="getUsers.php">GetUsers</a>
            <a class="item" href="setUserinfo.php">SetUserinfo</a>
            <a class="item" href="updateUserinfo.php">UpdateUserinfo</a>
            <a class="item" href="getUserinfo.php">GetUserinfo</a>
        </div>
      </div>
    <!-- FIN DEL MENU -->

    <!-- body -->
    <div class="titulo_estas">
        <h1>Estas en getUsers</h1>
    </div>
    <div class="contForm">
        <div class="contForm2">
            <div class="sigInContainer">
                <center><h1>Obten los usuarios</h1></center><br>
                <center>
                <table class="ui inverted teal selectable celled table" id="table">
                
                 </table></center>
                    <div class="ui large buttons">
                        <button class="ui blue button" name="UserInfoBtn" type="submit" onclick="Get_data()">GetInfo</button>
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
function Get_data() {
    jQuery.ajax({
	url: "Clases/Get_user.php",
	type: "GET",
	success:function(data){
		$("#table").html(data);
	},
	error:function (){}
	});

};
</script>
</html>
