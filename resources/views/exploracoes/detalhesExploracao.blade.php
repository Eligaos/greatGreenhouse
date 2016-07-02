@extends('app')

@section('customStyles')

@endsection

@section('title', ' - Detalhes da Exploração')

@section('content')
<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">
	<div class="panel panel-default">
		<div class="panel-heading">
		<h3 class="modal-title" >Exploração Agrícola</h3>
		</div>
		<div class="panel-body">
			<form id="registerForm" method="POST" action="/exploracoes/adicionar/submit" >
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">		
				<div class="form-group">
					<fieldset> 
						<h4 class="border-bottom sm-margin-left">Dados do Terreno</h4>
						<div class="col-md-12 margin-bottom">
							<label for="nome">Nome do Terreno:</label>
							<span>{{$exploracao->nome}}</span>									
						</div>
						<div class="col-md-12">
							<label for="numero">Número do Terreno:</label>
							@if($exploracao->numero>0)
							<span>{{$exploracao->numero}}</span>		
							@else
							<span for="numero">----</span>
							@endif

						</div>

					</fieldset>
				</div>
				<div class="form-group">
						<h4 class="border-bottom sm-margin-left">Localização</h4>
						<div class="col-md-6">
							<div>
								<label for="distrito">Distrito:</label>
								@if($exploracao->distrito==true)
								<span>{{$exploracao->distrito}}</span>
								@else
								<span for="distrito">----</span>
								@endif
							</div>
							<label for="concelho">Concelho:</label>
							@if($exploracao->concelho==true)
							<span>{{$exploracao->concelho}}</span>	
							@else
							<span for="concelho">----</span>
							@endif									
						</div> 

						<div class="col-md-6"> 
							<label for="freguesia">Freguesia:</label>
							@if($exploracao->freguesia==true)
							<span>{{$exploracao->freguesia}}</span>	
							@else
							<span for="freguesia">----</span>
							@endif
						</div>  

				</div>    
				</div>
				<div class="panel-footer "> 
				<div class="col-sm-12 input-group">
						<a href="/admin/exploracao/editar" role="button" name="editar" id="editar" value="Editar" class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Editar esta Exploração">Editar</a>
				</div>
				</div>
			</form>
	</div>
</div>
</div>

</div>
@endsection


@section('customScripts')

@endsection
