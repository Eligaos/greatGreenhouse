@extends('app')

@section('customStyles')

@endsection

@section('title', ' - Editar Exploração')


@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title" id="myModalLabel">Editar Exploração Agrícola</h3>
		</div>
		<div class="panel-body">
			<form id="registerForm" method="POST" action="/admin/exploracao/editar/submit" >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
				<div class="form-group">
					<h4 class="border-bottom">Dados do Terreno</h4>
					<div class="col-xs-12 col-md-12 margin-bottom">
						<label for="nome">Nome do Terreno</label>
						<div class="input-group">
							<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome do terreno" value="{{$exploracao->nome}}" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>		
						</div>
						<label for="numero">Número do Terreno</label>
						<div>
							<input type="number" class="form-control" id="numero"  name="numero" min=0 placeholder="Insira o número de registo do terreno" value="{{$exploracao->numero}}">
						</div>
					</div>
				</div>
				<div class="form-group">
					<h4 class="border-bottom">Localização</h4>
					<div class="col-xs-12 col-md-12 margin-bottom">
						<div class="row">
							<div class="col-lg-6 ">	
								<label for="distrito">Distrito</label>
								<div>
									<input type="text" class="form-control" id="distrito" name="distrito" placeholder="Insira o distrito onde se localiza o terreno" value="{{$exploracao->distrito}}">
								</div>
								<label for="concelho">Concelho</label>
								<div>
									<input type="text" class="form-control" id="concelho" name="concelho" placeholder="Insira o concelho onde se localiza o terreno" value="{{$exploracao->concelho}}">
								</div>
							</div> 

							<div class="col-xs-12 col-md-6"> 
								<label for="freguesia">Freguesia</label>
								<div>
									<input type="text" class="form-control" id="freguesia"  name="freguesia" placeholder="Insira a freguesia onde se localiza o terreno" value="{{$exploracao->freguesia}}">
								</div>
							</div>  
						</div>    
					</div>    
				</div>    
				@if (Session::get('message') )
				<div class="col-xs-12 col-md-12 alert alert-danger">
					<h4>Por favor corrija os seguintes erros:</h4>
					<ul>
						<li>{{ Session::get('message')}}</li>
					</ul>
				</div>
				@endif
				<div class="form-group">
					<div class="input-group-addon">
						<a href="/admin/exploracao" role="button" name="cancelar" class="btn btn-default pull-right" >Cancelar</a>
						<input type="submit" name="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection


@section('customScripts')

@endsection

