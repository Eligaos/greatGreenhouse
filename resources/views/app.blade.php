<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/signin.css" rel="stylesheet">
	<link href="css/barraLateral.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	@yield('customStyles')
</head>
<body>
	@yield('content')
	<div class="nav-side-menu">
    <div class="brand">Green House</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
                  <i class="fa fa-home fa-lg"></i> Inicio
                  </a>
                </li>

				<li>
					<a href="#">
					<i class="fa fa-user fa-lg"></i> Colaboradores 
					</a>
                </li>

                <li data-toggle="collapse" data-target="#MGA" class="collapsed">
                  <a href="#"> Menu Gestão Agricola <span class="arrow"></span></a>
                </li> 
                <ul class="sub-menu collapse" id="MGA">
                	<li><a href="#"><i class="fa fa-globe fa-lg"></i> Exploração Agricola </a></li>
                   	<li><a href="#"><i class="fa fa-globe fa-lg"></i> Estufa </a>	</li>
                    <li><a href="#"><i class="fa fa-globe fa-lg"></i> Cultura </a>	</li>
                </ul>

                <li>
                  <a href="#"><i class="glyphicon glyphicon-grain fa-lg"></i> Espécies</a>
                </li>               

                  <li data-toggle="collapse" data-target="#consultas" class="collapsed">
                  <a href="#"> Consultas <span class="arrow"></span></a>
                </li> 
                <ul class="sub-menu collapse" id="consultas">
                	<li><a href="#"><i class="glyphicon glyphicon-stats"></i> Dados Analíticos </a></li>
                   	<li><a href="#"><i class="glyphicon glyphicon-bell"></i> Alarmes </a>	</li>
                    <li><a href="#"><i class="glyphicon glyphicon-file"></i> Notas </a>	</li>
                </ul>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Perfil
                  </a>
                </li>
                <li>
                  <a href="#">
                  <i class="glyphicon glyphicon-transfer"></i> Mudar de Exploração
                  </a>
                </li>
                <li>
                  <a href="#">
                  <i class="fa fa-door fa-lg"></i> Sair
                  </a>
                </li>
            </ul>
     </div>
</div>
</body>
    <script src="js/jquery-2.1.4.js"></script>
    <script src="js/angular.js"></script>
    <script src="js/bootstrap.js"></script>
    @yield('customScripts')
</html>