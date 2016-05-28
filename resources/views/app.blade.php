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
  <title>Great Greenhouse @yield('title')</title>
  <link href="{{asset('css/bootstrap/bootstrap.css')}}" rel="stylesheet">

  <link href="{{asset('css/home/geral.css')}}" rel="stylesheet">
  <link href="{{asset('css/home/barraLateral.css')}}" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  @yield('customStyles')
</head>   
<body >
  <div class="main col-sm-2 col-md-2 col-lg-2">
   <div class="nav-side-menu ">
    <div class="brand">Great Greenhouse</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="welcome">Bem-vindo,  
     @if(Auth::check())
     <span>{{Auth::getUser()->name}}</span>
     @endif  </div>

     <div class="menu-list">

      <ul id="menu-content" class="menu-content collapse out">
        <li>
          <a href="/admin/home">
            <i class="fa fa-home fa-lg"></i> Início</a>
          </li>
           <li><a href="/admin/exploracao"><i class="glyphicon glyphicon-map-marker fa-lg"></i> Exploração Agrícola</a></li>
           <li><a href="/admin/estufas"><i class="glyphicon glyphicon-leaf fa-lg"></i> Estufas</a>  </li>
           <li><a href="/admin/culturas"><i class="  glyphicon glyphicon-tree-deciduous fa-lg"></i> Culturas</a>	</li>
         

     <li>
       <a href="/admin/leituras">
         <i class="glyphicon glyphicon-tasks fa-lg"></i> Leituras 
       </a>
     </li>
        <li>
       <a href="/admin/graficos">
         <i class="glyphicon glyphicon-stats fa-lg"></i> Gráficos 
       </a>
     </li>
     <li>
       <a href="/admin/alarmes">
         <i class="glyphicon glyphicon-time fa-lg"></i> Alarmes 
       </a>
     </li>   
  
       <li data-toggle="collapse" data-target="#sensores" class="collapsed">
        <a href="#"><i class="glyphicon glyphicon-wrench fa-lg"></i> Sensores <span class="arrow"></span></a>
      </li> 
      <ul class="sub-menu collapse" id="sensores">
  
       <li><a href="/admin/sensores"><i class="glyphicon glyphicon-scale fa-lg"></i> Lista de Sensores </a></li>
       <li><a href="/admin/associacoes"><i class="glyphicon glyphicon-retweet fa-lg"></i> Associar Sensores</a></li>
            <li><a href="/admin/tipos-leituras"><i class="glyphicon glyphicon-link fa-lg"></i> Tipos de Leituras</a></li>
       <li><a href="/admin/registos/manual"><i class="  glyphicon glyphicon-pencil fa-lg"></i> Registar Leitura Manual </a></li>
     </ul>

  <li><a href="/admin/especies"><i class="glyphicon glyphicon-grain fa-lg"></i> Espécies</a></li>  
        
     <li>
       <a href="/admin/colaboradores">
         <i class="fa fa-users fa-lg"></i> Colaboradores 
       </a>
     </li>
     <li>
      <a href="/admin/perfil">
        <i class="fa fa-user fa-lg"></i> Perfil
      </a>
    </li>
    <li>
      <a href="/admin/exploracoes/mudar">
        <i class="glyphicon glyphicon-transfer"></i>Mudar de Exploração
      </a>
    </li>
    <li>
      <a href="/admin/logout">
        <i class="fa fa-door fa-lg"></i> Sair
      </a>
    </li>
  </ul>
</div>
</div>
</div>
@yield('content')
</body>
<script src="{{asset('js/jquery/jquery-2.1.4.js')}}"></script>
<script src="{{asset('js/angular/angular.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.js')}}"></script>
<script src="{{asset('js/geral.js')}}"></script>
@yield('customScripts')
</html>