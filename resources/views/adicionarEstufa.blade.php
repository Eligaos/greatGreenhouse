@extends('app')

@section('customStyles')
<link href="css/addExploracao.css" rel="stylesheet">

@endsection
@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-3">
			<div>
				<div class="panel panel-default">
					<div class="panel-header">
						<h3 class="panel-title" id="myModalLabel">Estufa</h3>
					</div>
					<div class="panel-body">
						<form id="registerForm" method="POST" >
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
							<div class="form-group">
								<fieldset> 
									<legend>Dados da Estufa</legend>
									<div class="col-xs-12 col-md-12">

										<label for="nome">Nome do Terreno</label>
										<div>
											<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome do terreno">
										</div>

									</fieldset>
								</div>
								<div class="form-group">
									<fieldset> 
										<legend>Dimensões</legend>
										<div class="col-xs-12 col-md-6">

											<label for="distrito">Largura</label>
											<div>
												<input type="text" class="form-control" id="largura" name="largura" placeholder="Insira  alargura da estufa" >
											</div>
											<br>
											<label for="area">Área</label>
											<div>
												<input type="text" class="form-control" id="area" name="area" placeholder="Calculada automaticamente" disabled="">
											</div><br>

										</div> 

										<div class="col-xs-12 col-md-6"> 
											<label for="concelho">Comprimento</label>
											<div>
												<input type="text" class="form-control" id="comprimento" name="comprimento" placeholder="Insira o comprimento da estufa" >
											</div><br>
										</div>  
									</fieldset>
								</div>    
								<div class="form-group">
									<fieldset> 
										<legend>Zonas</legend>
										<div class="col-xs-12 col-md-12">

											<label for="nome">Nome do Terreno</label>
											<div>
												<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome do terreno">
											</span>
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
