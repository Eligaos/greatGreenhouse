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
						<form id="registerForm" method="POST" action="/exploracoes/adicionar/submit" >
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
							<div class="form-group">
								<fieldset> 
									<legend>Dados do Terreno:</legend>
									<div class="col-xs-12 col-md-12">
										<label for="nome">Nome do Terreno:</label>
										<span>{{$exploracao[0]->nome}}</span>									
									</div>
									<label for="numero">Número do Terreno:</label>
									@if($exploracao[0]->numero>0)
									<span>{{$exploracao[0]->numero}}</span>		
									@else
									<label for="numero">----</label>
									@endif

								</fieldset>
							</div>
							<div class="form-group">
								<fieldset> 
									<legend>Localização</legend>
									<div class="col-xs-12 col-md-6">
										<div>
											<label for="distrito">Distrito:</label>
											@if($exploracao[0]->distrito==true)
											<span>{{$exploracao[0]->distrito}}</span>
											@else
											<label for="distrito">----</label>
											@endif
										</div>
										<label for="concelho">Concelho:</label>
										@if($exploracao[0]->concelho==true)
										<span>{{$exploracao[0]->concelho}}</span>	
										@else
										<label for="concelho">----</label>
										@endif									
									</div> 

									<div class="col-xs-12 col-md-6"> 
										<label for="freguesia">Freguesia:</label>
										@if($exploracao[0]->freguesia==true)
										<span>{{$exploracao[0]->freguesia}}</span>	
										@else
										<label for="freguesia">----</label>
										@endif		
										<div>
											<label for="area">Área:</label>
											@if($exploracao[0]->area>0)
											<span>{{$exploracao[0]->area}}</span>		
											@else
											<label for="area">----</label>
											@endif
										</div>
									</div>  
								</fieldset>
							</div>    
							<div class="form-group">
								<div class="input-group-addon">
									<a href="/admin/exploracoes/editar" role="button" name="editar" id="editar" value="Editar" class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Editar esta Exploração">Editar</a>
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
