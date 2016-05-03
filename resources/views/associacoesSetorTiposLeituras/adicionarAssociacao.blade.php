@extends('app')

@section('customStyles')
<link href="{{asset('css/adicionarAssociacao.css')}}" rel="stylesheet">

@endsection
@section('title', ' - Nova Associação')

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-3">
			<div>
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="registerForm" method="POST" action="">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
							<div class="form-group">
								<fieldset> 
									<legend>Dados da Estufa</legend>
									<div class="col-xs-12 col-md-12">
										<label for="nome">Nome da Estufa</label>
										@if( Session::get('message'))
										<div style="text-align: center">
											<span class="alert alert-info"> {{ Session::get('message') }}</span>
										</div>
										@endif
										<div class="input-group">											
											<input type="text" class="form-control" id="nome"  name="nome" placeholder="Insira o nome da Estufa" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
										</div>
										<br/>
										<label for="nome">Descrição</label>
										<div class="input-group">											
											<input type="text" class="form-control" id="descricao"  name="descricao" placeholder="Insira uma descrição para estufa"><span class="input-group-addon"></span>
										</div>

									</fieldset>
								</div>			
								<div class="col-lg-3">	
									<div class="btn-group">
										<label>Escolha uma Estufa</label>
										<div>
											<select id="dropdownEstufas" name="dropdownEstufas" class="form-control">
												@foreach($lista as $key => $estufa)

												<option value="{{$estufa->id}}">{{$estufa->nome}}</option>
												@endforeach											

											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-3">										
									<div class="btn-group">
										<label>Escolha um Setor</label>
										<div>
											<select id="dropdownSetores" name="dropdownSetores" class="form-control">
											</select>
										</div>
									</div>
								</div>	
							
						<div class="form-group">
								<div class="btn-group">
								<label>Escolha os tipos de leituras a associar</label>
								<div class="bs-docs-example">
									<select class="selectpicker" multiple="" style="display: none;">
										<option>Mustard</option>
										<option>Ketchup</option>
										<option>Relish</option>
									</select>
								</div>				
							</div>
						</div>	

						</div>
						<div class="form-group">
							<div class="input-group-addon">
								<a href="/admin/estufas/listar" role="button" name="cancelar"class="btn btn-default pull-right">Cancelar</a>
								<input type="submit" name="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
							</div>
						</div>
						</div
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
@section('customScripts')
<script src="{{asset('js/adicionarAssociacao.js')}}"></script>
@endsection
