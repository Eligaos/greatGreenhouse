@extends('app')

@section('customStyles')
<link href="../../css/addExploracao.css" rel="stylesheet">

@endsection
@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-3">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="modal-title" id="myModalLabel">Exploração Agrícola</h3>
					</div>
					<div class="panel-body">
						<form id="registerForm" method="POST" >
							<div class="form-group">
								<fieldset> 
									<legend>Dados do Terreno</legend>
									<div class="col-xs-12 col-md-12">
									
										<label for="nome">Nome do Terreno</label>
										<div class="input-group">
											<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome do terreno"><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
										</span>
										</div>
										<br>
										<label for="numero">Número do Terreno</label>
										<div>
											<input type="text" class="form-control" id="numero"  name="numero" placeholder="Insira o número de registo do terreno">
										</span>
									</div>

								</fieldset>
							</div>
							<div class="form-group">
								<fieldset> 
									<legend>Localização</legend>
									<div class="col-xs-12 col-md-6">

										<label for="distrito">Distrito</label>
										<div>
											<input type="text" class="form-control" id="distrito" name="distrito" placeholder="Insira o distrito onde se localiza o terreno" >
										</div>
										<br>
										<label for="concelho">Concelho</label>
										<div>
											<input type="text" class="form-control" id="concelho" name="concelho" placeholder="Insira o concelho onde se localiza o terreno" >
										</div><br>
									</div> 

									<div class="col-xs-12 col-md-6"> 
										<label for="freguesia">Freguesia</label>
										<div>
											<input type="text" class="form-control" id="freguesia"  name="freguesia" placeholder="Insira a freguesia onde se localiza o terreno">

										</div>
										<br>
										<label for="area">Área</label>
										<div>
											<input type="text" class="form-control" id="area" name="area" placeholder="Insira a área total do terreno">
										</div><br>
									</div>  
								</fieldset>
							</div>    




							<div class="form-group">
								<div class="input-group-addon">
									<input type="button" name="cancelar" id="cancelar" value="Cancelar" class="btn btn-default pull-right">
									<input type="submit" name="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@section('customScripts')

@endsection
