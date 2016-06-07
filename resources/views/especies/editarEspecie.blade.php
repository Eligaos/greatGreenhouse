@extends('app')

@section('customStyles')


@endsection
@section('title', ' - Adicionar Espécie')

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-3">
			<div class="content">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="modal-title">Editar Espécie</h2>
					</div>
					<div class="panel-body">
						<form method="POST" action="/admin/especies/editar/submit/{{$especie->id}}">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">							
							<div class="form-group">
								<h4 class="border-bottom">Dados da Espécie</h4>
									@if( Session::get('message'))
										<div class="text-center">
											<span class="alert alert-info"> {{ Session::get('message') }}</span>
										</div>
										@endif
								<div class="col-xs-12 col-md-12">
									<label for="nome_comum">Nome Comum</label>
									<div class="input-group margin-bottom">				
									@if(old('especie')!=null)	
										<input type="text" name="nome_comum" id="nome_comum" value="{{ old('nome_comum') }}" placeholder="Insira o nome comum" class="form-control"></input><span class="input-group-addon"></span>
										@else
										<input type="text" class="form-control" id="nome_comum"  name="nome_comum" value="{{$especie->nome_comum}}"placeholder="Insira o nome comum" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
								@endif
									
								</div>
								<label for="especie">Espécie</label>
								<div class="input-group margin-bottom">					
								
								@if(old('especie')!=null)	
										<input type="text" name="especie'" value="{{ old('especie') }}" placeholder="Insira o nome da espécie" class="form-control"></input><span class="input-group-addon"></span>
										@else
										<input type="text" class="form-control" id="especie"  name="especie" value="{{$especie->especie}}"placeholder="Insira o nome da espécie" required><span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
								@endif
								
								</div>

								<label for="cultivar">Cultivar</label>
								<div class="input-group lg-margin-bottom">								
									<input type="text" class="form-control" id="cultivar"  name="cultivar" placeholder="Insira o nome do cultivar"><span class="input-group-addon"></span>
								</div>

							</div>			
							<div class="form-group">
								<h4 class="border-bottom">Paramêtros Ideiais</h4>
								<div class="col-xs-12 col-md-12">
									<label  for="ph_solo_ideal">Ph do Solo Ideal</label>
									<div class="input-group margin-bottom">					
										<input type="text" class="form-control" id="ph_solo_ideal" name="ph_solo_ideal" placeholder="Insira o ph ideal do solo"><span class="input-group-addon">
									</div>
									<label for="ph_agua_ideal">Ph da Água Ideal </label>
									<div class="input-group margin-bottom">								
										<input type="text" class="form-control" id="ph_agua_ideal"  name="ph_agua_ideal" placeholder="Insira o ph ideal da água"><span class="input-group-addon"></span>
									</div>

									<label for="temperatura_atmosferica_ideal">Temperatura Atmosférica Ideal</label>
									<div class="input-group margin-bottom">								
										<input type="text" class="form-control" id="temperatura_atmosferica_ideal"  name="temperatura_atmosferica_ideal" placeholder="Insira a temperatura atmosférica ideal"><span class="input-group-addon"></span>
									</div>
									<label for="temperatura_solo_ideal">Temperatura do Solo Ideal </label>
									<div class="input-group margin-bottom">								
										<input type="text" class="form-control" id="temperatura_solo_ideal"  name="temperatura_solo_ideal" placeholder="Insira a temperatura ideal do solo"><span class="input-group-addon"></span>
									</div>

									<label for="temperatura_solo_ideal">Condutividade Eléctrica do Solo Ideal </label>
									<div class="input-group lg-margin-bottom">								
										<input type="text" class="form-control" id="condutividade_electrica_solo_ideal"  name="condutividade_electrica_solo_ideal" placeholder="Insira a condutividade eléctrica do solo ideal"><span class="input-group-addon"></span>
									</div>

								</div>			
								<div class="form-group">
									<h4 class="border-bottom">Informação Adicional</h4>
									<div class="col-xs-12 col-md-12">
										<label  for="coleccao_termica">Tipo Fisionómico</label>
										<div class="input-group margin-bottom">			
											<input type="text" class="form-control" id="tipo_fisionomico" name="tipo_fisionomico" placeholder="Insira o tipo fisionómico"><span class="input-group-addon">
										</div>

										<label  for="habitat">Habitat</label>
										<div class="input-group margin-bottom">			
											<input type="text" class="form-control" id="habitat" name="habitat" placeholder="Insira o habitat" ><span class="input-group-addon">
										</div>

										<label  for="epoca_floracao">Época de Floração</label>
										<div class="input-group margin-bottom">			
											<input type="text" class="form-control" id="epoca_floracao" name="epoca_floracao" placeholder="Insira a época de floração" ><span class="input-group-addon">
										</div>

										<label for="coleccao_termica">Colecção Térmica</label>
										<div class="input-group lg-margin-bottom">			
											<input type="text" class="form-control" id="coleccao_termica"  name="coleccao_termica" placeholder="Insira a colecção teŕmica"><span class="input-group-addon"></span>
										</div>
									</div>										
									<div class="form-group">
										<div class="input-group-addon">
											<a href="{{ url()->previous() }}" role="button" name="cancelar"class="btn btn-default pull-right">Cancelar</a>
											<input type="submit" id="submit" value="Gravar" class="btn btn-success pull-right">
										</div>
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
